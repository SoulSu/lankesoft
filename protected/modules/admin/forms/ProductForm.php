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

    public $views;

    public $type;

    public $ctime;


    public function rules()
    {
        return array(
            array('title, cate_id, keywords, describe, content, views, type, ctime', 'required'),
            array('cate_id, views, type', 'numerical'),
            array('ctime', 'checkDate'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'title' => '标题',
            'ctime' => '创建时间',
            'views' => '查看次数',
            'keywords' => '关键字',
            'describe' => '描述信息',
            'content' => '内容',
        );
    }

    public function checkDate($attribute, $param)
    {
        if (strtotime($this->ctime) !== false) {
            if (date('Y-m-d', strtotime($this->ctime)) != $this->ctime) {
                $this->addError($attribute, '发布日期错误');
            }
        }
    }

}