<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 1/3/13 12:54 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class merTransactionModel extends SaanModel
{
    public function getStoreOffersByMerchantId($args)
    {
        $start = 0;
        if (is_array($args) && isset($args['start_page'])) {
            $start = $args['start_page'];
            $start = $start * RECORDS_PER_PAGE;
        }
        $query = "SELECT * FROM store_offer_details WHERE store_merchant_id = '" . $args['merchant_id'] . "' ORDER BY store_offer_id DESC ";

        return $this->db->paginateQuery($query, $start);
    }

    public function addNewOffer($offerArray)
    {
        if(is_array($offerArray))
        {
            return $this->db->query_insert('store_offer_details', $offerArray);
        }
    }

    public function getLoyaltyTransactionsByMerchantId($args)
    {
        $start = 0;
        if (is_array($args) && isset($args['start_page'])) {
            $start = $args['start_page'];
            $start = $start * RECORDS_PER_PAGE;
        }
        $query = "SELECT
                      T.*,
                      U.user_full_name
                    FROM
                      shopping_details T
                      INNER JOIN user_details U
                        ON T.cardnumber_value = U.user_card_number
                    WHERE T.merchant_id = '" . $args['merchant_id'] . "'";

        return $this->db->paginateQuery($query, $start);
    }
}
