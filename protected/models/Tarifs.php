<?php

/**
 * This is the model class for table "tarifs".
 *
 * The followings are the available columns in table 'tarifs':
 * @property integer $id
 * @property string $name
 * @property string $basecost
 * @property string $services
 * @property integer $user_id
 * @property string $company_id
 * @property string $totalcost
 * @property string $description
 *
 * The followings are the available model relations:
 * @property CUsers $user
 */
class Tarifs extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Tarifs the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tarifs';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, company_id', 'required'),
            array('user_id', 'numerical', 'integerOnly' => true),
            array('name, basecost, totalcost', 'length', 'max' => 50),
            array('company_id', 'length', 'max' => 80),
            array('description', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, basecost, services, user_id, company_id, totalcost, description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'user' => array(self::HAS_ONE, 'CUsers', 'user_id'),
            'service' => array(self::HAS_MANY, 'Tarif_services', 'tarif_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Номер',
            'name' => 'Наименование',
            'basecost' => 'Базовый тариф',
            'user_id' => 'User',
            'company_id' => 'Company',
            'totalcost' => 'Полная стоимость',
            'description' => 'Описание',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('basecost', $this->basecost, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('company_id', $this->company_id, true);
        $criteria->compare('totalcost', $this->totalcost, true);
        $criteria->compare('description', $this->description, true);


        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}