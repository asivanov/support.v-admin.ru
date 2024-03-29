<?php

/**
 * This is the model class for table "tarif_services".
 *
 * The followings are the available columns in table 'tarif_services':
 * @property integer $id
 * @property string $name
 * @property string $cost
 * @property integer $tarif_id
 */
class Tarif_services extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tarif_services the static model class
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
		return 'tarif_services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tname', 'required'),
			array('tarif_id', 'numerical', 'integerOnly'=>true),
			array('tname', 'length', 'max'=>100),
			array('tcost', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, tname, tcost, tarif_id', 'safe', 'on'=>'search'),
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
        'tarif' => array(self::BELONGS_TO, 'Tarifs', 'tarif_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tname' => 'Название услуг',
			'tcost' => 'Cost',
			'tarif_id' => 'Tarif',
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
		$criteria->compare('tname',$this->tname,true);
		$criteria->compare('tcost',$this->tcost,true);
		$criteria->compare('tarif_id',$this->tarif_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}