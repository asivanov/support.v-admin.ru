<?php

/**
 * This is the model class for table "Zayavki".
 *
 * The followings are the available columns in table 'Zayavki':
 * @property integer $id
 * @property string $Name
 * @property string $Type
 * @property string $ZayavCategory_id
 * @property string $Date
 * @property string $StartTime
 * @property string $EndTime
 * @property string $Status
 * @property string $Priority
 * @property string $Managers_id
 * @property string $CUsers_id
 * @property string $Address
 * @property string $SLA
 * @property string $Content
 * @property string $Comment
 * @property string $Object_id
 */
class Zayavki extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Zayavki the static model class
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
		return 'Zayavki';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Type, ZayavCategory_id, Date, StartTime, EndTime, Status, Priority, Managers_id, CUsers_id, Address, company, Object_id', 'length', 'max'=>50),
			// name, email, subject and body are required
			array('Name, Type, ZayavCategory_id, Object_id, Content', 'required'),
			
			array('Content, Comment', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, Name, Type, ZayavCategory_id, Date, StartTime, EndTime, Status, Priority, Managers_id, CUsers_id, Address, company, Content, Comment, Object_id', 'safe', 'on'=>'search'),
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
			'id' => '№',
			'Name' => 'Название',
			'Type' => 'Тип объекта',
			'ZayavCategory_id' => 'Категория',
			'Date' => 'Создано',
			'StartTime' => 'Начало работ',
			'EndTime' => 'Окончание работ',
			'Status' => 'Статус',
			'Priority' => 'Приоритет',
			'Managers_id' => 'Исполнитель',
			'CUsers_id' => 'Заказчик',
			'Address' => 'Адрес',
			'company' => 'Компания',
			'Content' => 'Содержание',
			'Comment' => 'Комментарий',
			'Object_id' => 'Объект',
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
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Type',$this->Type,true);
		$criteria->compare('ZayavCategory_id',$this->ZayavCategory_id,true);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('StartTime',$this->StartTime,true);
		$criteria->compare('EndTime',$this->EndTime,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('Priority',$this->Priority,true);
        if(Yii::app()->user->checkAccess('3')){
		$criteria->compare('Managers_id',Yii::app()->user->name,true);
        }
        else {
        $criteria->compare('Managers_id',$this->Managers_id,true);
        }
        if(Yii::app()->user->checkAccess('2')){
		$criteria->compare('CUsers_id',$this->CUsers_id,true);
			}
		elseif (Yii::app()->user->checkAccess('1')) {
		$criteria->compare('CUsers_id',Yii::app()->user->name,true);
			}
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('Content',$this->Content,true);
		$criteria->compare('Comment',$this->Comment,true);
		$criteria->compare('Object_id',$this->Object_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination' => array('pageSize' => 10, ),
            'sort' => array(
            'defaultOrder' => 'id DESC',
            ),
		));
	}

	public function beforeSave()
	{
    $address = Companies::model()->find('LOWER(user_id)=?', array(strtolower(Yii::app()->user->id)));
        if ($this->Address == '') {
        $this->Address = $address->faddress;	
		}
        if ($this->Date == '') {
    	$this->Date = date("d.m.Y H:m");	
		}
		$user = Yii::app()->user->name;
        if ($this->CUsers_id == '') {
		$this->CUsers_id = $user;	
		}
        $zakazname = $address->name;
        if ($this->company == '') {
		$this->company = $zakazname;	
		}
		if ($this->Status == '') {
		$this ->Status = '<span class="label label-success">Новая</span>';
		}
		return parent::beforeSave();
	}
    
}