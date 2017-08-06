<?php

class ArticleForm extends CFormModel
{

    public $title;
    public $cate_id;
    public $releasetime;
    public $author;
    public $describe;
    public $thumbnail;
    public $content;
    public $sort;
    public $ispass;
    public $views;


    public function rules()
    {
        return array(
            array('title, cate_id, releasetime, author, describe, content, sort, ispass', 'required'),
            array('releasetime', 'checkDate'),
        );
    }


    public function checkDate($attribute, $param)
    {
        if (strtotime($this->releasetime) !== false) {
            if (date('Y-m-d', strtotime($this->releasetime)) != $this->releasetime) {
                $this->addError($attribute, '发布日期错误');
            }
        }
    }

}