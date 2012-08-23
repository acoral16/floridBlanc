<?php

/**
 * This is the model class for table "dptos".
 *
 * The followings are the available columns in table 'dptos':
 * @property integer $dptos_id
 * @property string $dptos_name
 * @property integer $dptos_code
 *
 * The followings are the available model relations:
 * @property Municipios[] $municipioses
 * @property Project[] $projects
 */
class Dptos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Dptos the static model class
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
		return 'dptos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dptos_name, dptos_code', 'required'),
			array('dptos_code', 'numerical', 'integerOnly'=>true),
			array('dptos_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('dptos_id, dptos_name, dptos_code', 'safe', 'on'=>'search'),
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
			'municipioses' => array(self::HAS_MANY, 'Municipios', 'municipios_dptos_code'),
			'projects' => array(self::HAS_MANY, 'Project', 'project_departamento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'dptos_id' => 'Dptos',
			'dptos_name' => 'Dptos Name',
			'dptos_code' => 'Dptos Code',
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

		$criteria->compare('dptos_id',$this->dptos_id);
		$criteria->compare('dptos_name',$this->dptos_name,true);
		$criteria->compare('dptos_code',$this->dptos_code);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}