<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Core SAAN Framework
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 1/14/13 9:23 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class appModel
{
    static $db;

    static function setDB($db)
    {
        self::$db = $db;
    }

    static function getTemplateByName($templateName)
    {
        $query = "SELECT * FROM email_template_details WHERE email_template_name = '$templateName' and email_template_status = 'active'";

        return self::$db->fetch_rows($query);
    }

    static function logUserLogin($dataArray)
    {
        return self::$db->query_insert('login_details', $dataArray);
    }

    static function getUserLoginInfoById($userArray)
    {
        if(is_array($userArray))
        {
            $query = "SELECT login_datetime FROM login_details WHERE user_type = '" . $userArray['account_type'] . "'
                                                                    AND user_id = '" . $userArray['user_id'] . "'
                                                                    ORDER BY login_id DESC LIMIT 1, 1";
            return self::$db->fetch_rows($query);
        }
    }

    static function getUserFullNameById($userArray)
    {
        if(is_array($userArray))
        {
            if($userArray['account_type'] == '1')
            {
                $query = "SELECT user_full_name FROM user_details WHERE user_id = '" . $userArray['user_id'] . "'";
            }
            elseif($userArray['account_type'] == '2')
            {
                $query = "SELECT merchant_name FROM merchant_details WHERE merchant_id = '" . $userArray['merchant_id'] . "'";
            }
            return self::$db->fetch_rows($query);
        }
    }

}
