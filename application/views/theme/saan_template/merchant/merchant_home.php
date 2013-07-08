<?php require_once(__TEMPLATE_PATH . "header.php"); ?>
<?php require_once(__TEMPLATE_PATH . "merchant/merchant_header.php");?>
</head>
<!-- ----------------------------------- End: Head Section -------------------------------------------- -->
<!-- ----------------------------------- Start: Body Section -------------------------------------------- -->
<body>
<!-- -------------------------------------- Start: Main Container ---------------------------------------- -->
<div class="main_container">
  <!-- -------------------------------------- Start: Search Section ---------------------------------------- -->
  <?php require_once(__TEMPLATE_PATH . "header_section.php"); ?>
  <!-- -------------------------------------- End: Search Section ---------------------------------------- -->
  <!-- -------------------------------------- Start: Content Section ---------------------------------------- -->
  <div class="content">
    <!-- -------------------------------------- Start: Menu Section ---------------------------------------- -->
    <?php require_once(__TEMPLATE_PATH . "merchant/menu_section.php"); ?>
    <!-- -------------------------------------- End: Menu Section ---------------------------------------- -->
    <table width="100%" border="0" cellspacing="0" cellpadding="0" >
      <tr>
        <td width="75%" align="left" valign="top">
        <!-- ---------------------------------------- Start: User Content Section --------------------------------------- -->
        <?php require_once(__TEMPLATE_PATH . 'merchant/merchant_common.php'); ?>
                    <tr>
                    	<td>&nbsp;</td>
                    </tr>
                    <tr>
                    	<td>
                        	<table width="100%" cellpadding="0" cellspacing="0" border="0">
                            	<tr>
                                	<td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/my_account.png" width="78" height="78"></td>
                                    <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/my_payment.png" width="78" height="78"></td>
                                    <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/my_transaction.png" width="78" height="78"></td>
                                </tr>
                                <tr>
                                	<td align="center" valign="top">
                                    	<h4><a href="<?=__SITE_URL?>merchant">My Account</a></h4>
                                        <a href="<?=__SITE_URL?>merchant/edit_profile">Edit Profile</a> <br />
                                        <a href="<?=__SITE_URL?>merchant/edit_profile_pic">Edit Profile Pic</a> <br />
                                        <a href="<?=__SITE_URL?>merchant/change_password">Change Password</a> <br />
                                    </td>
                                    <td align="center" valign="top">
                                    	<h4><a href="<?=__SITE_URL?>merPayment">My Payment</a></h4>
                                        <a href="<?=__SITE_URL?>merPayment/bank_list" id="bank_list">My Banks</a> <br />
            							<a href="<?=__SITE_URL?>merPayment/card_list" id="card_list">My Cards</a> <br />
                						<a href="<?=__SITE_URL?>merPayment/withdrawal_list" id="withdrawal_list">My Withdrawals</a> <br />
                                    </td>
                                    <td align="center" valign="top">
                                    	<h4><a href="<?=__SITE_URL?>merTransaction">My Transaction</a></h4>
                                        <a href="<?=__SITE_URL?>merTransaction/hiifan_transactions" id="hiifan_transactions">HiiFan Transactions</a> <br />
            							<a href="<?=__SITE_URL?>merTransaction/loyalty_transactions" id="loyalty_transactions">Loyalty Transactions</a> <br />
                                    </td>
                                </tr>
                                <tr>
                                	<td colspan="3">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <!-- ---------------------------------------- End: User Content Section --------------------------------------- -->
        </td>
        <td width="2%" align="left" valign="top">&nbsp;</td>
        <td width="23%" align="left" valign="top">
        <!-- ------------------------------------- Start: Right section ------------------------------------------------- -->
        <?php require_once(__TEMPLATE_PATH . "merchant/right_section.php"); ?>
        <!-- ------------------------------------- End : Right Section ----------------------------------------------- -->
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