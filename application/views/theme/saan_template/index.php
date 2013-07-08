<?php require_once(__TEMPLATE_PATH . "header.php"); ?>
</head>
<!-- ----------------------------------- End: Head Section -------------------------------------------- -->
<!-- ----------------------------------- Start: Body Section -------------------------------------------- -->
<body>
<!-- -------------------------------------- Start: Main Container ---------------------------------------- -->
<div class="main_container">
    <!-- -------------------------------------- Start: Header Section ---------------------------------------- -->
    <?php require_once(__TEMPLATE_PATH . "header_section.php"); ?>
    <!-- -------------------------------------- End: Header Section ---------------------------------------- -->
    <!-- -------------------------------------- Start: Content Section ---------------------------------------- -->
    <div class="content">
        <!-- -------------------------------------- Start: Menu Section ---------------------------------------- -->
        <?php require_once(__TEMPLATE_PATH . "menu_section.php"); ?>
        <!-- -------------------------------------- End: Menu Section ---------------------------------------- -->
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td align="left" valign="top" width="74%"><?=General::getMessage()?></td>
                <td align="left" valign="top" width="1%">&nbsp;</td>
                <td align="left" valign="top" width="25%">&nbsp;</td>
            </tr>
            <tr>
                <td align="left" valign="top"><img src="<?=__TEMPLATE_URL?>images/home_upper1.jpg" width="100%" height="274" alt=""/></td>
                <td align="left" valign="top">&nbsp;</td>
                <td align="left" valign="top">
                    <!-- ------------------------------------ Start: Login section ------------------------------------ -->
                    <?php require_once(__TEMPLATE_PATH . "login_section.php"); ?>
                    <!-- ------------------------------------ End: Login section ------------------------------------ -->                </td>
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