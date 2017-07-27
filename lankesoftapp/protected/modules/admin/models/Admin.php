<?php

/**
 * This is the model class for table "admin".
 *
 * The followings are the available columns in table 'admin':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $last_login_ip
 * @property integer $mtime
 * @property integer $ctime
 */
class Admin extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'admin';
    }

    public function primaryKey()
    {
        return 'id';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, salt', 'required'),
            array('mtime, ctime', 'numerical', 'integerOnly' => true),
            array('username, password, last_login_ip', 'length', 'max' => 32),
            array('salt', 'length', 'max' => 128),
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
            'username' => '登录用户名',
            'password' => '登录密码',
            'salt' => '密码盐值',
            'last_login_ip' => '最后登录ip 地址',
            'mtime' => 'Mtime',
            'ctime' => 'Ctime',
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
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('last_login_ip', $this->last_login_ip, true);
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
     * @return Admin the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function beforeSave()
    {
        $this->mtime = NOW;
        $this->last_login_ip = request()->getUserHostAddress();
        return true;
    }

    /**
     * 验证密码
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return $this->hashPassword($password, $this->salt) === $this->password;
    }

    /**
     * @param $password
     * @param $salt
     * @return string
     */
    public function hashPassword($password, $salt)
    {
        return Utils::genPassword($password, $salt);
    }

    /**
     * 初始化生成一个管理员帐号
     * @param $username
     * @param $password
     */
    public function initAdminAccount($username, $password)
    {
        // create admin pass
        $admin = Admin::model();
        $admin->username = $username;
        $admin->ctime = NOW;
        $admin->mtime = NOW;
        $admin->last_login_ip = request()->getUserHostAddress();
        $admin->salt = Utils::genSalt();
        $admin->password = Utils::genPassword($password, $admin->salt);
        $admin->setIsNewRecord(true);
        var_dump($admin->insert(), $admin->getErrors());
    }
}
