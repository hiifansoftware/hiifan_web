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
        <h1>Welcome Administrator...<span style="float:right">Add Category Page</span></h1>
        <!-- Headings -->
        <div>&nbsp;</div>
        <form name="form1" method="post" action="<?=__SITE_URL?>adminhome/addExpertCategory" id="form1">
            <table width="100%">
                <div align="right"><a href="<?=__SITE_URL?>adminhome/view_category">View All Category</a></div>
                <tr>
                    <td align="center">
                        <table width="60%" border="0" cellspacing="4" cellpadding="4" align="center">
                            <tr>
                                <td colspan="2" align="center"><?=General::getMessage()?></td>
                            </tr>
                            <tr>
                                <td>Category Name:</td>
                                <td><input type="text" name="expert_category_name"
                                           value="<?=$PostRetain['expert_category_name']?>" id="textfield"></td>
                            </tr>

                            <tr>
                                <td>Category Discription:</td>
                                <td><input type="text" name="expert_category_description"
                                           value="<?=$PostRetain['expert_category_description']?>" id="textfield"></td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="button" id="button" value="Add Category"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
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