<?php

/**
 * This is the model class for table "companies".
 *
 * The followings are the available columns in table 'companies':
 * @property integer $id
 * @property string $name
 * @property string $director
 * @property string $uraddress
 * @property string $faddress
 * @property string $inn
 * @property string $kpp
 * @property string $ogrn
 * @property string $bik
 * @property string $korschet
 * @property string $schet
 * @property string $tarif
 * @property string $payday
 * @property integer $user_id
 * @property string $manager
 *
 * The followings are the available model relations:
 * @property CUsers $user
 */
class Companies extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Companies the static model class
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
		return 'companies';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, director, uraddress, faddress, inn, kpp, ogrn, bik, korschet, schet, tarif, payday, user_id, manager', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('name, uraddress, faddress', 'length', 'max'=>100),
			array('director, korschet, schet, manager', 'length', 'max'=>50),
			array('inn, kpp, ogrn, bik, tarif, payday', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, director, uraddress, faddress, inn, kpp, ogrn, bik, korschet, schet, tarif, payday, user_id, manager', 'safe', 'on'=>'search'),
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
			'user' => array(self::HAS_ONE, 'CUsers', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
    public function attributeLabels()
    {
		return array(
			'id' => 'ID',
			'name' => 'Название компании',
			'director' => 'Генеральный директор',
			'uraddress' => 'Юридический адрес',
			'faddress' => 'Фактический адрес',
			'inn' => 'ИНН',
			'kpp' => 'КПП',
			'ogrn' => 'ОГРН',
			'bik' => 'БИК',
			'korschet' => 'Корр. счет',
			'schet' => 'Счет',
			'tarif' => 'Тариф',
			'payday' => 'Дата платежа',
			'user_id' => 'Пользователь',
			'manager' => 'Менеджер',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('director',$this->director,true);
		$criteria->compare('uraddress',$this->uraddress,true);
		$criteria->compare('faddress',$this->faddress,true);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('kpp',$this->kpp,true);
		$criteria->compare('ogrn',$this->ogrn,true);
		$criteria->compare('bik',$this->bik,true);
		$criteria->compare('korschet',$this->korschet,true);
		$criteria->compare('schet',$this->schet,true);
		$criteria->compare('tarif',$this->tarif,true);
		$criteria->compare('payday',$this->payday,true);
        if (Yii::app()->user->checkAccess('2')) {
        $criteria->compare('user_id', $this->user_id,true);
		}
		elseif (Yii::app()->user->checkAccess('1')){
        $criteria->compare('user_id', Yii::app()->user->id,true);
        }
        elseif (Yii::app()->user->checkAccess('3')) {
        $criteria->compare('user_id', $this->user_id,true);
		}
        if(Yii::app()->user->checkAccess('3')){
        $criteria->compare('manager', Yii::app()->user->id,true);
        }

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array('pageSize' => 10, ),
		));
	}
}