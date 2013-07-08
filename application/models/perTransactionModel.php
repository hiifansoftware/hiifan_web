<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 3/3/13 11:10 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class perTransactionModel extends SaanModel
{
    public function getLoyaltyTransactionByUserId($args)
    {
        $start = 0;
        if (is_array($args) && isset($args['start_page'])) {
            $start = $args['start_page'];
            $start = $start * RECORDS_PER_PAGE;
        }
        $query = "SELECT U.user_card_number, U.user_id, M.merchant_name, T. * from shopping_details T
                        INNER JOIN user_details U
                            ON U.user_card_number = T.cardnumber_value
                        INNER JOIN merchant_details M
                            ON T.merchant_id = M.merchant_id
                        WHERE U.user_id = '" . $args['user_id'] . "'";

        return $this->db->paginateQuery($query, $start);
    }
}
