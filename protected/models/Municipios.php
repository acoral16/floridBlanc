<?php

/**
 * This is the model class for table "municipios".
 *
 * The followings are the available columns in table 'municipios':
 * @property integer $municipios_id
 * @property string $municipios_name
 * @property integer $municipios_dptos_code
 * @property integer $municipios_code
 *
 * The followings are the available model relations:
 * @property Dptos $municipiosDptosCode
 * @property Project[] $projects
 */
class Municipios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Municipios the static model class
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
		return 'municipios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('municipios_name, municipios_dptos_code, municipios_code', 'required'),
			array('municipios_dptos_code, municipios_code', 'numerical', 'integerOnly'=>true),
			array('municipios_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('municipios_id, municipios_name, municipios_dptos_code, municipios_code', 'safe', 'on'=>'search'),
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
			'municipiosDptosCode' => array(self::BELONGS_TO, 'Dptos', 'municipios_dptos_code'),
			'projects' => array(self::HAS_MANY, 'Project', 'project_municipio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'municipios_id' => 'Municipios',
			'municipios_name' => 'Municipios Name',
			'municipios_dptos_code' => 'Municipios Dptos Code',
			'municipios_code' => 'Municipios Code',
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

		$criteria->compare('municipios_id',$this->municipios_id);
		$criteria->compare('municipios_name',$this->municipios_name,true);
		$criteria->compare('municipios_dptos_code',$this->municipios_dptos_code);
		$criteria->compare('municipios_code',$this->municipios_code);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}