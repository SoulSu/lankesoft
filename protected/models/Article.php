<?php

/**
 * This is the model class for table "article".
 *
 * The followings are the available columns in table 'article':
 * @property integer $id
 * @property string $title
 * @property integer $cate_id
 * @property integer $releasetime
 * @property string $author
 * @property string $describe
 * @property string $thumbnail
 * @property string $content
 * @property integer $sort
 * @property integer $ispass
 * @property integer $views
 * @property integer $mtime
 * @property integer $ctime
 */
class Article extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('describe, content', 'required'),
			array('cate_id, releasetime, sort, ispass, views, mtime, ctime', 'numerical', 'integerOnly'=>true),
			array('title, thumbnail', 'length', 'max'=>128),
			array('author', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, cate_id, releasetime, author, describe, thumbnail, content, sort, ispass, views, mtime, ctime', 'safe', 'on'=>'search'),
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
			'releasetime' => '发布日期',
			'author' => '作者',
			'describe' => '简介',
			'thumbnail' => '缩略图',
			'content' => '内容',
			'sort' => '显示顺序',
			'ispass' => '0,1 审核通过',
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
		$criteria->compare('releasetime',$this->releasetime);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('describe',$this->describe,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('ispass',$this->ispass);
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
	 * @return Article the static model class
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
