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
class apiController extends SaanController
{
    public function index()
    {

    }

    /**
     * @purpose: This is the index action for the registration page
     * @return mixed|void
     */
    public function register()
    {
        if ($this->isPostBack()) {
            $postArray = $this->requestPost();
            foreach ($postArray as $getKey => $getValue) {
                $postArray[$getKey] = $this->registry->security->decryptData($getValue);
            }
            if (count($postArray) > 0) {
                if ($postArray['email_address'] != '' && $postArray['password'] != '' && $postArray['confirm_password'] != '' && $postArray['password'] == $postArray['confirm_password']) {
                    $userArray = $this->registry->model->run('getUserByEmail', $postArray);
                    if ($userArray[0]['user_email'] != '') {
                        $simpleArray = array('output' => $this->registry->security->encryptData("error-^-already"));
                        echo json_encode($simpleArray);
                        exit;

                    } else {
                        $cardNumberArray = $this->registry->model->run('getNewUnusedCard', $postArray);
                        $cardNumberValue = $cardNumberArray[0]['cardnumber_value'];
                        $postArray['user_card_number'] = $cardNumberValue;
                        $randomActiveCode = rand(10000, 99999);

                        $postArray['active_code'] = $randomActiveCode;;
                        if ($lastPersonalId = $this->registry->model->run('addNewPersonalUser', $postArray)) {
                            $this->registry->model->run('updateUsedCardByCardNum', $postArray);
                            $simpleArray = array('output' => $this->registry->security->encryptData("success-^-done-^-" . $cardNumberValue . '-^-' . $randomActiveCode));
                            echo json_encode($simpleArray);
                            exit;
                        } else {
                            $simpleArray = array('output' => $this->registry->security->encryptData("error-^-someerror1"));
                            echo json_encode($simpleArray);
                            exit;
                        }
                    }
                } else {
                    $simpleArray = array('output' => $this->registry->security->encryptData("error-^-someerror2"));
                    echo json_encode($simpleArray);
                    exit;
                }
            } else {
                $simpleArray = array('output' => $this->registry->security->encryptData("error-^-someerror3"));
                echo json_encode($simpleArray);
                exit;
            }
        } else {
            $simpleArray = array('output' => $this->registry->security->encryptData("error-^-someerror4"));
            echo json_encode($simpleArray);
            exit;
        }
    }
}
