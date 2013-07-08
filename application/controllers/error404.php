<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Core SAAN Framework
 * @purpose: This is the Error controller.
 *
 * @author: Saurabh Sinha
 * @created on: 12/30/12 3:09 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/

class error404Controller extends SaanController
{
    public function index()
    {
        $this->registry->template->title = '404 Error - Page Not Found !';
        $this->registry->template->errorHeading = '404 Error - Page Not Found !';
        $this->registry->template->show('error404');
    }
}
