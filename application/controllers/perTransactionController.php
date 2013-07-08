<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Technical Support System
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 28/2/13 12:40 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class perTransactionController extends SaanController
{
    public function index()
    {
        $this->registry->template->Title = "HiiFan :: Personal Account Transaction Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $this->registry->template->show('personal/user_home');
    }

    public function loyalty_transactions()
    {
        $this->registry->template->Title = "HiiFan :: Loyalty Transactions Done By User";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";

        $args['user_id'] = $_SESSION['per_user_id'];
        $this->registry->template->LoyaltyTranDetailsArray = $this->registry->model->run("getLoyaltyTransactionByUserId", $args);
        $this->registry->template->PresentPage = $args['start_page'];

        $this->registry->template->show('personal/loyalty_transaction_list');
    }
}
