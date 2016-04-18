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
	public function authenticate2()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
			$this->setState('perfil', 1);
		return !$this->errorCode;
	}

		public function authenticate()
	{

		$user=Usuarios::model()->find("usuario='".$this->username."'");
		//$user=Usuarios::model()->find("user=?',array($this->username));

	    
		if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{

			//echo Yii::app()=>user->id;
			$this->_id =$user->id;
			$this->setState('nombre', $user->usuario);
			$this->setState('perfil', $user->id_perfil);
			$this->setState('id_area', $user->id_area);
			$this->username=$user->usuario;
			$this->errorCode=self::ERROR_NONE;
			return !$this->errorCode;
		}
		//return $this->errorCode==self::ERROR_NONE;
		
	}

	public function getId()
	{
		return $this->_id;
	}

}