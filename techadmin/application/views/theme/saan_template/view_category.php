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
        <h1>Welcome Administrator...<span style="float:right">View Category Page</span></h1>
        <!-- Headings -->
        <div>&nbsp;</div>
        <table width="100%">
            <tr>
                <td align="right"><a href="<?=__SITE_URL?>adminhome/add_category">Add New Category</a></td>
            </tr>
            <tr>
                <td align="center">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th>Sl No.</th>
                            <th>Category Name</th>
                            <th>Category Discription</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <?   $i = 1;
                        foreach ($CatDetailsArray['result_set'] as $catArray) {
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$catArray['expert_category_name']?></td>
                                <td><?=$catArray['expert_category_description']?></td>
                                <td>
                                    <a href="<?=__SITE_URL?>adminhome/deleteCat/id:<?=$this->registry->security->encryptData($catArray['expert_category_id'])?>"
                                       onClick="return confirm('Do You really Want To Delete This?');">
                                        <img src="<?php echo __TEMPLATE_URL; ?>images/del.png" title="Delete Category">
                                    </a>
                                    <!--
                                <?php
                                        if ($catArray['expert_category_status'] == 'active') {
                                            ?>
                                    <a title="Deactivate Expert" href="<?= __SITE_URL ?>adminhome/changeCategoryStatus/id:<?= $this->registry->security->encryptData($catArray['expert_category_id']) ?>/status:<?= $this->registry->security->encryptData($catArray['expert_category_status']) ?>" onClick="return confirm('Do You really Want To Change the Status?');">
                                        <img src="<?= __TEMPLATE_URL . "images/ico-done.gif" ?>">
                                    </a>
                                    <?php
                                        } else {
                                            ?>
                                    <a title="Activate Expert" href="<?= __SITE_URL ?>adminhome/changeCategoryStatus/id:<?= $this->registry->security->encryptData($catArray['expert_category_id']) ?>/status:<?= $this->registry->security->encryptData($catArray['expert_category_status']) ?>" onClick="return confirm('Do You really Want To Change the Status?');">
                                        <img src="<?= __TEMPLATE_URL . "images/ico-warning.gif" ?>">
                                    </a>
                                    <?php
                                        }
                                        ?>
                                -->
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
                    $paginationContent = General::getFullNavigation($CatDetailsArray['total_rows'], $CatDetailsArray['total_pages'], $PresentPage, "adminhome/view_category");
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