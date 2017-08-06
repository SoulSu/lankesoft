<?php


class ProjectcaseForm extends CFormModel
{

    public $title;
    public $provice_code;
    public $city_code;
    public $area_code;
    public $cate_id;
    public $bid_time;
    public $scale;
    public $address;
    public $overview;
    public $situation;
    public $completion;
    public $sort;
    public $thumbnail;
    public $views;

    public function rules()
    {
        return array(
            array('title, provice_code, city_code, area_code, bid_time, cate_id, scale, address, overview, situation, completion, sort, views', 'required'),
        );
    }
}