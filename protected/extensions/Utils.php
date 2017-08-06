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

    /**
     * @return string
     */
    public static function genSalt()
    {
        return base64_encode(md5(uniqid('salt', true)));
    }

    /**
     * @param string $registerPassword
     * @param string $salt
     * @return string
     */
    public static function genPassword($registerPassword = '', $salt = '')
    {
        return md5($salt . $registerPassword . $salt);
    }


    protected static $area = null;

    protected static function checkArea()
    {
        if (static::$area === null) {
            static::$area = include_once(PROJECT_ROOT_PATH . '/protected/config/area.php');
        }
    }

    public static function getArea()
    {
        self::checkArea();
        return static::$area;
    }

    public static function getProvice()
    {
        self::checkArea();
        $provices = array();

        foreach (self::$area as $key => $value) {
            $provices[$key] = array(
                'name' => $value['name'],
                'sub' => array(),
            );
        }
        ksort($provices);
        return $provices;
    }

    public static function getCity($provice)
    {
        self::checkArea();
        $citys = array();

        if (isset(self::$area[$provice])) {
            $citys = self::$area[$provice];
        }
        ksort($citys);
        return $citys;
    }


}