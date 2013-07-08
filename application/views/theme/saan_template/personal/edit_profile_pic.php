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
                    <form action="" method="post" enctype="multipart/form-data" name="frmEditProfilePic" class="jqtransform" id="frmEditProfilePic">
                        <table width="80%" cellpadding="4" cellspacing="4" border="0" align="center">
                            <tr>
                                <td colspan="3" align="left" valign="top"><?=General::getMessage()?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="left" valign="top">Choose Photo:</td>
                                <td width="65%" align="left" valign="top">
                                <input type="file" name="user_pic" id="user_pic"><br>
                                <span class="help_text">.jpg | .png | .gif | .jpeg</span>
                                </td>
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
                                                                     value="Update Profile Pic"><br>
                                                                     </td>
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