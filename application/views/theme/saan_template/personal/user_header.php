<?php
    General::validateSession('per_user_email', __SITE_URL);
?>
<link rel="stylesheet" type="text/css" href="<?=__TEMPLATE_URL?>styles/user_styles.css" />
<script language="javascript" type="text/javascript">
	var controllerName = "<?=SaanController::$controllerName?>";
	var actionName = "<?=SaanController::$actionName?>";
</script>
<script language="javascript" type="text/javascript" src="<?=__TEMPLATE_URL?>scripts/user_script.js"></script>
