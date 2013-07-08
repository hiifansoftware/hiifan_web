<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 27/2/13 10:57 AM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class registerModel extends SaanModel
{
    /**
     * @purpose: This function gets the User form the user email address from user table as well as merchant table.
     * @author: Saurabh Sinha
     * @param $userArray
     * @return mixed
     */
    public function getUserByEmail($userArray)
    {
        if($userArray['account_type'] == '1')
        {
            $query = "SELECT * FROM user_details WHERE user_email = '" . $userArray['user_email'] . "'";
        }
        elseif($userArray['account_type'] == '2')
        {
            $query = "SELECT * FROM merchant_details WHERE merchant_email = '" . $userArray['user_email'] . "'";
        }
        return $this->db->fetch_rows($query);
    }

    public function getNewUnusedCard()
    {
        $query = "SELECT cardnumber_value FROM cardnumber_details WHERE card_for = 'loyalty' AND is_first_used = '0'";

        return $this->db->fetch_rows($query);
    }

    /**
     * @purpose: This function adds a new personal user in the user table.
     * @author: Saurabh Sinha
     * @param $userArray
     * @return mixed
     */
    public function addNewPersonalUser($userArray)
    {
        $dataArray = array('user_email' => $userArray['user_email'],
                            'user_password' => md5($userArray['user_con_pass']),
                            'user_reg_date' => time(),
                            'user_active_code' => $userArray['active_code'],
                            'user_card_number' => $userArray['user_card_number']);
        return $this->db->query_insert('user_details', $dataArray);
    }

    /**
     * @purpose: This function adds a new merchant user in the merchant table.
     * @author: Saurabh Sinha
     * @param $userArray
     * @return mixed
     */
    public function addNewMerchantUser($userArray)
    {
        $dataArray = array('merchant_email' => $userArray['user_email'],
            'merchant_password' => md5($userArray['user_con_pass']),
            'merchant_reg_date' => time(),
            'merchant_active_code' => $userArray['active_code']);
        return $this->db->query_insert('merchant_details', $dataArray);
    }

    public function getUserByIdAndActiveCode($userArray)
    {
        if($userArray['account_type'] == '1')
        {
            $query = "SELECT user_id, user_status, user_email FROM user_details
                        WHERE user_id = '" . $userArray['user_id'] . "'
                            AND user_active_code = '" . $userArray['active_code'] . "'";
        }
        else if($userArray['account_type'] == '2')
        {
            $query = "SELECT merchant_id, merchant_status, merchant_email FROM merchant_details
                        WHERE merchant_id = '" . $userArray['user_id'] . "'
                            AND merchant_active_code = '" . $userArray['active_code'] . "'";
        }

        return $this->db->fetch_rows($query);
    }

    public function verifyUserByIdAndActiveCode($userArray)
    {
        $activeDate = time();
        if($userArray['account_type'] == '1')
        {

            $query = "UPDATE user_details
                                SET user_active_date = '$activeDate',
                                    user_status = 'active'
                                WHERE user_id = '" . $userArray['user_id'] . "'
                                    AND user_active_code = '" . $userArray['active_code'] . "'";

        }
        elseif($userArray['account_type'] == '2')
        {

            $query = "UPDATE merchant_details
                                SET merchant_active_date = '$activeDate',
                                    merchant_status = 'active'
                                WHERE merchant_id = '" . $userArray['user_id'] . "'
                                    AND merchant_active_code = '" . $userArray['active_code'] . "'";

        }

        return $this->db->query($query);
    }

    public function updateUsedCardByCardNum($cardNumber)
    {
        $query = "UPDATE cardnumber_details SET is_first_used = '1' WHERE cardnumber_value = '" . $cardNumber['user_card_number'] . "'";

        return $this->db->query($query);
    }
}
