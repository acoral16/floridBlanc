<?php

/**
 * This is the model class for table "rols".
 *
 * The followings are the available columns in table 'rols':
 * @property integer $rols_id
 * @property string $rols_name
 * @property string $rols_description
 *
 * The followings are the available model relations:
 * @property Users[] $users
 */
class Rols extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rols the static model class
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
		return 'rols';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rols_name, rols_description', 'required'),
			array('rols_name, rols_description', 'length', 'min'=>4, 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rols_id, rols_name, rols_description', 'safe', 'on'=>'search'),
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
			'users' => array(self::HAS_MANY, 'Users', 'rols_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rols_id' => 'Rols',
			'rols_name' => 'Rols Name',
			'rols_description' => 'Rols Description',
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

		$criteria->compare('rols_id',$this->rols_id);
		$criteria->compare('rols_name',$this->rols_name,true);
		$criteria->compare('rols_description',$this->rols_description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}