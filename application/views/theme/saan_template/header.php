<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<!-- ----------------------------------- Start: Head Section -------------------------------------------- -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="canonical" href="http://www.hiifan.com" />
    <meta name="description" content="<?=$Description?>">
    <meta name="keywords" content="<?=$Keywords?>">
    <meta name="author" content="SAAN Infotech">
    <meta charset="UTF-8">
    <meta property="og:image" content="http://www.hiifan.com/application/views/theme/saan_template/images/logo.png"/>
    <link rel="stylesheet" type="text/css" href="<?=__TEMPLATE_URL?>styles/styles.css"/>
    <link type='text/css' href='<?=__TEMPLATE_URL?>styles/basic.css' rel='stylesheet' media='screen' />
    <link rel="stylesheet" href="<?=__TEMPLATE_URL?>plugins/jqtransformplugin/jqtransform.css" media="screen">
    <script type="text/javascript" src="<?=__TEMPLATE_URL?>scripts/jquery.js"></script>
    <script language="javascript" type="text/javascript">
        $(function() {
            //find all form with class jqtransform and apply the plugin
            jQuery("form.jqtransform").jqTransform();
			$('#floatingbar').css({height: 0}).animate({ height: '0' }, 'slow');
        });
    </script>
    <script type="text/javascript" src="<?=__TEMPLATE_URL?>plugins/jqtransformplugin/jquery.jqtransform.js"></script>
	<script type='text/javascript' src='<?=__TEMPLATE_URL?>scripts/jquery.simplemodal.js'></script>
	<script type='text/javascript' src='<?=__TEMPLATE_URL?>scripts/basic.js'></script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    <title><?=$Title?></title>
    <?php
	$imageArray = array('bg.jpg', 'bg2.jpg', 'bg3.jpg', 'image4.jpg', 'image5.jpg');
	$randomNum = rand(0,4);
	
	?>
    <style type="text/css">
	body
	{
		background: url(<?=__TEMPLATE_URL?>images/<?=$imageArray[$randomNum]?>) fixed center;
	}
	</style>