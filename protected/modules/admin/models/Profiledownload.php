<?php

/**
 * This is the model class for table "profiledownload".
 *
 * The followings are the available columns in table 'profiledownload':
 * @property integer $id
 * @property string $title
 * @property integer $cate_id
 * @property integer $sort
 * @property string $filesize
 * @property string $fileproperty
 * @property string $describe
 * @property string $content
 * @property string $attach
 * @property string $thumbnail
 * @property integer $downloadnums
 * @property integer $update
 * @property integer $mtime
 * @property integer $ctime
 */
class Profiledownload extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profiledownload';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('describe, content, attach, thumbnail, update, mtime, ctime', 'required'),
			array('cate_id, sort, downloadnums, update, mtime, ctime', 'numerical', 'integerOnly'=>true),
			array('title, filesize, fileproperty, thumbnail', 'length', 'max'=>128),
			array('attach', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, cate_id, sort, filesize, fileproperty, describe, content, attach, thumbnail, downloadnums, update, mtime, ctime', 'safe', 'on'=>'search'),
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
			'id' => '主键',
			'title' => '文章标题',
			'cate_id' => '产品分类',
			'sort' => '排序',
			'filesize' => '文件大小',
			'fileproperty' => '文件性质',
			'describe' => '文件简介',
			'content' => '文件介绍',
			'attach' => '文件附件',
			'thumbnail' => '缩略图',
			'downloadnums' => '下载次数',
			'update' => '更新日期',
			'mtime' => '最后修改时间',
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
		$criteria->compare('filesize',$this->filesize,true);
		$criteria->compare('fileproperty',$this->fileproperty,true);
		$criteria->compare('describe',$this->describe,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('attach',$this->attach,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('downloadnums',$this->downloadnums);
		$criteria->compare('update',$this->update);
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
	 * @return Profiledownload the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
