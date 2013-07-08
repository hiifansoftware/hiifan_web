<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 28/2/13 2:01 AM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class loginController extends SaanController
{
    public function index()
    {
        $this->registry->template->Title = "HiiFan :: Login Status Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if(is_array($postArray) && count($postArray) > 0)
            {
                if($postArray['account_type'] != '1' && $postArray['account_type'] != '2')
                {
                    $_SESSION['error'][] = "Please select an account type";
                }
                if($this->registry->validation->isEmpty($postArray['user_email']))
                {
                    $_SESSION['error'][] = "Please Enter Your Email Address";
                }
                else
                {
                    if ($this->registry->validation->validateEmail($postArray['user_email']) === FALSE) {
                        $_SESSION['error'][] = "Please Enter Correct Email Address.";
                    }
                }
                if($this->registry->validation->isEmpty($postArray['user_password']))
                {
                    $_SESSION['error'][] = "Please Enter your Password";
                }

                if(count($_SESSION['error']) == 0)
                {
                    $userArray = $this->registry->model->run('getUserByEmailAndPass', $postArray);
                    if(is_array($userArray) && count($userArray) > 0)
                    {
                        if($postArray['account_type'] == '1')
                        {
                            $userStatus = $userArray[0]['user_status'];
                            $redirectURL = __SITE_URL . "personal";
                        }
                        elseif($postArray['account_type'] == '2')
                        {
                            $userStatus = $userArray[0]['merchant_status'];
                            $redirectURL = __SITE_URL . "merchant";
                        }
                        if($userStatus == 'inactive')
                        {
                            $_SESSION['error'][] = "Please verify your email address to login";
                        }
                        else if($userStatus == 'active')
                        {
                            if($postArray['account_type'] == '1')
                            {
                                $_SESSION['per_user_email'] = $postArray['user_email'];
                                $_SESSION['per_user_id']  = $userArray[0]['user_id'];
                                $postArray['user_id'] = $userArray[0]['user_id'];
                            }
                            else if($postArray['account_type'] == '2')
                            {
                                $_SESSION['mer_user_email'] = $postArray['user_email'];
                                $_SESSION['mer_user_id']  = $userArray[0]['merchant_id'];
                                $postArray['user_id'] = $userArray[0]['user_id'];
                            }
                            appController::logUserLogin($postArray);
                            General::redirect($redirectURL);
                            exit;
                        }
                    }
                    else{
                        $_SESSION['error'][] = "Invalid Login Credential.";

                    }
                }
            }
        }
        $this->registry->template->show('login_status');
    }

    public function forgot_password()
    {
        $this->registry->template->Title = "HiiFan :: Request a New Password";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if($postArray['account_type'] != '1' && $postArray['account_type'] != '2')
            {
                $_SESSION['error'][] = "Please select Account Type";
            }
            if($this->registry->validation->isEmpty($postArray['user_email']))
            {
                $_SESSION['error'][] = "Please Enter Email Address";
            }
            else{
                if($this->registry->validation->validateEmail($postArray['user_email']) === FALSE)
                {
                    $_SESSION['error'][] = "Please enter Email Address in correct format";
                }
            }

            if(count($_SESSION['error']) == 0)
            {
                $userArray = $this->registry->model->run('getUserByEmailAddress', $postArray);
                if(is_array($userArray) && count($userArray) > 0)
                {
                    if($postArray['account_type'] == '1')
                    {
                        if($userArray[0]['user_status'] == 'inactive')
                        {
                            $_SESSION['error'][] = "You cannot request a password Untill you verify your Email.";
                        }
                        else{
                            $fullName = $userArray[0]['user_full_name'];
                        }
                    }
                    if($postArray['account_type'] == '2')
                    {
                        if($userArray[0]['merchant_status'] == 'inactive')
                        {
                            $_SESSION['error'][] = "You cannot request a password Untill you verify your Email.";
                        }
                        else{
                            $fullName = $userArray[0]['merchant_name'];
                        }
                    }
                    if(count($_SESSION['error']) == 0)
                    {
                        $newPassword = $this->randomString();
                        $postArray['new_password'] = md5($newPassword);
                        $templateArray = appController::getTemplateByName('forgot_password');
                        $msg = $templateArray[0]['email_template_content'];
                        $msg = str_replace("{FULLNAME}", $fullName, $msg);
                        $msg = str_replace("{NEWPASSWORD}", $newPassword, $msg);
                        $this->registry->model->run('updateNewPasswordByEmail', $postArray);

                        /* *************************** Start: Send Email to the Expert Registered ************************* */

                        $message = Swift_Message::newInstance(ucwords($templateArray[0]['email_template_subject']))
                            ->setFrom(array(FROM_EMAIL => FROM_NAME))
                            ->setBody($msg, 'text/html');
                        $message->setTo(array($postArray['user_email'] => $fullName));
                        $failedRecipients = array(FAILED_EMAIL => FAILED_NAME);
                        $this->registry->mailer->send($message, $failedRecipients);

                        /* *************************** End: Send Email to the Expert Registered ************************* */
                         $_SESSION['success'] = "New Password has been mailed to your email address";
                    }
                }
                else{
                    $_SESSION['error'][] = "Email Address not registered with us.";
                }
            }
        }
        $this->registry->template->show('forgot_password');
    }
}
