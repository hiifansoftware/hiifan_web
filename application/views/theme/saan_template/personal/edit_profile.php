<?php require_once(__TEMPLATE_PATH . "header.php"); ?>
<?php require_once(__TEMPLATE_PATH . "personal/user_header.php"); ?>
</head>
<!-- ----------------------------------- End: Head Section -------------------------------------------- -->
<!-- ----------------------------------- Start: Body Section -------------------------------------------- -->
<body>
<!-- ----------------------------- Start: Code for Facebook Recommendation --------------------------- -->
<?php require_once("facebook_recommend_bar.php"); ?>
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
                    <form name="frmEditProfile" id="frmEditProfile" action="" method="post" class="jqtransform">
                        <table width="80%" cellpadding="4" cellspacing="4" border="0" align="center">
                            <tr>
                                <td colspan="3" align="left" valign="top"><?=General::getMessage()?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="left" valign="top">Full Name:<span class="required">*</span></td>
                                <td width="65%" align="left" valign="top"><input type="text" name="user_full_name"
                                                                                 id="user_full_name" value="<?=$UserArray['user_full_name']?>">
                                                                                 <br><span class="help_text">Enter your Full Name</span>
                                                                                 </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">Date of Birth:</td>
                                <td align="left" valign="top"><input type="text" name="user_dob" id="user_dob" value="<?=$UserArray['user_dob']?>">
                                <br><span class="help_text">Date of Birth in format yyyy/mm/dd</span>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">Phone Number:</td>
                                <td align="left" valign="top"><input type="text" name="user_phone" id="user_phone" value="<?=$UserArray['user_phone']?>">
                                <br><span class="help_text">Phone number with country code 919999999999</span>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">Address</td>
                                <td align="left" valign="top"><textarea name="user_address" id="user_address" cols="45"
                                                                        rows="5"><?=$UserArray['user_address']?></textarea></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top"><input type="submit" name="btnUpdate" id="btnUpdate"
                                                                     value="Update Profile"><br>
                                                                     <span class="required">* Marked fields are mandatory</span></td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </form>
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
<!-- -------------------------------------- Start: Footer Section ---------------------------------------- -->
<?php require_once(__TEMPLATE_PATH . "footer_section.php"); ?>
<!-- -------------------------------------- End: Footer Section ---------------------------------------- -->
</div>
<!-- -------------------------------------- End: Main Container ---------------------------------------- -->
</body>
<!-- ----------------------------------- End: Body Section -------------------------------------------- -->
</html>