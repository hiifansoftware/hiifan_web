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
        <h1>Welcome Administrator...<span style="float:right">View Payable Experts</span></h1>
        <!-- Headings -->
        <div><?=General::getMessage()?></div>
        <table width="100%" cellpadding="3" cellspacing="3">
            <tr>
                <th>Sl. No.</th>
                <th>Email Address</th>
                <th>Amount Value</th>
            </tr>
            <?php
            if (is_array($PaymentArray) && count($PaymentArray) > 0) {
                $counter = 1;
                foreach ($PaymentArray as $emailKey => $amountValue) {
                    ?>
                    <tr>
                        <td><?=$counter?></td>
                        <td><?=$emailKey?></td>
                        <td>$<?=$amountValue?></td>
                    </tr>
                    <?php
                    $counter++;
                }
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