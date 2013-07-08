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



class pageController extends SaanController
{

    public function index()
    {


    }
    public function aboutus()
    {
        $this->registry->template->Title = "HiiFan :: About Us Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $this->registry->template->show("aboutus");
    }

    public function privacy()
    {
        $this->registry->template->Title = "HiiFan :: Privacy  Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $this->registry->template->show("privacy");
    }

    public function support()
    {
        $this->registry->template->Title = "HiiFan :: Support Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $this->registry->template->show("support");
    }

    public function terms()
    {
        $this->registry->template->Title = "HiiFan :: Terms Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $this->registry->template->show("terms");
    }

    public function contactus()
    {
        $this->registry->template->Title = "HiiFan :: Contact Us Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        if($this->isPostBack())
        {
            $postArray = $this->requestPost();
            if($this->registry->validation->isEmpty($postArray['contact_name']))
            {
                $_SESSION['error'][] = "Please Enter Your Name";
            }
            if($this->registry->validation->isEmpty($postArray['contact_email']))
            {
                $_SESSION['error'][] = "Please Enter Your Email Address";
            }
            else{
                if($this->registry->validation->validateEmail($postArray['contact_email']) === FALSE)
                {
                    $_SESSION['error'][] = "Please Enter Email Address in correct format";
                }
            }
            if($this->registry->validation->isEmpty($postArray['contact_phone']))
            {
                $_SESSION['error'][] = "Please Enter You Phone Number";
            }
            else{
                if($this->registry->validation->validatePhone($postArray['contact_phone']) === FALSE)
                {
                    $_SESSION['error'][] = "Please Enter Phone Number in Correct Format";
                }
            }

            $presentTime = time();
            $dataArray = array('contact_name' => $postArray['contact_name'],
                                'contact_email' => $postArray['contact_email'],
                                'contact_phone' => $postArray['contact_phone'],
                                'contact_comments' => $postArray['contact_comments'],
                                'contact_datetime' => $presentTime);

            if(count($_SESSION['error']) == 0)
            {
                if($this->registry->model->run('addContactEntry', $dataArray))
                {
                    $_SESSION['success'] = "Your Contact Information has been saved successfully";
                    General::redirect(__SITE_URL . "page/contactus");
                }
                else
                {
                    $_SESSION['error'][] = "Problem submitting you contact data.";
                }
            }
            else{
                $this->registry->template->RetainPost = $postArray;
            }
        }
        $this->registry->template->show("contactus");
    }


    public function special()
    {
        $this->registry->template->Title = "HiiFan :: Special Offer Page";
        $this->registry->template->Description = "HiiFan is an Online Payment Portal with Loyalty Discount Cards functionality.";
        $this->registry->template->Keywords = "Online Payment Portal, Loyalty Portal, Loyalty Cards";
        $this->registry->template->show("special");
    }
}

