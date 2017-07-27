<?php


if (!function_exists('session')) {
    /**
     * @return CHttpSession
     */
    function session()
    {
        return Yii::app()->session;
    }
}

if (!function_exists('request')) {

    /**
     * @return CHttpRequest
     */
    function request()
    {
        return Yii::app()->request;
    }
}

if (!function_exists('yiilog')) {
    /**
     * @param string $msg
     */
    function yiilog($msg = '')
    {
        if (!is_string($msg)) $msg = json_encode($msg);
        $category = request()->getRequestUri();
        Yii::log($msg, CLogger::LEVEL_INFO, $category);
    }
}

if (!function_exists('user')){
    /**
     * @return CWebUser
     */
    function user()
    {
        return Yii::app()->user;
    }
}