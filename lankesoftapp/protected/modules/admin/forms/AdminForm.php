<?php


class AdminForm extends CFormModel
{

    const SESSION_VERIFICATIONCODE = 'verification';

    public $username;

    public $password;

    public $verificationCode;

    public function rules()
    {
        return array(
            array('username, password, verificationCode', 'required'),
            array('verificationCode', 'checkVerificationCode'),
        );
    }

    /**
     * 效验验证码
     */
    public function checkVerificationCode($attribute,$params)
    {
        if(session()->get(self::SESSION_VERIFICATIONCODE) !== $this->verificationCode){
            $this->addError($attribute,'验证码错误~');
        }
    }
}