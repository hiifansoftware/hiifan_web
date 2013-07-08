<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <form id="loginForm" name="loginForm" method="post" action="<?=__SITE_URL?>login" >
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="right_heading">Account Login</td>
                    </tr>
                    <tr>
                        <td align="left" valign="top" class="right_content">
                            <table width="84%" border="0" align="center" cellpadding="2" cellspacing="2">
                                <tr>
                                    <td align="left" valign="top">Email Address:</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><input type="text" name="user_email" id="user_email"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">HiiFan Password:</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><input type="password" name="user_password"
                                                                         id="user_password"/></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top">Account Type:</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><select name="account_type" id="account_type">
                                        <option value="1" selected="selected">Personal Account</option>
                                        <option value="2">Merchant Account</option>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><input type="submit" name="btn_login" id="btn_login"
                                                                         value="Login" class="login_button"/></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><a href="<?=__SITE_URL?>login/forgot_password">Problem with Login?</a></td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top"><a href="<?=__SITE_URL?>register">New to HiiFan? Signup</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>