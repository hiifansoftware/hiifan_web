<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 1/3/13 10:37 AM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class merchantModel extends SaanModel
{
    public function getMerchantUserById($userId)
    {
        $query = "SELECT * FROM merchant_details WHERE merchant_id = '$userId' AND merchant_status = 'active'";
        return $this->db->fetch_rows($query);
    }

    public function updateUserById($userArray)
    {
        if(is_array($userArray))
        {
            $query = "UPDATE merchant_details SET merchant_name = '" . $userArray['merchant_name'] . "',
                                                merchant_storename = '" . $userArray['merchant_storename'] . "',
                                                merchant_phone = '" . $userArray['merchant_phone'] . "',
                                                merchant_address = '" . $userArray['merchant_address'] . "'
                                           WHERE merchant_id = '" . $userArray['merchant_id'] . "'";
            return $this->db->query($query);
        }
    }

    public function getCurrentPasswordById($userArray)
    {
        $query = "SELECT merchant_id FROM merchant_details WHERE merchant_password = '" . $userArray['merchant_password'] . "'
                                                        AND merchant_id = '" . $userArray['merchant_id'] . "'";
        return $this->db->fetch_rows($query);
    }

    public function updateNewPassById($userArray)
    {
        $query = "UPDATE merchant_details SET merchant_password = '" . $userArray['merchant_new_password'] . "' WHERE merchant_id = '" . $userArray['merchant_id'] . "'";
        return $this->db->query($query);
    }
}
