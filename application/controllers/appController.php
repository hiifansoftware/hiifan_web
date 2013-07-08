<?php
/**
 * SAAN FRAMEWORK
 *
 * @project: Core SAAN Framework
 * @purpose:
 *
 * @author: Saurabh Sinha
 * @created on: 02/14/13 8:55 PM
 *
 * @url: www.saaninfotech.com
 * @email: info@saaninfotech.com
 * @license: SAAN INFOTECH
 *
 */

/***********************************************************************/
class appController
{

    static function getTemplateByName($templateName)
    {
        return appModel::getTemplateByName($templateName);
    }

    static function logUserLogin($args)
    {
        $currentDatetime = time();
        $dataArray = array('user_type' => $args['account_type'],
                            'user_id' => $args['user_id'],
                            'ip_address' => $_SERVER['REMOTE_ADDR'],
                            'login_datetime' => $currentDatetime);
        return appModel::logUserLogin($dataArray);
    }

    static function getUserLoginInfoById($userArray)
    {
        if(is_array($userArray))
        {
            $loginArray = appModel::getUserLoginInfoById($userArray);
            return $loginArray[0]['login_datetime'];
        }
    }

    static function getUserFullNameById($userArray)
    {
        if(is_array($userArray))
        {
            $userNameArray = appModel::getUserFullNameById($userArray);
            if($userArray['account_type'] == '1')
            {
                return $userNameArray[0]['user_full_name'];
            }
            elseif($userArray['account_type'] == '2')
            {
                return $userNameArray[0]['merchant_name'];
            }
        }
    }

    static function getUserImageByUserType($userId, $userType = '1')
    {
        if($userType == '1')
        {
            if(file_exists(__UPLOAD_PATH . "profile_image/personal_user/" . $userId . ".jpg"))
            {
                return __UPLOAD_URL . "profile_image/personal_user/" . $userId . ".jpg";
            }
            else{
                return __UPLOAD_URL . "profile_image/default.jpg";
            }
        }
        elseif($userType == '2')
        {
            if(file_exists(__UPLOAD_PATH . "profile_image/merchant_user/" . $userId . ".jpg"))
            {
                return __UPLOAD_URL . "profile_image/merchant_user/" . $userId . ".jpg";
            }
            else{
                return __UPLOAD_URL . "profile_image/default.jpg";
            }
        }
    }
}
