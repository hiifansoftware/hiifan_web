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
        <h1>Welcome Administrator...<span style="float:right">View Experts Payment Page</span></h1>
        <!-- Headings -->
        <div><?=General::getMessage()?></div>
        <table width="100%">
            <?php
            if (count($ExpertPaymentListArray['result_set']) > 0) {
                ?>
                <tr>
                    <td align="right"><!--<a href="<?=__SITE_URL?>adminhome/add_category">Add New Expert</a> --></td>
                </tr>
                <tr>
                    <td align="center">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <th width="6%">Sl No.</th>
                                <th width="10%">&nbsp;</th>
                                <th width="19%">Name</th>
                                <th width="19%">Email</th>
                                <th width="18%">Phone Number</th>
                                <th width="7%">Total Paid</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <?php
                            $i = 1;
                            foreach ($ExpertPaymentListArray['result_set'] as $expertPaymentArray) {
                                ?>
                                <tr>
                                    <td valign="top" align="left"><?=$i?></td>
                                    <td valign="top" align="left">
                                        <?php
                                        $finalValue = __FRONT_UPLOAD_URL . "expert_profile_image/default.jpg";
                                        if (file_exists(__FRONT_UPLOAD_PATH . "expert_profile_image/" . $expertPaymentArray['expert_photo'])) {
                                            $finalValue = __FRONT_UPLOAD_URL . "expert_profile_image/" . $expertPaymentArray['expert_photo'];
                                        }
                                        ?>
                                        <img src="<?=$finalValue?>" width="40" height="40">
                                    </td>
                                    <td valign="top" align="left"><?=$expertPaymentArray['expert_name']?></td>
                                    <td valign="top" align="left"><?=$expertPaymentArray['expert_email']?></td>
                                    <td valign="top" align="left"><?=$expertPaymentArray['expert_phone_number']?></td>
                                    <td valign="top" align="left">
                                        $<?=$expertPaymentArray['paid_amount']?></td>
                                </tr>
                                <? $i++;
                            }?>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        $paginationContent = General::getFullNavigation($ExpertPaymentListArray['total_rows'], $ExpertPaymentListArray['total_pages'], $PresentPage, "adminhome/view_expert_payment");
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