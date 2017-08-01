<?php


class AdminForm extends CFormModel
{

    public $username;

    public $password;

    public $verificationCode;

    public function rules()
    {
        return array(
            array('username, password, verificationCode', 'required'),
            array('verificationCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()), // 校验验证码
        );
    }
}