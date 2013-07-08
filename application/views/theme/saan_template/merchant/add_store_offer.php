<?php require_once(__TEMPLATE_PATH . "header.php"); ?>
<?php require_once(__TEMPLATE_PATH . "merchant/merchant_header.php"); ?>
<script language="javascript" type="text/javascript"
        src="<?php echo __EXTERNAL_URL; ?>tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        theme:"advanced",
        mode:"exact",
        elements:"store_offer_content",
        height:"300px",
        width:"100%"
    });

</script>
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
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="75%" align="left" valign="top">
                    <!-- ---------------------------------------- Start: User Content Section --------------------------------------- -->
                    <?php require_once(__TEMPLATE_PATH . 'merchant/merchant_common.php'); ?>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <form name="frmAddStoreOffer" id="frmAddStoreOffer" action="" method="post" class="jqtransform">
                        <table width="80%" cellpadding="4" cellspacing="4" border="0" align="center">
                            <tr>
                                <td colspan="3" align="left" valign="top"><?=General::getMessage()?></td>
                            </tr>
                            <tr>
                                <td width="20%" align="left" valign="top">Offer Tag Line:<span class="required">*</span></td>
                                <td width="65%" align="left" valign="top"><input type="text" name="store_offer_subject"
                                                                                 id="store_offer_subject" value="<?=$PostRetain['store_offer_subject']?>">
                                                                                 <br><span class="help_text">Enter the Tag Line for the Offer</span>
                                                                                 </td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">Offer Content:<span class="required">*</span></td>
                                <td align="left" valign="top"><textarea name="store_offer_content" id="store_offer_content" cols="45" rows="5"><?=$PostRetain['store_offer_content']?></textarea></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top">&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="left" valign="top">&nbsp;</td>
                                <td align="left" valign="top"><input type="submit" name="btnAdd" id="btnAdd"
                                                                     value="Add New Offer"><br>
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