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
class apiModel extends SaanModel
{
    public function getUserByEmail($userArray)
    {
        $query = "SELECT * FROM user_details WHERE user_email = '" . $userArray['email_address'] . "'";
        return $this->db->fetch_rows($query);
    }

    public function getNewUnusedCard()
    {
        $query = "SELECT cardnumber_value FROM cardnumber_details WHERE card_for = 'loyalty' AND is_first_used = '0'";

        return $this->db->fetch_rows($query);
    }

    public function addNewPersonalUser($userArray)
    {
        $dataArray = array('user_email' => $userArray['email_address'],
            'user_password' => md5($userArray['confirm_password']),
            'user_reg_date' => time(),
            'user_active_code' => $userArray['active_code'],
            'user_card_number' => $userArray['user_card_number'],
            'user_reg_from' => $userArray['reg_from'],
            'user_status' => 'active',
            'user_active_date' => time());
        return $this->db->query_insert('user_details', $dataArray);
    }

    public function updateUsedCardByCardNum($cardNumber)
    {
        $query = "UPDATE cardnumber_details SET is_first_used = '1' WHERE cardnumber_value = '" . $cardNumber['user_card_number'] . "'";

        return $this->db->query($query);
    }
    
    public function assignCardToUser($dataArray)
    {
        if(is_array($dataArray) && count($dataArray) > 0)
        {
            $insertArray = array('user_id' => $dataArray['user_id'],
                                'user_card_number' => $dataArray['user_card_number'],
                                'user_card_datetime' => $dataArray['user_card_datetime']);
            return $this->db->query_insert('user_card_details', $insertArray);
        }
    }
}
