<?php

/**
 * This is the model class for table "projectcase".
 *
 * The followings are the available columns in table 'projectcase':
 * @property integer $id
 * @property string $title
 * @property integer $cate_id
 * @property integer $provice_code
 * @property integer $city_code
 * @property integer $area_code
 * @property integer $bid_time
 * @property string $scale
 * @property string $address
 * @property string $overview
 * @property string $situation
 * @property string $completion
 * @property integer $sort
 * @property string $thumbnail
 * @property integer $views
 * @property integer $mtime
 * @property integer $ctime
 */
class Projectcase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projectcase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('scale, address, overview, situation, completion', 'required'),
			array('cate_id, provice_code, city_code, area_code, sort, views, mtime, ctime', 'numerical', 'integerOnly'=>true),
			array('bid_time', 'length', 'max'=>32),
			array('title, thumbnail', 'length', 'max'=>128),
			// The following rule is used by search().
//			array('id, title, cate_id, provice_code, city_code, area_code, bid_time, scale, address, overview, situation, completion, sort, thumbnail, views, mtime, ctime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
        return array(
            'cate' => array(self::BELONGS_TO, 'Cate', 'cate_id')
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => '文章标题',
			'cate_id' => '产品分类',
			'provice_code' => '省code',
			'city_code' => '市code',
			'area_code' => '区code',
			'bid_time' => '中标时间',
			'scale' => '项目规模',
			'address' => '项目地址',
			'overview' => '项目概况',
			'situation' => '项目应用情况',
			'completion' => '项目完成情况',
			'sort' => '排序',
			'thumbnail' => '缩略图',
			'views' => '浏览次数',
			'mtime' => '修改时间',
			'ctime' => '创建时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('cate_id',$this->cate_id);
		$criteria->compare('provice_code',$this->provice_code);
		$criteria->compare('city_code',$this->city_code);
		$criteria->compare('area_code',$this->area_code);
		$criteria->compare('bid_time',$this->bid_time, true);
		$criteria->compare('scale',$this->scale,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('overview',$this->overview,true);
		$criteria->compare('situation',$this->situation,true);
		$criteria->compare('completion',$this->completion,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('views',$this->views);
		$criteria->compare('mtime',$this->mtime);
		$criteria->compare('ctime',$this->ctime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projectcase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeSave()
    {
        $this->mtime = NOW;
        return true;
    }

}
