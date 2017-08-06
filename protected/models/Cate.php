<?php

/**
 * This is the model class for table "cate".
 *
 * The followings are the available columns in table 'cate':
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $parent
 * @property integer $mtime
 * @property integer $ctime
 */
class Cate extends CActiveRecord
{
    // 产品分类类型
    const PRODUCT_CATE_TYPE = 1;
    // 产品演示
    const PRODUCT_DEMO_CATE_TYPE = 2;
    // 常见问题
    const QUESTION_CATE_TYPE = 3;
    // 空，占位
    const BLACK_CATE_TYPE = 4;
    // 案例
    const PROJECT_CASE_CATE_TYPE = 5;
    // 文章
    const ARTICLE_CATE_TYPE = 6;
    // 客户分类
    const CUSTOMER_CATE_TYPE = 7;
    // 资料下载
    const PROFILEDOWNLOAD_CATE_TYPE = 8;

    public static function getAllCate()
    {
        return array(
            self::PROFILEDOWNLOAD_CATE_TYPE => '资料分类',
            self::PRODUCT_CATE_TYPE => '产品分类',
            self::PRODUCT_DEMO_CATE_TYPE => '演示分类',
            self::QUESTION_CATE_TYPE => '问题分类',
            self::PROJECT_CASE_CATE_TYPE => '工程案例分类',
            self::ARTICLE_CATE_TYPE => '文章分类',
            self::CUSTOMER_CATE_TYPE => '客户分类',
        );
    }

    public function getUsedModelByType($type)
    {
        switch ($type) {
            case self::PRODUCT_CATE_TYPE:
                return Product::model();
            case self::PROFILEDOWNLOAD_CATE_TYPE :
                return Profiledownload::model();
            case self::PRODUCT_DEMO_CATE_TYPE :
                return Product::model();
            case self::QUESTION_CATE_TYPE :
                return Product::model();
            case self::PROJECT_CASE_CATE_TYPE :
                return Projectcase::model();
            case self::ARTICLE_CATE_TYPE :
                return Article::model();
            case self::CUSTOMER_CATE_TYPE :
                return Customer::model();
        }
    }

    public function checkCateIsUsed($type)
    {
        $model = $this->getUsedModelByType($type);
        $res = $model->count('`cate_id` =? ', array($type));
        return $res !== null;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'cate';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('type, parent, mtime, ctime', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            // The following rule is used by search().
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => '分类名称',
            'type' => '分类类型，产品列表|',
            'parent' => '多级父分类，0 代表自己是父亲',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('parent', $this->parent);
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
     * @return Cate the static model class
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
     * 通过类型获取分类列表
     * @param int $type
     * @return array|Cate
     */
    public function getListByType($type = 1)
    {
        $cateList = $this->findAll('`type` = ?', array($type));
        if (is_array($cateList)) {
            return $cateList;
        }
        return array();

    }
}
