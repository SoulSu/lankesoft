<?php

/**
 * This is the model class for table "product_demo".
 *
 * The followings are the available columns in table 'product_demo':
 * @property integer $id
 * @property string $title
 * @property integer $cate_id
 * @property integer $sort
 * @property string $thumbnail
 * @property string $content
 * @property integer $views
 * @property integer $mtime
 * @property integer $ctime
 */
class ProductDemo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'product_demo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content', 'required'),
			array('cate_id, sort, views, mtime, ctime', 'numerical', 'integerOnly'=>true),
			array('title, thumbnail', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, cate_id, sort, thumbnail, content, views, mtime, ctime', 'safe', 'on'=>'search'),
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
			'sort' => '排序',
			'thumbnail' => '缩略图',
			'content' => '内容',
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
		$criteria->compare('sort',$this->sort);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('content',$this->content,true);
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
	 * @return ProductDemo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
