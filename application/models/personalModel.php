<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 28/2/13 3:58 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class personalModel extends SaanModel
{
    public function getPersonalUserById($userId)
    {
        $query = "SELECT * FROM user_details WHERE user_id = '$userId' AND user_status = 'active'";
        return $this->db->fetch_rows($query);
    }

    public function updateUserById($userArray)
    {
        if(is_array($userArray))
        {
            $query = "UPDATE user_details SET user_full_name = '" . $userArray['user_full_name'] . "',
                                                user_dob = '" . $userArray['user_dob'] . "',
                                                user_phone = '" . $userArray['user_phone'] . "',
                                                user_address = '" . $userArray['user_address'] . "'
                                           WHERE user_id = '" . $userArray['user_id'] . "'";
            return $this->db->query($query);
        }
    }

    public function getCurrentPasswordById($userArray)
    {
        $query = "SELECT user_id FROM user_details WHERE user_password = '" . $userArray['user_password'] . "'
                                                        AND user_id = '" . $userArray['user_id'] . "'";
        return $this->db->fetch_rows($query);
    }

    public function updateNewPassById($userArray)
    {
        $query = "UPDATE user_details SET user_password = '" . $userArray['user_new_password'] . "' WHERE user_id = '" . $userArray['user_id'] . "'";
        return $this->db->query($query);
    }

}
