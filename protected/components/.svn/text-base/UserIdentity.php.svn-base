<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	public  $_status;
	
	 public function authenticate()
	 {
		$user = User::model()->find('username="'.$this->username.'" and password="'. $this->password.'"');
	
	if($user === null)
		$this->errorCode=self::ERROR_USERNAME_INVALID;
	elseif(empty($user->password))
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
	
	else {
		
			$this->username = $user->username;  // keep username session, called by Yii::app()->user->name
			$this->_id = $user->id; // keep user id session, called by Yii::app()->user->id
			$this->_status = $user->status;
			$this->errorCode=self::ERROR_NONE;
			//$user = User::model()->updateByPk($user->id,array('last_login_date'=> date("Y-m-d H:i:s")));
		}
		return !$this->errorCode;
	}
	public function getId()
	{
		return $this->_id;
	}
	
	
	public function getStatus()
	{
		return $this->_status;
	}
}