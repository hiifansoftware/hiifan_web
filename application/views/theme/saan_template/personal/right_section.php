<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td>
            <div class="acc-style4 accordion invent-accordion">
                <div class="acc-section">

                    <div class="acc-content">
                        <div style="margin-bottom:10px;">
                        	<table width="96%" cellpadding="0" cellspacing="0">
                            	<tr>
                                	<td align="center" valign="top">
                            			<img src="<?=appController::getUserImageByUserType($_SESSION['per_user_id'], '1')?>?ver=<?=time()?>" style="border-radius:5px; border: 2px #ffffff solid; max-width:100px; max-height:100px;">
                                    </td>
                                </tr>
                                <tr>
                                	<td align="center" valign="top">
                            			<strong><?=($userNameArray == '')?"Personal User":$userNameArray?></strong>
                                    </td>
                                </tr>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="acc-style4 accordion invent-accordion">
                <div class="acc-section">
                    <h3 style="color: rgb(0, 0, 0);" class="active"><span class="invent-color">Notifications</span></h3>

                    <div class="acc-content">
                        <div style="margin-bottom:10px;"> No recent notification!</div>
                    </div>
                </div>
            </div>
        </td>
    </tr>
    <td>
        <div class="acc-style4 accordion invent-accordion">
            <div class="acc-section">
                <h3 style="color: rgb(0, 0, 0);" class="active"><span class="invent-color">Statistics</span></h3>

                <div class="acc-content">
                    <div>
                        <ul>
                            <li>Funds:</li>
                            <li>Email Status:</li>
                            <li>Phone Status:</li>
                            <li>Profile Status:</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </td>
    </tr>
</table>