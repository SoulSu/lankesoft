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

if (!function_exists('user')) {
    /**
     * @return CWebUser
     */
    function user()
    {
        return Yii::app()->user;
    }
}

if (!function_exists('getModelData')) {

    /**
     * @param CActiveRecord $model
     * @param $attribute
     * @param string $default
     * @return string
     */
    function getModelData($model, $attribute, $default = '')
    {
        if (empty($model->id)) {
            return $default;
        }
        return $model->$attribute;
    }
}


if (!function_exists('uploadFile')) {

    /**
     *
     * @param string $formName
     * @param string $dirPrefix
     * @return string
     */
    function uploadFile($formName = 'file', $dirPrefix = 'comm')
    {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            throw new RuntimeException('上传失败，请求方法未被允许');
        }
        @set_time_limit(5 * 60);

        $split = (int)(128 % rand(0, 128));
        $split1 = (int)(128 % rand(0, 128));

        $urlPath = 'public' . DIRECTORY_SEPARATOR . 'upload' .
            DIRECTORY_SEPARATOR . $dirPrefix . DIRECTORY_SEPARATOR . $split . DIRECTORY_SEPARATOR . $split1;
        $targetDir = PROJECT_ROOT_PATH . DIRECTORY_SEPARATOR . $urlPath;
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 077, true);
        }

        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES[$formName]["name"];
        } else {
            $fileName = uniqid("file_");
        }

        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $ext = DIRECTORY_SEPARATOR . uniqid(date('Ymdhis-')) . '.' . $extension;
        $filePath = $targetDir . $ext;
        $urlPath .= $ext;

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                throw new RuntimeException('上传文件失败');
            }

            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $filePath)) {
                throw new RuntimeException('移动上传文件失败');
            }
        }

        return $urlPath;
    }
}