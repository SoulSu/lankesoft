<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 2017/7/26 0026
 * Time: 21:54
 */
abstract class Utils
{


    /**
     * 记录日志
     * @param string $msg
     * @param array $data
     */
    public static function doLog($msg = '', $data = array())
    {
        $category = 'default';
        $msg = sprintf("%s : %s => %s", PROCID, $msg, json_encode($data));
        Yii::log($msg, CLogger::LEVEL_INFO, $category);
    }
}