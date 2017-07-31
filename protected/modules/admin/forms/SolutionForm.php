<?php

/**
 * 解决方案
 * Class ProductForm
 */
class SolutionForm extends CFormModel
{

    public $title;

    public $thumbnail;

    public $ctime;

    public $content;

    public $keywords;

    public $describe;

    public $sort;

    public $type;


    public function rules()
    {
        return array(
            array('title, keywords, describe, content, sort, type, ctime', 'required'),
            array('type, sort', 'numerical'),
            array('ctime', 'checkDate'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'title' => '标题',
            'thumbnail' => '缩略图',
            'ctime' => '创建时间',
            'views' => '查看次数',
            'keywords' => '关键字',
            'describe' => '描述信息',
            'content' => '内容',
            'sort' => '显示顺序',
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