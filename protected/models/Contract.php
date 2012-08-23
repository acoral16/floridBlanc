<?php

/**
 * This is the model class for table "contract".
 *
 * The followings are the available columns in table 'contract':
 * @property integer $contract_id
 * @property integer $contract_numero
 * @property string $contract_objeto
 * @property string $contract_fechaRegistroProyecto
 * @property string $contract_fechaActualizacion
 * @property string $contract_oficinaGestora
 * @property string $contract_observaciones
 * @property integer $contract_valorContrato
 * @property string $contract_codigoPresupuesto
 * @property string $contract_valorCodigo
 * @property double $contract_porcentajeRespectoValorProyecto
 * @property integer $contract_proyectoId
 * @property integer $contract_createdBy
 *
 * The followings are the available model relations:
 * @property Project $contractProyecto
 */
class Contract extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contract the static model class
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
		return 'contract';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contract_numero, contract_objeto, contract_fechaRegistroContrato, contract_oficinaGestora, contract_valorContrato, contract_codigoPresupuesto, contract_valorCodigo, contract_porcentajeRespectoValorProyecto, contract_proyectoId, contract_createdBy, contract_fechaActualizacion', 'required'),
			array('contract_createdBy, contract_numero, contract_valorContrato, contract_proyectoId', 'numerical', 'integerOnly'=>true),
			array('contract_porcentajeRespectoValorProyecto', 'numerical'),
			array('contract_objeto', 'length', 'max'=>150),
			array('contract_oficinaGestora', 'length', 'min'=>5, 'max'=>50),
			array('contract_observaciones', 'length', 'min'=>5, 'max'=>1000),
			array('contract_codigoPresupuesto, contract_valorCodigo', 'length','min'=>3, 'max'=>45),
			array('contract_fechaRegistroContrato', 'type', 'type' => 'date', 'message' => '{attribute}: no es una fecha!', 'dateFormat' => 'dd/MM/yyyy'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('contract_id, contract_createdBy, contract_numero, contract_fechaRegistroContrato, contract_oficinaGestora, contract_codigoPresupuesto, contract_valorCodigo', 'safe', 'on'=>'search'),
			array('contract_porcentajeRespectoValorProyecto', 'greaterThanHundred'),
		);
	}
	
	//Regla de validacion del valor del porcentaje del proyecto
	public function greaterThanHundred($attribute,$params)
	{	
		if ($this->$attribute>100)
			$this->addError($attribute, 'El porcentaje respecto al valor del proyecto no puede ser mayor al 100%');
		else if ($this->$attribute<0)
			$this->addError($attribute, 'El porcentaje respecto al valor del proyecto no puede ser menor al 0%');
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'contractProyecto' => array(self::BELONGS_TO, 'Project', 'contract_proyectoId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'contract_id' => 'Contracto',
			'contract_numero' => 'Numero Contracto ',
			'contract_objeto' => 'Objeto Contracto ',
			'contract_fechaRegistroContrato' => 'Fecha de Registro Contrato',
			'contract_fechaActualizacion' => 'Fecha ultima Actualizacion',
			'contract_oficinaGestora' => 'Oficina Gestora',
			'contract_observaciones' => 'Observaciones',
			'contract_valorContrato' => 'Valor del contrato',
			'contract_codigoPresupuesto' => 'Codigo Presupuesto',
			'contract_valorCodigo' => 'Valor Codigo',
			'contract_porcentajeRespectoValorProyecto' => ' Porcentaje Respecto al Proyecto (%)',
			'contract_proyectoId' => 'Proyecto id',
			'contract_createdBy' => 'Id del usuario',
			'contract_avanceFisico' => 'Avance fisico (%)',
			'contract_avanceFinanciero' => 'Avance financiero (%)',
		);
	}
	
	//Se ajusta la fecha antes de guardarla en la bd
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			// Format dates based on the locale
			foreach($this->metadata->tableSchema->columns as $contract_fechaRegistroContrato => $column)
			{
				if ($column->dbType == 'date')
				{
					$this->$contract_fechaRegistroContrato = date('Y-m-d',
							CDateTimeParser::parse($this->$contract_fechaRegistroContrato,
									Yii::app()->locale->getDateFormat('short')));
				}
				elseif ($column->dbType == 'datetime')
				{
					$day  = strtok($this->$contract_fechaRegistroContrato, '/');
					$moth = strtok('/');
					$year = strtok('/');
					
					$this->$contract_fechaRegistroContrato = $year."/".$moth."/".$day;
				}
			}
			return true;
		}
		else
			return false;
	}
	
	//Se ajusta la fecha antes de mostrarla en la vista
	protected function afterFind()
	{
		// Format dates based on the locale
		foreach($this->metadata->tableSchema->columns as $contract_fechaRegistroContrato => $column)
		{
			if (!strlen($this->$contract_fechaRegistroContrato)) continue;
	
			if ($column->dbType == 'date')
			{
				$this->$contract_fechaRegistroContrato = Yii::app()->dateFormatter->formatDateTime(
						CDateTimeParser::parse(
								$this->$contract_fechaRegistroContrato,
								'yyyy-MM-dd'
						),
						'short',null
				);
			}
			elseif ($column->dbType == 'datetime')
			{
					$year  = strtok($this->$contract_fechaRegistroContrato, '-');
					$moth = strtok('-');
					$day = strtok('-');
					$day = str_replace(" 00:00:00","",$day); 
					
					$this->$contract_fechaRegistroContrato = $day."/".$moth."/".$year;
			}
		}
		return true;
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

		$criteria->compare('contract_id',$this->contract_id);
		$criteria->compare('contract_numero',$this->contract_numero);
		$criteria->compare('contract_objeto',$this->contract_objeto,true);
		$criteria->compare('contract_fechaRegistroContrato',$this->contract_fechaRegistroContrato,true);
		$criteria->compare('contract_fechaActualizacion',$this->contract_fechaActualizacion,true);
		$criteria->compare('contract_oficinaGestora',$this->contract_oficinaGestora,true);
		$criteria->compare('contract_observaciones',$this->contract_observaciones,true);
		$criteria->compare('contract_valorContrato',$this->contract_valorContrato);
		$criteria->compare('contract_codigoPresupuesto',$this->contract_codigoPresupuesto,true);
		$criteria->compare('contract_valorCodigo',$this->contract_valorCodigo,true);
		$criteria->compare('contract_porcentajeRespectoValorProyecto',$this->contract_porcentajeRespectoValorProyecto);
		$criteria->compare('contract_proyectoId',$this->contract_proyectoId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}