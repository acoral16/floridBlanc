<?php

/**
 * This is the model class for table "meta".
 *
 * The followings are the available columns in table 'meta':
 * @property integer $meta_id
 * @property string $meta_control
 * @property string $meta_codigo
 * @property string $meta_fuente
 * @property string $meta_detalle
 */
class Meta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Meta the static model class
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
		return 'meta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('meta_codigo', 'required'),
			array('meta_control', 'length', 'max'=>40),
			array('meta_codigo, meta_fuente', 'length', 'max'=>50),
			array('meta_detalle', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('meta_id, meta_control, meta_codigo, meta_fuente, meta_detalle', 'safe', 'on'=>'search'),
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
			'meta_id' => 'Meta',
			'meta_control' => 'Meta Control',
			'meta_codigo' => 'Meta Codigo',
			'meta_fuente' => 'Meta Fuente',
			'meta_detalle' => 'Meta Detalle',
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

		$criteria->compare('meta_id',$this->meta_id);
		$criteria->compare('meta_control',$this->meta_control,true);
		$criteria->compare('meta_codigo',$this->meta_codigo,true);
		$criteria->compare('meta_fuente',$this->meta_fuente,true);
		$criteria->compare('meta_detalle',$this->meta_detalle,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}