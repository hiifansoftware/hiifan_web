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
                <td align="left" valign="top" width="74%"></td>
                <td align="left" valign="top" width="1%">&nbsp;</td>
                <td align="left" valign="top" width="25%">&nbsp;</td>
            </tr>
            <tr>
                <td align="left" valign="top">
                	<div class="heading">Registration Form</div>
                    <?=General::getMessage()?>
                  <form name="register" id="register" action="" method="post" class="jqtransform">
                   	  <table width="90%" border="0" cellspacing="3" cellpadding="3" align="center" class="content_table">
                      	<tr>
                        	<td width="32%">Account Type<span class="required">*</span></td>
                            <td width="68%"><select name="account_type" id="account_type">
                              <option value="1" selected>Personal Account</option>
                              <option value="2">Merchant Account</option>
                            </select>                            </td>
                        </tr>
                      	<tr>
                      	  <td>Email Address<span class="required">*</span></td>
                      	  <td><input type="text" name="user_email" id="user_email" value="<?=$PostRetain['user_email']?>"></td>
                   	    </tr>
                      	<tr>
                      	  <td>Password<span class="required">*</span></td>
                      	  <td><input type="password" name="user_pass" id="user_pass"></td>
                   	    </tr>
                      	<tr>
                      	  <td>Confirm Password<span class="required">*</span></td>
                      	  <td><input type="password" name="user_con_pass" id="user_con_pass"></td>
                   	    </tr>
                      	<tr>
                      	  <td>&nbsp;</td>
                      	  <td><input type="submit" name="btn_submit" id="btn_submit" value="Complete Registration"><br>
                          <span class="required">* Marked Fields are Mandatory</span>
                          </td>
                   	    </tr>    
                      </table>
                  </form>
              </td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top">
                    <!-- ------------------------------------ Start: Login section ------------------------------------ -->
                    <?php require_once(__TEMPLATE_PATH . "login_section.php"); ?>
                    <!-- ------------------------------------ End: Login section ------------------------------------ -->
                </td>
            </tr>
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