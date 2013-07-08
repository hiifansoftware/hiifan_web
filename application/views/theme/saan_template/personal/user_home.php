<?php require_once(__TEMPLATE_PATH . "header.php"); ?>
<?php require_once(__TEMPLATE_PATH . "personal/user_header.php"); ?>
</head>
<!-- ----------------------------------- End: Head Section -------------------------------------------- -->
<!-- ----------------------------------- Start: Body Section -------------------------------------------- -->
<body>
<!-- ----------------------------- Start: Code for Facebook Recommendation --------------------------- -->
<?php //require_once("facebook_recommend_bar.php"); ?>
<!-- ----------------------------- End: Code for Facebook Recommendation --------------------------- -->
<!-- -------------------------------------- Start: Main Container ---------------------------------------- -->
<div class="main_container">
    <!-- -------------------------------------- Start: Search Section ---------------------------------------- -->
    <?php require_once(__TEMPLATE_PATH . "header_section.php"); ?>
    <!-- -------------------------------------- End: Search Section ---------------------------------------- -->
    <!-- -------------------------------------- Start: Content Section ---------------------------------------- -->
    <div class="content">
        <!-- -------------------------------------- Start: Menu Section ---------------------------------------- -->
        <?php require_once(__TEMPLATE_PATH . "personal/menu_section.php"); ?>
        <!-- -------------------------------------- End: Menu Section ---------------------------------------- -->
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="75%" align="left" valign="top">
                    <!-- ---------------------------------------- Start: User Content Section --------------------------------------- -->
                    <?php require_once(__TEMPLATE_PATH . 'personal/user_common.php'); ?>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <table width="100%" cellpadding="0" cellspacing="0" border="0">
                        <tr>
                            <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/my_account.png"
                                                                 width="78" height="78"></td>
                            <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/my_payment.png"
                                                                 width="78" height="78"></td>
                            <td align="center" valign="top"><img src="<?=__TEMPLATE_URL?>images/my_transaction.png"
                                                                 width="78" height="78"></td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <h4><a href="<?=__SITE_URL?>personal">My Account</a></h4>
                                <a href="<?=__SITE_URL?>personal/edit_profile">Edit Profile</a> <br/>
                                <a href="<?=__SITE_URL?>personal/edit_profile_pic">Edit Profile Pic</a> <br/>
                                <a href="<?=__SITE_URL?>personal/change_password">Change Password</a> <br/>
                            </td>
                            <td align="center" valign="top">
                                <h4><a href="<?=__SITE_URL?>perPayment">My Payment</a></h4>
                                <a href="<?=__SITE_URL?>perPayment/bank_list" id="bank_list">My Banks</a> <br/>
                                <a href="<?=__SITE_URL?>perPayment/card_list" id="card_list">My Cards</a> <br/>
                                <a href="<?=__SITE_URL?>perPayment/withdrawal_list" id="withdrawal_list">My
                                    Withdrawals</a> <br/>
                            </td>
                            <td align="center" valign="top">
                                <h4><a href="<?=__SITE_URL?>perTransaction">My Transaction</a></h4>
                                <a href="<?=__SITE_URL?>perTransaction/hiifan_transactions" id="hiifan_transactions">HiiFan
                                    Transactions</a> <br/>
                                <a href="<?=__SITE_URL?>perTransaction/loyalty_transactions" id="loyalty_transactions">Loyalty
                                    Transactions</a> <br/>
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
    <?php require_once(__TEMPLATE_PATH . "personal/right_section.php"); ?>
    <!-- ------------------------------------- End : Right Section ----------------------------------------------- -->
</td>
</tr>
</table>
</div>
<!-- -------------------------------------- End: Content Section ---------------------------------------- -->
<!-- <fb:recommendations-bar href="http://www.hiifan.com/personal" read_time="2" action="recommend" site="http://www.hiifan.com"></fb:recommendations-bar> -->
<!-- -------------------------------------- Start: Footer Section ---------------------------------------- -->
<?php require_once(__TEMPLATE_PATH . "footer_section.php"); ?>
<!-- -------------------------------------- End: Footer Section ---------------------------------------- -->
</div>
<!-- -------------------------------------- End: Main Container ---------------------------------------- -->
</body>
<!-- ----------------------------------- End: Body Section -------------------------------------------- -->
</html>