<?php

/**
 * This is the model class for table "confirmations".
 *
 * The followings are the available columns in table 'confirmations':
 * @property integer $id
 * @property string $name
 * @property string $confirmation_dt
 * @property string $church
 *
 * The followings are the available model relations:
 * @property ConfirmationCerts[] $confirmationCerts
 */
class ConfirmationRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ConfirmationRecord the static model class
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
		return 'confirmations';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>75),
			array('church', 'length', 'max'=>50),
			array('confirmation_dt', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, confirmation_dt, church', 'safe', 'on'=>'search'),
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
			'confirmationCerts' => array(self::HAS_MANY, 'ConfirmationCerts', 'confirmation_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'confirmation_dt' => 'Confirmation Dt',
			'church' => 'Church',
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
		$criteria->compare('confirmation_dt',$this->confirmation_dt,true);
		$criteria->compare('church',$this->church,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}