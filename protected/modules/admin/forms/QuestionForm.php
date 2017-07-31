<?php

/**
 * 问题列表
 * Class ProductForm
 */
class QuestionForm extends CFormModel
{

    public $title;

    public $cate_id;

    public $content;

    public $sort;

    public $type;


    public function rules()
    {
        return array(
            array('title, cate_id, content, type, sort', 'required'),
            array('cate_id, type', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'title' => '标题',
            'sort' => '显示顺序',
            'content' => '内容',
        );
    }

}