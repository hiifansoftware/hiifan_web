<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: HiiFan
 * @purpose: This is the Index controller for the Framework
 *
 * @author: Rishabh Dev Bansal
 * @created on: 02/15/13 3:21 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class indexController extends SaanController
{
    public function index()
    {
        $this->registry->template->Title = "HiiFan :: Home Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $this->registry->template->show("index");
    }
}
