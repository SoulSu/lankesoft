<?php

/**
 * 产品列表
 * Class ProductForm
 */
class ProductForm extends CFormModel
{

    public $title;

    public $cate_id;

    public $keywords;

    public $describe;

    public $content;


    public function rules()
    {
        return array(
            array('username, password, verificationCode', 'required'),
            array('verificationCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()), // 校验验证码
        );
    }
}