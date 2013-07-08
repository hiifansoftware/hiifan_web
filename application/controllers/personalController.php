<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 28/2/13 4:46 AM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class personalController extends SaanController
{
    public function index()
    {
        $this->registry->template->Title = "HiiFan :: Personal User Home Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $userArray = $this->registry->model->run('getPersonalUserById', $_SESSION['per_user_id']);
        if($userArray[0]['user_full_name'] == '')
        {
            $_SESSION['error'][] = "You need to complete your profile to continue with the services.";
            General::redirect(__SITE_URL . "personal/edit_profile");
            exit;
        }
        $this->registry->template->show('personal/user_home');
    }

    public function edit_profile()
    {
        $this->registry->template->Title = "HiiFan :: Personal User Edit Profile Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $userArray = $this->registry->model->run('getPersonalUserById', $_SESSION['per_user_id']);
        $this->registry->template->UserArray = $userArray[0];
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if($this->registry->validation->isEmpty($postArray['user_full_name']))
            {
                $_SESSION['error'][] = "Please Enter Full Name";
            }
            if(!$this->registry->validation->isEmpty($postArray['user_dob']))
            {
                if($this->registry->validation->checkDateFormat($postArray['user_dob']) === FALSE)
                {
                    $_SESSION['error'][] = "Please Enter Correct Date Format";
                }
            }
            if(!$this->registry->validation->isEmpty($postArray['user_phone']))
            {
                if($this->registry->validation->validatePhone($postArray['user_phone']) === FALSE)
                {
                    $_SESSION['error'][] = "Please enter correct phone number format";
                }
            }

            if(count($_SESSION['error']) == 0)
            {
                $postArray['user_id'] = $_SESSION['per_user_id'];
                $postArray['user_full_name'] = ucwords($postArray['user_full_name']);
                if($this->registry->model->run('updateUserById', $postArray))
                {
                    $_SESSION['success'] = "Profile Updated Successfully";
                    General::redirect(__SITE_URL . "personal/edit_profile");
                }
            }
            else
            {
                $this->registry->template->UserArray = $postArray;
            }
        }
        $this->registry->template->show('personal/edit_profile');
    }

    public function edit_profile_pic()
    {
        $this->registry->template->Title = "HiiFan :: Personal User Edit Profile Pic Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $userArray = $this->registry->model->run('getPersonalUserById', $_SESSION['per_user_id']);
        $this->registry->template->UserArray = $userArray[0];
        if($this->isPostBack())
        {
            $allowedExts = array("jpg", "jpeg", "gif", "png");
            $extension = end(explode(".", $_FILES["user_pic"]["name"]));
            if ((($_FILES["user_pic"]["type"] == "image/gif") || ($_FILES["user_pic"]["type"] == "image/jpeg") || ($_FILES["user_pic"]["type"] == "image/png")
                || ($_FILES["user_pic"]["type"] == "image/pjpeg"))
                && in_array($extension, $allowedExts))
            {
                if(($_FILES["user_pic"]["size"] > 400000))
                {
                    $_SESSION['error'][] = "File size is exceeding the allowed file size.";
                }
                else{
                    if(move_uploaded_file($_FILES["user_pic"]["tmp_name"], __UPLOAD_PATH . "profile_image/personal_user/" . $_SESSION['per_user_id'] . ".jpg"))
                    {
                        $_SESSION['success'] = "Profile Pic updated successfully";
                        General::redirect(__SITE_URL . "personal/edit_profile_pic");
                        exit;
                    }
                    else{
                        $_SESSION['error'][] = "Problem Updating profile pic";
                    }
                }
            }
            else{
                $_SESSION['error'][] = "Please select supported file type";
            }
        }
        $this->registry->template->show('personal/edit_profile_pic');
    }

    public function change_password()
    {
        $this->registry->template->Title = "HiiFan :: Personal User Change Password Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if($this->registry->validation->isEmpty($postArray['old_password']))
            {
                $_SESSION['error'][] = "Please enter Old Password";
            }
            if($this->registry->validation->isEmpty($postArray['new_password']))
            {
                $_SESSION['error'][] = "Please Enter New Password";
            }
            if($this->registry->validation->isEmpty($postArray['con_new_password']))
            {
                $_SESSION['error'][] = "Please enter Confirm New Password;";
            }
            if($postArray['new_password'] != $postArray['con_new_password'])
            {
                $_SESSION['error'][] = "Password and Confirm password does not match";
            }

            if(count($_SESSION['error']) == 0)
            {
                $userPassArray['user_id'] = $_SESSION['per_user_id'];
                $userPassArray['user_password'] = md5($postArray['old_password']);
                $checkUserPassArray = $this->registry->model->run('getCurrentPasswordById', $userPassArray);
                if(is_array($checkUserPassArray))
                {
                    if(count($checkUserPassArray) > 0)
                    {
                        $userPassArray['user_new_password'] = md5($postArray['new_password']);
                        if($this->registry->model->run('updateNewPassById', $userPassArray))
                        {
                            $_SESSION['success'] = "Password Changed Successfully";
                            General::redirect(__SITE_URL . "personal/change_password");
                        }
                    }
                    else{
                        $_SESSION['error'][] = "Old Password is incorrect.";
                    }
                }
                else{
                    $_SESSION['error'][] = "Old Password is incorrect.";
                }
            }
        }
        $this->registry->template->show('personal/change_password');
    }

    public function signout()
    {
        session_destroy();
        General::redirect(__SITE_URL);
    }
}
