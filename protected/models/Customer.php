<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property string $name
 * @property string $contacter
 * @property string $phone
 * @property string $fax
 * @property string $address
 * @property string $zip_code
 * @property string $site
 * @property integer $cate_id
 * @property integer $sort
 * @property string $content
 * @property integer $mtime
 * @property integer $ctime
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
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
			array('cate_id, sort, mtime, ctime', 'numerical', 'integerOnly'=>true),
			array('name, site', 'length', 'max'=>128),
			array('contacter', 'length', 'max'=>32),
			array('phone, address', 'length', 'max'=>255),
			array('fax', 'length', 'max'=>50),
			array('zip_code', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, contacter, phone, fax, address, zip_code, site, cate_id, sort, content, mtime, ctime', 'safe', 'on'=>'search'),
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
			'name' => '客户名称',
			'contacter' => '联系人',
			'phone' => '联系电话',
			'fax' => '传真',
			'address' => '地址',
			'zip_code' => '邮编',
			'site' => '网址',
			'cate_id' => '客户分类',
			'sort' => '显示顺序',
			'content' => '内容',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('contacter',$this->contacter,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('fax',$this->fax,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('site',$this->site,true);
		$criteria->compare('cate_id',$this->cate_id);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('content',$this->content,true);
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
	 * @return Customer the static model class
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
