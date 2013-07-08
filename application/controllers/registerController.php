<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 26/2/13 11:45 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class registerController extends SaanController
{
    /**
     * @purpose: This is the index action for the registration page
     * @return mixed|void
     */
    public function index()
    {
        $this->registry->template->Title = "HiiFan :: Registration Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if ($postArray['account_type'] != '1' && $postArray['account_type'] != '2')
            {
                $_SESSION['error'][] = "Please Select an Account Type";
            }
            if ($this->registry->validation->isEmpty($postArray['user_email'])) {
                $_SESSION['error'][] = "Please Enter your email address";
            }
            else
            {
                if ($this->registry->validation->validateEmail($postArray['user_email']) === FALSE) {
                    $_SESSION['error'][] = "Please Enter Correct Email Address.";
                }
            }

            if ($this->registry->validation->isEmpty($postArray['user_pass'])) {
                $_SESSION['error'][] = "Please enter Password";
            }
            if ($this->registry->validation->isEmpty($postArray['user_con_pass'])) {
                $_SESSION['error'][] = "Please Enter confirm password";
            }
            if (!$this->registry->validation->isEmpty($postArray['user_pass']) && !$this->registry->validation->isEmpty($postArray['user_con_pass'])) {
                if($postArray['user_pass'] != $postArray['user_con_pass'])
                {
                    $_SESSION['error'][] = "Password and Confirm password does not match";
                }
            }

            if(count($_SESSION['error']) == 0)
            {
                $userArray = $this->registry->model->run('getUserByEmail', $postArray);
                if(count($userArray) > 0)
                {
                    $_SESSION['error'][] = "This email address is already registered with us";
                }
                else
                {
                    $randomActiveCode = rand(10000, 99999);
                    $encryptedActiveCode = $this->registry->security->encryptData($randomActiveCode);

                    $postArray['active_code'] = $randomActiveCode;

                    $templateArray = appController::getTemplateByName('registration');
                    $msg = $templateArray[0]['email_template_content'];

                    /* ****************************** Start: Personal User Section ********************** */
                    if($postArray['account_type'] == '1')
                    {
                        $cardnumberArray = $this->registry->model->run('getNewUnusedCard', $postArray);
                        $postArray['user_card_number']= $cardnumberArray[0]['cardnumber_value'];
                        if($lastPersonalId = $this->registry->model->run('addNewPersonalUser', $postArray))
                        {
                            $this->registry->model->run('updateUsedCardByCardNum', $postArray);
                            $encryptedAccountType = $this->registry->security->encryptData('1');
                            $encryptedUserId = $this->registry->security->encryptData($lastPersonalId);
                            $linkValue = __SITE_URL . "register/activateUser/account_type:$encryptedAccountType/user_id:$encryptedUserId/active_code:$encryptedActiveCode";
                            $msg = str_replace("{FULLNAME}", $postArray['user_email'], $msg);
                            $msg = str_replace("{LINKVALUE}", $linkValue, $msg);
                            $msg = str_replace("{CARDNUMBER_VALUE}", $postArray['user_card_number'], $msg);
                        }
                    }
                    /* ****************************** End: Personal User Section ********************** */

                    /* ****************************** Start: Merchant User Section ********************** */
                    elseif($postArray['account_type'] == '2')
                    {
                        if($lastMerchantId = $this->registry->model->run('addNewMerchantUser', $postArray))
                        {
                            $encryptedAccountType = $this->registry->security->encryptData('2');
                            $encryptedUserId = $this->registry->security->encryptData($lastMerchantId);
                            $linkValue = __SITE_URL . "register/activateUser/account_type:$encryptedAccountType/user_id:$encryptedUserId/active_code:$encryptedActiveCode";
                            $msg = str_replace("{FULLNAME}", $postArray['user_email'], $msg);
                            $msg = str_replace("{LINKVALUE}", $linkValue, $msg);
                        }
                    }
                    /* ****************************** End: Merchant User Section ********************** */

                    /* *************************** Start: Send Email to the Expert Registered ************************* */

                    $message = Swift_Message::newInstance(ucwords($templateArray[0]['email_template_subject']))
                        ->setFrom(array(FROM_EMAIL => FROM_NAME))
                        ->setBody($msg, 'text/html');
                    $message->setTo(array($postArray['user_email'] => $postArray['user_email']));
                    $failedRecipients = array(FAILED_EMAIL => FAILED_NAME);
                    $this->registry->mailer->send($message, $failedRecipients);

                    /* *************************** End: Send Email to the Expert Registered ************************* */

                    $_SESSION['success'] = "You have been registered successfully. Please check you email for the verification link.";
                    General::redirect(__SITE_URL . "register");

                }
            }
        }
        $this->registry->template->show("registration");
    }

    public function activateUser($args)
    {
        $this->registry->template->Title = "HiiFan :: Registration Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        if(is_array($args) && count($args) > 0)
        {
            $args['account_type'] = $this->registry->security->decryptData($args['account_type']);
            $args['user_id'] = $this->registry->security->decryptData($args['user_id']);
            $args['active_code'] = $this->registry->security->decryptData($args['active_code']);

            if($userArray = $this->registry->model->run('getUserByIdAndActiveCode', $args))
            {
                if($userArray[0]['user_status'] == 'inactive' || $userArray[0]['merchant_status'] == 'inactive')
                {
                    if($this->registry->model->run('verifyUserByIdAndActiveCode', $args))
                    {
                        $_SESSION['success'] = "Email verification was successful. Login and start using HiiFan";
                        $templateArray = appController::getTemplateByName('notify_email_verification');
                        $msg = $templateArray[0]['email_template_content'];
                        if($args['account_type'] == '1')
                        {
                            $msg = str_replace("{FULLNAME}", $userArray[0]['user_email'], $msg);
                            $sendToEmailAddress = $userArray[0]['user_email'];
                        }
                        else if($args['account_type'] == '2')
                        {
                            $msg = str_replace("{FULLNAME}", $userArray[0]['merchant_email'], $msg);
                            $sendToEmailAddress = $userArray[0]['merchant_email'];
                        }


                        /* *************************** Start: Send Email to the Expert Registered ************************* */

                        $message = Swift_Message::newInstance(ucwords($templateArray[0]['email_template_subject']))
                            ->setFrom(array(FROM_EMAIL => FROM_NAME))
                            ->setBody($msg, 'text/html');
                        $message->setTo(array($sendToEmailAddress => $sendToEmailAddress));
                        $failedRecipients = array(FAILED_EMAIL => FAILED_NAME);
                        $this->registry->mailer->send($message, $failedRecipients);

                        /* *************************** End: Send Email to the Expert Registered ************************* */

                    }
                    else{
                        $_SESSION['error'][] = "Problem with activation. Please Try Again.";
                    }
                }
                else
                {
                    $_SESSION['error'][] = "This Email address is already verified.";
                }
            }
            else{
                $_SESSION['error'][] = "Problem with activation. Please Try Again.";
            }
        }
        else{
            $_SESSION['error'][] = "Problem with activation. Please Try Again.";
        }
        $this->registry->template->show('activate_user');
    }
}
