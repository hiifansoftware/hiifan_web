<?php require_once('header.php'); ?>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {

    });

    function manageAmount(elementId) {
        var priceValue = parseFloat(document.getElementById(elementId).value);
        var totalPriceValue = parseFloat(document.getElementById('total_amount_value').value);
        var totalExpertsSelected = parseInt(document.getElementById('total_experts_selected').value);
        if (document.getElementById(elementId).checked) {
            totalExpertsSelected = totalExpertsSelected + 1;
            document.getElementById('total_experts_selected').value = totalExpertsSelected;
            document.getElementById('show_expert_count').innerHTML = totalExpertsSelected;

            totalPriceValue = totalPriceValue + priceValue;
            document.getElementById('total_amount_value').value = totalPriceValue.toFixed(2);
            document.getElementById('show_amount').innerHTML = totalPriceValue.toFixed(2);
        }
        else if (!(document.getElementById(elementId).checked)) {
            if (totalExpertsSelected != 0) {
                totalExpertsSelected = totalExpertsSelected - 1;
            }
            else {
                totalExpertsSelected = 0;
            }
            document.getElementById('total_experts_selected').value = totalExpertsSelected;
            document.getElementById('show_expert_count').innerHTML = totalExpertsSelected;

            totalPriceValue = totalPriceValue - priceValue;
            document.getElementById('total_amount_value').value = totalPriceValue.toFixed(2);
            document.getElementById('show_amount').innerHTML = totalPriceValue.toFixed(2);
        }
    }
</script>
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
        <h1>Welcome Administrator...<span style="float:right">View Payable Experts</span></h1>
        <!-- Headings -->
        <div><?=General::getMessage()?></div>
        <?php
        if (count($ExpertPayableListArray) > 0) {
            ?>
            <form name="mass_payment" id="mass_payment" action="" method="POST">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center"
                            style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; font-weight:bold;">
                            Total Payable Amount: $<span id="show_amount" style="color:#FF0000;">0.00</span> <input
                                type="hidden" value="0" name="total_amount_value" id="total_amount_value">| Total
                            Selected
                            Experts: <span id="show_expert_count" style="color:#FF0000;">0</span><input type="hidden"
                                                                                                        value="0"
                                                                                                        name="total_experts_selected"
                                                                                                        id="total_experts_selected">
                            <br>
                            <input class="sensitive" type="submit" name="payment_button" id="payment_button_top"
                                   value="Continue Payment">
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0"
                                   style="border:1px #666666 solid;">
                                <?php
                                if (is_array($ExpertPayableListArray)) {
                                    $counter = 1;
                                    echo "<tr>";
                                    foreach ($ExpertPayableListArray as $expertPayableArray) {
                                        if (($counter % 6) == 0) {
                                            $counter = 1;
                                            echo "</tr><tr>";
                                        } else {
                                            $finalValue = __FRONT_UPLOAD_URL . "expert_profile_image/default.jpg";
                                            if (file_exists(__FRONT_UPLOAD_PATH . "expert_profile_image/" . $expertPayableArray['expert_photo'])) {
                                                $finalValue = __FRONT_UPLOAD_URL . "expert_profile_image/" . $expertPayableArray['expert_photo'];
                                            }
                                            ?>
                                            <td align='center'>
                                                <img src="<?=$finalValue?>" width="85" height="85">
                                                <br>
                                                <input onClick="manageAmount('selected_experts<?=$expertPayableArray['expert_id']?>');"
                                                       class="selected_experts" style="width:22px;" type="checkbox"
                                                       name="selected_experts[<?=$expertPayableArray['expert_paypal']?>]"
                                                       id="selected_experts<?=$expertPayableArray['expert_id']?>"
                                                       value="<?=$expertPayableArray['amount_due_value']?>"><?=$expertPayableArray['expert_name']?>
                                                <br>
                                                <strong>Due
                                                    Amount:$<?=$expertPayableArray['amount_due_value']?></strong>
                                            </td>
                                            <?php
                                        }
                                        $counter++;
                                    }
                                }
                                ?>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input class="sensitive" type="submit" name="payment_button" id="payment_button_bottom"
                                   value="Continue Payment">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
        } else {
            echo "<br><div align='center'>There are no Payable Experts.</div>";
        }
        ?>

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