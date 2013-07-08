<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 1/3/13 12:25 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class merTransactionController extends SaanController
{
    public function index()
    {
        $this->registry->template->Title = "HiiFan :: Merchant Account Transaction Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $this->registry->template->show('merchant/merchant_home');
    }

    public function store_offers($args)
    {
        $this->registry->template->Title = "HiiFan :: Merchant Account Store Offer List";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";

        $args['merchant_id'] = $_SESSION['mer_user_id'];
        $this->registry->template->OfferDetailsArray = $this->registry->model->run("getStoreOffersByMerchantId", $args);
        $this->registry->template->PresentPage = $args['start_page'];

        $this->registry->template->show('merchant/store_offer_list');
    }

    public function add_store_offer()
    {
        $this->registry->template->Title = "HiiFan :: Merchant Account Add Store Offer";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if($this->registry->validation->isEmpty($postArray['store_offer_subject']))
            {
                $_SESSION['error'][] = "Please Enter Offer Tag Line";
            }
            if($this->registry->validation->isEmpty($postArray['store_offer_content']))
            {
                $_SESSION['error'][] = "Please Enter Offer Content";
            }

            if(count($_SESSION['error']) == 0)
            {

                $dataArray = array('store_offer_subject' => $postArray['store_offer_subject'],
                                    'store_offer_content' => $postArray['store_offer_content'],
                                    'store_merchant_id' => $_SESSION['mer_user_id'],
                                    'store_offer_datetime' => time());
                if($this->registry->model->run('addNewOffer', $dataArray))
                {
                    $_SESSION['success'] = "New Offer Inserted Successfully";
                    General::redirect(__SITE_URL . "merTransaction/add_store_offer");
                    exit;
                }
            }
            $this->registry->template->PostRetain = $postArray;
        }
        $this->registry->template->show('merchant/add_store_offer');
    }

    public function loyalty_transactions()
    {
        $this->registry->template->Title = "HiiFan :: Loyalty Transactions Done At The Store";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";

        $args['merchant_id'] = $_SESSION['mer_user_id'];
        $this->registry->template->LoyaltyTranDetailsArray = $this->registry->model->run("getLoyaltyTransactionsByMerchantId", $args);
        $this->registry->template->PresentPage = $args['start_page'];

        $this->registry->template->show('merchant/loyalty_transaction_list');
    }
}
