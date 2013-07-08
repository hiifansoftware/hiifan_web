<?php require_once('header.php'); ?>
</head>
<body>
<?php require_once('header_content.php'); ?>
<!-- /header -->
<hr class="noscreen"/>

<!-- Columns -->
<div id="cols" class="box">
    <!-- Aside (Left Column) -->
    <div id="aside" class="box">
        <div class="padding box">
            <!-- Logo (Max. width = 200px) -->
            <p id="logo"><a href="#"><img src="<?=__TEMPLATE_URL?>images/logo.png" alt="Our logo"
                                          title="Visit Site"/></a></p>

            <!-- Search -->
            <?php //require_once('advanced_search.php'); ?>

            <!-- Create a new project -->

        </div>
        <!-- /padding -->

        <?php require_once('left_menu.php'); ?>
    </div>
    <!-- /aside -->
    <hr class="noscreen"/>
    <!-- Content (Right Column) -->
    <div id="content" class="box">
        <h1>Welcome Administrator...<span style="float:right">View Transaction Page</span></h1>
        <!-- Headings -->
        <div><?=General::getMessage()?></div>
        <table width="100%">
            <?php
            if (count($TransactionListArray['result_set']) > 0) {
                ?>
                <tr>
                    <td align="right"><!--<a href="<?=__SITE_URL?>adminhome/add_category">Add New Expert</a> --></td>
                </tr>
                <tr>
                    <td align="center">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <th width="5%">Sl No.</th>
                                <th width="11%">Transaction Id</th>
                                <th width="16%">C Name</th>
                                <th width="15%">C Email</th>
                                <th width="12%">C Phone</th>
                                <th width="15%">Expert Name</th>
                                <th width="6%">Amount</th>
                                <th width="10%">Date</th>
                                <th width="10%">Payment Mode</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <?php
                            $i = 1;
                            foreach ($TransactionListArray['result_set'] as $transactionArray) {
                                ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$transactionArray['transaction_id']?></td>
                                    <td><?=$transactionArray['user_fullname']?></td>
                                    <td><?=$transactionArray['user_email_address']?></td>
                                    <td><?=$transactionArray['user_phone_number']?></td>
                                    <td><?=$transactionArray['expert_name']?></td>
                                    <td>$<?=$transactionArray['paid_amount']?></td>
                                    <td><?=General::getFormatedDate($transactionArray['paid_datetime'])?></td>
                                    <td><?=$transactionArray['payment_by']?></td>
                                </tr>
                                <? $i++;
                            }?>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $paginationContent = General::getFullNavigation($TransactionListArray['total_rows'], $TransactionListArray['total_pages'], $PresentPage, "adminhome/view_transactions");
                        echo $paginationContent;
                        ?>
                    </td>
                </tr>
                <?php
            } else {
                echo "<div class='no_records'>No Records Available</div>";
            }
            ?>

        </table>
    </div>
</div>
<!-- /content -->
</div>
<!-- /cols -->

<hr class="noscreen"/>

<!-- Footer -->
<?php require_once("footer.php"); ?>
<!-- /footer -->

</div> <!-- /main -->

</body>
</html>