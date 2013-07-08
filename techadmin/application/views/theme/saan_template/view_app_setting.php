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
        <h1>Welcome Administrator...<span style="float:right">View App Setting Page</span></h1>
        <!-- Headings -->
        <div><?=General::getMessage()?></div>
        <table width="100%">
            <?php
            if (count($AppSettingListArray['result_set']) > 0) {
                ?>
                <tr>
                    <td align="right"><!--<a href="<?=__SITE_URL?>adminhome/add_category">Add New Expert</a> --></td>
                </tr>
                <tr>
                    <td align="center">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <th width="5%">Sl No.</th>
                                <th width="15%">App Setting Name</th>
                                <th width="37%">Description</th>
                                <th width="9%" align="center">Actions</th>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                            <?php
                            $i = 1;
                            foreach ($AppSettingListArray['result_set'] as $appSettingArray) {
                                ?>
                                <tr>

                                    <td><?=$i?></td>
                                    <td><?=$appSettingArray['app_setting_name']?></td>
                                    <td><?=$appSettingArray['app_setting_value']?></td>
                                    <td>
                                        <a title="Edit Setting"
                                           href="<?=__SITE_URL?>adminhome/editAppSetting/app_setting_id:<?=$this->registry->security->encryptData($appSettingArray['app_setting_id'])?>">
                                            <img src="<?=__TEMPLATE_URL . "images/edit.png"?>">
                                        </a>
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
                        $paginationContent = General::getFullNavigation($AppSettingListArray['total_rows'], $AppSettingListArray['total_pages'], $PresentPage, "adminhome/view_app_setting");
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