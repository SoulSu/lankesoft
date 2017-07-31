<?php

/**
 * 产品演示列表
 * Class ProductForm
 */
class ProductDemoForm extends CFormModel
{

    public $title;

    public $cate_id;

    public $thumbnail;

    public $content;

    public $describe;

    public $sort;

    public $type;


    public function rules()
    {
        return array(
            array('title, cate_id, describe, content, type, sort', 'required'),
            array('cate_id, type', 'numerical'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'title' => '标题',
            'sort' => '显示顺序',
            'thumbnail' => '缩略图',
            'describe' => '描述信息',
            'content' => '内容',
        );
    }

}