<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $users_id
 * @property string $users_name
 * @property string $users_username
 * @property string $users_password
 * @property string $users_mail
 * @property integer $rols_id
 *
 * The followings are the available model relations:
 * @property Rols $rols
 */
class Users extends CActiveRecord
{
	
	const WEAK = 0;
	const STRONG = 1;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rols_id', 'numerical', 'integerOnly'=>true),
			array('users_name, users_username, users_password, users_mail, rols_id',	'required'),
			array('users_name, users_username, users_password, users_mail', 'length', 'min'=>4, 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('users_id, users_name, users_username, users_password, users_mail, rols_id', 'safe', 'on'=>'search'),
			array('users_password', 'passwordStrength', 'strength'=>self::STRONG),
		);
	}
	
	/**
	 * check if the user password is strong enough
	 * check the password against the pattern requested
	 * by the strength parameter
	 * This is the 'passwordStrength' validator as declared in rules().
	 */
	public function passwordStrength($attribute,$params)
	{
		if ($params['strength'] === self::WEAK)
			$pattern = '/^(?=.*[a-zA-Z0-9]).{5,}$/';
		elseif ($params['strength'] === self::STRONG)
		$pattern = '/^(?=.*\d(?=.*\d))(?=.*[a-zA-Z](?=.*[a-zA-Z])).{5,}$/';
	
		if(!preg_match($pattern, $this->$attribute))
			$this->addError($attribute, 'La contraseña es muy debil!');
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'rols' => array(self::BELONGS_TO, 'Rols', 'rols_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'users_id' => 'Users',
			'users_name' => 'Nombre',
			'users_username' => 'Usuario',
			'users_password' => 'Contrase&ntilde;a',
			'users_mail' => 'Correo electr&oacute;nico',
			'rols_id' => 'Rol',
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

		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('users_name',$this->users_name,true);
		$criteria->compare('users_username',$this->users_username,true);
		$criteria->compare('users_password',$this->users_password,true);
		$criteria->compare('users_mail',$this->users_mail,true);
		$criteria->compare('rols_id',$this->rols_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}