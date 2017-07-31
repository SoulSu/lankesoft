<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 2017/7/26 0026
 * Time: 23:33
 */

class JsonResponse
{
    /**
     * @var int
     */
    private $code = 0;

    /**
     * @var array
     */
    private $data = array();

    /**
     * @var string
     */
    private $msg = '';

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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param string $msg
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
                'data' => $this->getData(),
                'msg' => $this->getMsg(),
            )
        );
    }

}