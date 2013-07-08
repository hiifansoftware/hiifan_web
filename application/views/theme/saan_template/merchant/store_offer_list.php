<?php require_once(__TEMPLATE_PATH . "header.php"); ?>
<?php require_once(__TEMPLATE_PATH . "merchant/merchant_header.php"); ?>
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
                <td align="left"><a href="<?=__SITE_URL?>merTransaction/add_store_offer" class="red_button" style="color:#FFFFFF;">Add New Offer</a></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <?php
                    if(count($OfferDetailsArray['result_set']) > 0)
                    {
                    ?>
                        <table width="98%" cellpadding="4" cellspacing="4" border="0" align="left" class="custom_table">
                    	<tr>
                        	<th>Sl No.</th>
                            <th>Offer Tag Line</th>
                            <th>Date Time</th>
                            <th>Mail Send?</th>
                            <th>Action</th>
                        </tr>
                        <?   $i = 1;
                        foreach($OfferDetailsArray['result_set'] as $offerArray){
                            $sendMailLink = "<a class='red_button' style='color:#fff; font-size:10px;' href='" . __SITE_URL ."merTransaction/send_offer_mail/offer_id:" . $offerArray['store_offer_id'] . "'>Send Mail</a>"
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$offerArray['store_offer_subject']?></td>
                                <td><?=General::getFormatedDate($offerArray['store_offer_datetime'])?></td>
                                <td><?=$offerArray['store_offer_issend']?></td>
                                <td><?=($offerArray['store_offer_issend'] == 'no')?"$sendMailLink":""?></td>
                            </tr>
                            <?  $i++; }?>

                    </table>
                    <?php
                    $paginationContent = General::getFullNavigation($OfferDetailsArray['total_rows'], $OfferDetailsArray['total_pages'], $PresentPage, "merTransaction/store_offers");
                    echo $paginationContent;
                }
                else
                {
                ?>
                    <div class="no_records">No Records Found!</div>
                <?php
                }
                ?>

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