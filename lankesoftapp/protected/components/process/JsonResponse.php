<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 2017/7/26 0026
 * Time: 23:33
 */

class JsonResponse
{
    private $code = 0;

    private $msg = array();

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return array
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param array $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    public function __toString()
    {
        return json_encode(
            array(
                'code' => $this->getCode(),
                'msg' => $this->getMsg(),
            )
        );
    }

}