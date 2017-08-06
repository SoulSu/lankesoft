<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $nickname
 * @property string $name
 * @property string $password
 * @property string $salt
 * @property string $email
 * @property integer $sex
 * @property integer $bron
 * @property string $company
 * @property string $company_address
 * @property string $company_phone
 * @property string $self_address
 * @property string $self_phone
 * @property string $qq
 * @property string $msn
 * @property string $blog
 * @property string $id_card
 * @property integer $special_user
 * @property integer $mtime
 * @property integer $ctime
 */
class User extends CActiveRecord
{
    // 性别未知
    const SEX_UNKNOW = 0;
    // 性别男
    const SEX_BOY = 1;
    // 性别女
    const SEX_GIRL = 2;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sex, bron, special_user, mtime, ctime', 'numerical', 'integerOnly'=>true),
			array('nickname, name', 'length', 'max'=>128),
			array('password, qq, msn', 'length', 'max'=>32),
			array('salt, company, company_address, company_phone, self_address, self_phone', 'length', 'max'=>255),
			array('email', 'length', 'max'=>50),
			array('blog', 'length', 'max'=>125),
			array('id_card', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
//			array('id, nickname, name, password, salt, email, sex, bron, company, company_address, company_phone, self_address, self_phone, qq, msn, blog, id_card, special_user, mtime, ctime', 'safe', 'on'=>'search'),
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
			'nickname' => '用户名',
			'name' => '姓名',
			'password' => '登录密码',
			'salt' => '密码盐值',
			'email' => '邮箱',
			'sex' => '0,1,2 保密，男，女',
			'bron' => '出生时间',
			'company' => '公司名称',
			'company_address' => '公司地址',
			'company_phone' => '公司电话',
			'self_address' => '个人地址',
			'self_phone' => '个人电话',
			'qq' => 'QQ号码',
			'msn' => 'MSN号码',
			'blog' => '博客地址',
			'id_card' => '省份证',
			'special_user' => '0,1 是，否 特约用户',
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
		$criteria->compare('nickname',$this->nickname,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('bron',$this->bron);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('company_address',$this->company_address,true);
		$criteria->compare('company_phone',$this->company_phone,true);
		$criteria->compare('self_address',$this->self_address,true);
		$criteria->compare('self_phone',$this->self_phone,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('msn',$this->msn,true);
		$criteria->compare('blog',$this->blog,true);
		$criteria->compare('id_card',$this->id_card,true);
		$criteria->compare('special_user',$this->special_user);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
