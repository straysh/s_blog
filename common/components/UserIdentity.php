<?php

class UserIdentity extends CUserIdentity
{
	private $_id;
	const ERROR_LOGIN_FAILD=10;
	
	public function authenticate()
	{
		if(!isset($this->username) || empty($this->username))
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			return $this->errorCode;
		}
		if (!isset($this->password) || empty($this->password))
		{
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			return $this->errorCode;
		}
		
		$usreg = Muser::model();
		$password = $this->encryptPwd($this->password);
		$condition="user_name=:uname AND user_pwd=:pwd AND st_flag=:st_flg";
		$params=array(':uname'=>$this->username, ':pwd'=>$password, ':st_flg'=>1);
		$exits = $usreg->exists($condition, $params);

		if($exits===true)
		{
			// login sucess
			$user=$usreg->find(array(
			    'condition'=>'user_name=:name',
			    'params'=>array(':name'=>$this->username),
			));
			$this->_id=$user->id;
			$states = array('domain'=>".ifcenter.com");
			$this->setPersistentStates($states);
			$this->errorCode = self::ERROR_NONE;
			return $this->errorCode;
		}else {
			// login faild
			$this->errorCode = self::ERROR_LOGIN_FAILD;
			return $this->errorCode;
		}
		
	}
	
	/**
	 * 前端js已进行md5 
	 * @param String $pwd
	 * @return string
	 */
	public static function encryptPwd($pwd)
	{
		return $pwd; //md5($pwd);
	}
	
	public function getId()
	{
		return $this->_id;
	}
}