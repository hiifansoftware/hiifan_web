<?php require_once(__TEMPLATE_PATH . "header.php"); ?>
<?php require_once(__TEMPLATE_PATH . "personal/user_header.php"); ?>
<script language="javascript" type="text/javascript">
	function showDetails(showDetailsId)
	{
		var finalId = "#" + showDetailsId;
		$('.transaction_details').hide();
		$(finalId).show();
	}
	$(document).ready(function(){
		$('.transaction_details').hide();
	});
</script>
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
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <?php
                    if(count($LoyaltyTranDetailsArray['result_set']) > 0)
                    {
                    ?>
                        <table width="98%" cellpadding="4" cellspacing="4" border="0" align="left" class="custom_table">
                    	<tr>
                        	<th width="8%">Sl No.</th>
                            <th width="40%">Name</th>
                            <th width="28%">Date</th>
                            <th width="14%">Amount</th>
                            <th>Action</th>
                        </tr>
                        <?   $i = 1;
                        foreach($LoyaltyTranDetailsArray['result_set'] as $transactionArray){
                            
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$transactionArray['merchant_name']?></td>
                                <td><?=General::getFormatedDate($transactionArray['shopping_date'])?></td>
                                <td><?=$transactionArray['shopping_total_amount']?></td>
                                <td><a href="javascript:void(0);" class="red_button" style='color:#fff; font-size:10px;' id="<?=$transactionArray['shopping_id']?>" onClick="showDetails('div_' + <?=$transactionArray['shopping_id']?>)">View</a></td>
                            </tr>
                            <tr class="transaction_details" id="div_<?=$transactionArray['shopping_id']?>" style="background-color:#FFFFFF;">
                               	<td colspan="5" >
                                    	<table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#FFFFFF;">
                                        	<tr>
                                            	<td width="20%">Merchant Name:</td>
                                                <td width="40%"><?=$transactionArray['merchant_name']?></td>
                                                <td width="20%">Total Amount:</td>
                                                <td width="20%"><?=$transactionArray['shopping_total_amount']?> USD</td>
                                            </tr>
                                            <tr>
                                            	<td>Card Number:</td>
                                                <td><?=$transactionArray['cardnumber_value']?></td>
                                                <td>Discount %:</td>
                                                <td><?=$transactionArray['shopping_discount_value']?></td>
                                            </tr>
                                            <tr>
                                            	<td>POS Id:</td>
                                                <td><?=$transactionArray['pos_id']?></td>
                                                <td>Discount Amount:</td>
                                                <td><?=$discountAmount = (($transactionArray['shopping_total_amount'] * $transactionArray['shopping_discount_value'])/100)?> USD</td>
                                            </tr>
                                            <tr>
                                            	<td>Date Time:</td>
                                                <td><?=General::getFormatedDate($transactionArray['shopping_date'])?></td>
                                                <td style="background-color:#66CCFF;"><strong>Amount Paid:</strong></td>
                                                <td style="background-color:#66CCFF;"><strong><?=($transactionArray['shopping_total_amount']-$discountAmount)?> USD</strong></td>
                                            </tr>
                                        </table>
                                </td> 
                            </tr>
                            <?  $i++; }?>

                    </table>
                    <?php
                    $paginationContent = General::getFullNavigation($LoyaltyTranDetailsArray['total_rows'], $LoyaltyTranDetailsArray['total_pages'], $PresentPage, "perTransaction/loyalty_transactions");
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