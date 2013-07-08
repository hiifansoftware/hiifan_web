<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 28/2/13 2:07 AM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class loginModel extends SaanModel
{
    public function getUserByEmailAndPass($userArray)
    {
        if(is_array($userArray) and count($userArray) > 0)
        {
            if($userArray['account_type'] == '1')
            {
                $query = "SELECT user_id, user_status
                            FROM user_details
                                WHERE user_email = '" . $userArray['user_email'] . "'
                                    AND user_password = '" . md5($userArray['user_password']) . "'";
            }
            elseif($userArray['account_type'] == '2')
            {
                $query = "SELECT merchant_id, merchant_status
                            FROM merchant_details
                                WHERE merchant_email = '" . $userArray['user_email'] . "'
                                    AND merchant_password = '" . md5($userArray['user_password']) . "'";
            }
            return $this->db->fetch_rows($query);
        }
    }

    public function getUserByEmailAddress($userArray)
    {
        if(is_array($userArray) and count($userArray) > 0)
        {
            if($userArray['account_type'] == '1')
            {
                $query = "SELECT user_id, user_status, user_full_name
                            FROM user_details
                                WHERE user_email = '" . $userArray['user_email'] . "'";
            }
            elseif($userArray['account_type'] == '2')
            {
                $query = "SELECT merchant_id, merchant_status, merchant_name
                            FROM merchant_details
                                WHERE merchant_email = '" . $userArray['user_email'] . "'";
            }
            return $this->db->fetch_rows($query);
        }
    }

    public function updateNewPasswordByEmail($userArray)
    {
        if(is_array($userArray))
        {
            if($userArray['account_type'] == '1')
            {
                $query = "UPDATE user_details SET user_password = '" . $userArray['new_password'] . "' WHERE user_email = '" . $userArray['user_email'] . "'";
            }
            if($userArray['account_type'] == '2')
            {
                $query = "UPDATE merchant_details SET merchant_password = '" . $userArray['new_password'] . "' WHERE merchant_email = '" . $userArray['user_email'] ."'";
            }
            return $this->db->query($query);
        }
    }

}
