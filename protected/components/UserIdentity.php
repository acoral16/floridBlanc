<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
	private $_id;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Users::model()->find('users_username=:users_username', array(':users_username'=>$this->username));
		
		if($user != null && $user->users_password === MD5($this->password)){
			$this->errorCode=self::ERROR_NONE;
			$this->_id=$user->users_id;
			Yii::app()->user->setState('seed', date('m/d/Y h:i:s a', time()));
		}
		else
			$this->errorCode=self::ERROR_AUTHENTICATION_INVALID;
			
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}
	
}