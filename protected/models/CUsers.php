<?php

/**
 * This is the model class for table "CUsers".
 *
 * The followings are the available columns in table 'CUsers':
 * @property integer $id
 * @property string $Username
 * @property string $Password
 * @property string $Email
 * @property string $Phone
 * @property integer $role
 */
class CUsers extends CActiveRecord
{
	const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_MANAGER = 'manager';
    const ROLE_BANNED = 'banned';
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'CUsers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Username, Password, Email, Phone',  'required'),
			array('role', 'numerical', 'integerOnly'=>true),
			array('Username, Password, Email, Phone', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Username, Password, Email, Phone, role', 'safe', 'on'=>'search'),
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
        'company' => array(self::HAS_ONE, 'Companies', 'user_id'),
        'tarif' => array(self::HAS_ONE, 'Tarifs', 'user_id'),
        'zayavki' => array(self::HAS_MANY, 'Zayavki', 'user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'Username' => 'Логин',
			'Password' => 'Пароль',
			'Email' => 'Email',
			'Phone' => 'Телефон',
			'role' => 'Роль',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
        if(Yii::app()->user->checkAccess('2')){
    	$criteria->compare('Username',$this->Username,true);
        }
        else{
        $criteria->compare('Username',Yii::app()->user->name,true);
        }
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('role',$this->role);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array('pageSize' => 10, ),
		));
	}
    
    public function beforeSave()
    {
    $this->Password = md5('mdy65wtc76'.$this->Password);
    return parent::beforeSave();
    
    }
}