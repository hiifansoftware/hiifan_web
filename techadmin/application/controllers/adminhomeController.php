<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Core SAAN Framework
 * @purpose: This is the Index controller for the Admin Seciton
 *
 * @author: Rishabh Dev Bansal
 * @created on: 02/16/13 3:21 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class adminhomeController extends SaanController
{
    /**
     * @purpose: This is for the displaying the admin home page
     * @author: Rishabh Dev Bansal
     */
    public function index()
    {
        $this->registry->template->Title = "HiiFan :: Admin Home Page - Welcome Administrator";
        $this->registry->template->show("adminhome");
    }

    /* ************************** Start: Functions Related to Category ****************************** */

    /**
     * @purpose: This is the Signout action
     * @author: Rishabh Dev Bansal
     */
    public function signout()
    {
        session_destroy();
        General::redirect(__SITE_URL);
    }
}
