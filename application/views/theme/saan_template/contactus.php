<?php require_once(__TEMPLATE_PATH . "header.php"); ?>
</head>
<!-- ----------------------------------- End: Head Section -------------------------------------------- -->
<!-- ----------------------------------- Start: Body Section -------------------------------------------- -->
<body>
<!-- -------------------------------------- Start: Main Container ---------------------------------------- -->
<div class="main_container">
    <!-- -------------------------------------- Start: Header Section ---------------------------------------- -->
    <?php require_once(__TEMPLATE_PATH . "header_section.php"); ?>
    <!-- -------------------------------------- End: Header Section ---------------------------------------- -->
    <!-- -------------------------------------- Start: Content Section ---------------------------------------- -->
    <div class="content">
        <!-- -------------------------------------- Start: Menu Section ---------------------------------------- -->
        <?php require_once(__TEMPLATE_PATH . "menu_section.php"); ?>
        <!-- -------------------------------------- End: Menu Section ---------------------------------------- -->
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" valign="top" width="74%">&nbsp;</td>
                <td align="left" valign="top" width="1%">&nbsp;</td>
                <td align="left" valign="top" width="25%">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3" align="left" valign="top">
                    <h3 class="heading"><span class="invent-color">Contact Us</span></h3>
                    <?=General::getMessage()?>
                    <form name="frmContact" id="frmContact" action="" method="post" class="jqtransform">
                   	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="30%" align="left" valign="top">
                          	<div class="acc-style4 accordion invent-accordion">
                                <div class="acc-section">
                                    <h3 style="color: rgb(0, 0, 0);" class="active"><span class="invent-color">Office Location/Contact</span></h3>
                
                                    <div class="acc-content">
                                        <div style="margin-bottom:10px;">
                                            6, Gwagwalada Close, <br />
                                            Off Owerri Street, <br />
                                            Garki, Area 7, <br />
                                            FCT - Abuja. <br />
                                            Telephone: 234 - <br />
                                            E-Mail: <a href="mailto:info@hiifan.com" style="color:#000000;">info@hiifan.com</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                          </td>
                          <td>
                          
                          	<table width="90%" border="0" cellspacing="5" cellpadding="5" align="center">
                          <tr>
                            <td align="left" valign="top">Name<span class="required">*</span></td>
                            <td align="left" valign="top">
                            <input type="text" name="contact_name" id="contact_name" value="<?=$RetainPost['contact_name']?>">
                            <br><span class="help_text">Please Enter Your Name.</span>                            </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Email<span class="required">*</span></td>
                            <td align="left" valign="top"><input type="text" name="contact_email" id="contact_email" value="<?=$RetainPost['contact_email']?>">
                            <br><span class="help_text">Please Enter Your Email Address.</span>                            </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Phone Number<span class="required">*</span></td>
                            <td align="left" valign="top"><input type="text" name="contact_phone" id="contact_phone" value="<?=$RetainPost['contact_phone']?>">
                            <br><span class="help_text">Please Enter Your Phone Number.</span>                            </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">Comments</td>
                            <td align="left" valign="top"><textarea name="contact_comments" id="contact_comments" cols="48"><?=$RetainPost['contact_comments']?></textarea>
                            <br><span class="help_text">Please Enter Your Comments (Optional).</span>                            </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"><input type="submit"  name="btnSubmit" id="btnSubmit" value="Submit">
                            <br><span class="required">* Marked Fields are Mandatory</span>                            </td>
                          </tr>
                          <tr>
                            <td align="left" valign="top">&nbsp;</td>
                            <td align="left" valign="top"></td>
                          </tr>
                        </table>
                          </td>
                        </tr>
                      </table>
                    </form>
              
                    <!-- ------------------------------------ Start: Login section ------------------------------------ -->
          <!-- ------------------------------------ End: Login section ------------------------------------ -->              </tr>
        </table>
  </div>
    <!-- -------------------------------------- End: Content Section ---------------------------------------- -->
    <!-- -------------------------------------- Start: Footer Section ---------------------------------------- -->
    <?php require_once(__TEMPLATE_PATH . "footer_section.php"); ?>
    <!-- -------------------------------------- End: Footer Section ---------------------------------------- -->
</div>
<!-- -------------------------------------- End: Main Container ---------------------------------------- -->
</body>
<!-- ----------------------------------- End: Body Section -------------------------------------------- -->
</html>