<?php

/**
 * This is the model class for table "marriages".
 *
 * The followings are the available columns in table 'marriages':
 * @property integer $id
 * @property string $marriage_dt
 * @property string $groom_name
 * @property string $groom_dob
 * @property integer $groom_status
 * @property string $groom_rank_prof
 * @property string $groom_fathers_name
 * @property string $groom_mothers_name
 * @property string $groom_residence
 * @property string $bride_name
 * @property string $bride_dob
 * @property integer $bride_status
 * @property string $bride_rank_prof
 * @property string $bride_fathers_name
 * @property string $bride_mothers_name
 * @property string $bride_residence
 * @property integer $banns_licence
 * @property string $minister
 * @property string $witness1
 * @property string $witness2
 * @property string $remarks
 *
 * The followings are the available model relations:
 * @property MarriageCerts[] $marriageCerts
 */
class MarriageRecord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MarriageRecord the static model class
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
		return 'marriages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('groom_status, bride_status, banns_licence', 'numerical', 'integerOnly'=>true),
			array('groom_name, groom_fathers_name, groom_mothers_name, bride_name, bride_fathers_name, bride_mothers_name, minister', 'length', 'max'=>100),
			array('groom_rank_prof, groom_residence, bride_rank_prof, bride_residence', 'length', 'max'=>25),
			array('witness1, witness2, remarks', 'length', 'max'=>75),
			array('marriage_dt, groom_dob, bride_dob', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, marriage_dt, groom_name, groom_dob, groom_status, groom_rank_prof, groom_fathers_name, groom_mothers_name, groom_residence, bride_name, bride_dob, bride_status, bride_rank_prof, bride_fathers_name, bride_mothers_name, bride_residence, banns_licence, minister, witness1, witness2, remarks', 'safe', 'on'=>'search'),
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
			'marriageCerts' => array(self::HAS_MANY, 'MarriageCerts', 'marriage_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'marriage_dt' => 'Marriage Dt',
			'groom_name' => 'Groom Name',
			'groom_dob' => 'Groom Dob',
			'groom_status' => 'Groom Status',
			'groom_rank_prof' => 'Groom Rank Prof',
			'groom_fathers_name' => 'Groom Fathers Name',
			'groom_mothers_name' => 'Groom Mothers Name',
			'groom_residence' => 'Groom Residence',
			'bride_name' => 'Bride Name',
			'bride_dob' => 'Bride Dob',
			'bride_status' => 'Bride Status',
			'bride_rank_prof' => 'Bride Rank Prof',
			'bride_fathers_name' => 'Bride Fathers Name',
			'bride_mothers_name' => 'Bride Mothers Name',
			'bride_residence' => 'Bride Residence',
			'banns_licence' => 'Banns Licence',
			'minister' => 'Minister',
			'witness1' => 'Witness1',
			'witness2' => 'Witness2',
			'remarks' => 'Remarks',
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
		$criteria->compare('marriage_dt',$this->marriage_dt,true);
		$criteria->compare('groom_name',$this->groom_name,true);
		$criteria->compare('groom_dob',$this->groom_dob,true);
		$criteria->compare('groom_status',$this->groom_status);
		$criteria->compare('groom_rank_prof',$this->groom_rank_prof,true);
		$criteria->compare('groom_fathers_name',$this->groom_fathers_name,true);
		$criteria->compare('groom_mothers_name',$this->groom_mothers_name,true);
		$criteria->compare('groom_residence',$this->groom_residence,true);
		$criteria->compare('bride_name',$this->bride_name,true);
		$criteria->compare('bride_dob',$this->bride_dob,true);
		$criteria->compare('bride_status',$this->bride_status);
		$criteria->compare('bride_rank_prof',$this->bride_rank_prof,true);
		$criteria->compare('bride_fathers_name',$this->bride_fathers_name,true);
		$criteria->compare('bride_mothers_name',$this->bride_mothers_name,true);
		$criteria->compare('bride_residence',$this->bride_residence,true);
		$criteria->compare('banns_licence',$this->banns_licence);
		$criteria->compare('minister',$this->minister,true);
		$criteria->compare('witness1',$this->witness1,true);
		$criteria->compare('witness2',$this->witness2,true);
		$criteria->compare('remarks',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}