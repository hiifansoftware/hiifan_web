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
                <td align="left" valign="top">
                    <h3 class="heading"><span class="invent-color">Privacy</span></h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
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