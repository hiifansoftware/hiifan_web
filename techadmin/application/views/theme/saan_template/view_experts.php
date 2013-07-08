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
        <h1>Welcome Administrator...<span style="float:right">View Experts Page</span></h1>
        <!-- Headings -->
        <div><?=General::getMessage()?></div>
        <table width="100%">
            <tr>
                <td align="right"><!--<a href="<?=__SITE_URL?>adminhome/add_category">Add New Expert</a> --></td>
            </tr>
            <tr>
                <td align="center">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th width="2%">S</th>
                            <th width="5%">Sl No.</th>
                            <th width="5%">Photo</th>
                            <th width="15%">Name</th>
                            <th width="13%">Category</th>
                            <th width="19%">Email</th>
                            <th width="12%">Phone</th>
                            <th width="13%">Paypal</th>
                            <th width="7%">Status</th>
                            <th width="11%" align="center">Actions</th>
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
                            <td></td>
                            <td></td>
                        </tr>

                        <?php
                        $i = 1;
                        foreach ($ExpertListArray['result_set'] as $expertArray) {
                            ?>
                            <tr>
                                <td><input type="checkbox" name="expert_id[]" value="<?=$expertArray['expert_id']?>"
                                           style="width:20px;"></td>
                                <td><?=$i?></td>
                                <td>
                                    <?php
                                    $finalValue = __FRONT_UPLOAD_URL . "expert_profile_image/default.jpg";
                                    if (file_exists(__FRONT_UPLOAD_PATH . "expert_profile_image/" . $expertArray['expert_photo'])) {
                                        $finalValue = __FRONT_UPLOAD_URL . "expert_profile_image/" . $expertArray['expert_photo'];
                                    }
                                    ?>
                                    <img src="<?=$finalValue?>" width="35" height="35">
                                </td>
                                <td><?=$expertArray['expert_name']?></td>
                                <td><?=$expertArray['expert_category_name']?></td>
                                <td><?=$expertArray['expert_email']?></td>
                                <td><?=$expertArray['expert_phone_number']?></td>
                                <td><?=$expertArray['expert_paypal']?></td>
                                <td><?=$expertArray['expert_status']?></td>
                                <td>
                                    <a title="Delete Expert"
                                       href="<?=__SITE_URL?>adminhome/deleteExpert/expert_id:<?=$this->registry->security->encryptData($expertArray['expert_id'])?>"
                                       onClick="return confirm('Do You really Want To Delete This?');">
                                        <img src="<?=__TEMPLATE_URL . "images/del.png"?>">
                                    </a>
                                    <?php
                                    if ($expertArray['expert_status'] == 'active') {
                                        ?>
                                        <a title="Deactivate Expert"
                                           onClick="return confirm('Do you want to change the status');"
                                           href="<?=__SITE_URL?>adminhome/deactivateExpert/expert_id:<?=$this->registry->security->encryptData($expertArray['expert_id'])?>">
                                            <img src="<?=__TEMPLATE_URL . "images/ico-done.gif" ?>">
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a title="Activate Expert"
                                           onClick="return confirm('Do you want to change the status');"
                                           href="<?=__SITE_URL?>adminhome/activateExpert/expert_id:<?=$this->registry->security->encryptData($expertArray['expert_id'])?>">
                                            <img src="<?=__TEMPLATE_URL . "images/ico-warning.gif" ?>">
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <? $i++;
                        }?>

                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
                    $paginationContent = General::getFullNavigation($ExpertListArray['total_rows'], $ExpertListArray['total_pages'], $PresentPage, "adminhome/view_experts");
                    echo $paginationContent;
                    ?>
                </td>
            </tr>
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