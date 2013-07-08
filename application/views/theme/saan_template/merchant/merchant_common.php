<div class="acc-style4 accordion invent-accordion">
    <div class="acc-section">
        <?php
        $userInfoArray['account_type'] = '2';
        $userInfoArray['merchant_id'] = $_SESSION['mer_user_id'];
        $userNameArray = appController::getUserFullNameById($userInfoArray);
        ?>
        <h3 style="color: rgb(0, 0, 0);" class="active"><span class="invent-color">Welcome <?=($userNameArray == '')?"Merchant User":$userNameArray?>...</span></h3>

        <div class="acc-content">
            <div>
                <table width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                        <td>
                            <?php
                            $userLoginValue = appController::getUserLoginInfoById($userInfoArray);
                            ?>
                            Last Login: <?=($userLoginValue == '')?"First Time Login":General::getFormatedDate($userLoginValue)?> | Account Type: Merchant</td>
                    </tr>