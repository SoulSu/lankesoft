<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $title
 * @property integer $cate_id
 * @property integer $type
 * @property string $keywords
 * @property string $thumbnail
 * @property string $describe
 * @property string $content
 * @property integer $sort
 * @property integer $views
 * @property integer $mtime
 * @property integer $ctime
 */
class Product extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'product';
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
            array('cate_id, type, sort, views, mtime, ctime', 'numerical', 'integerOnly' => true),
            array('title, keywords, thumbnail', 'length', 'max' => 128),
            array('describe', 'safe'),
            // The following rule is used by search().
            array('title, keywords', 'safe', 'on' => 'search'),
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
            'type' => '分类类型，产品列表|产品演示表|常见问题',
            'keywords' => '关键字',
            'thumbnail' => '缩略图',
            'describe' => '描述',
            'content' => '内容',
            'sort' => '显示顺序',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('cate_id', $this->cate_id);
        $criteria->compare('type', $this->type);
        $criteria->compare('keywords', $this->keywords, true);
        $criteria->compare('thumbnail', $this->thumbnail, true);
        $criteria->compare('describe', $this->describe, true);
        $criteria->compare('content', $this->content, true);
        $criteria->compare('sort', $this->sort);
        $criteria->compare('views', $this->views);
        $criteria->compare('mtime', $this->mtime);
        $criteria->compare('ctime', $this->ctime);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function beforeSave()
    {
        $this->mtime = NOW;
        return true;
    }

    /**
     * @param $id
     * @param $type
     * @return Product
     */
    public function getProductByIdAndType($id, $type)
    {
        return $this->find('`id` = ? AND `type` = ?', array($id, $type));
    }
}
