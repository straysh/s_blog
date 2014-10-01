<?php

/**
 * 登录，注册表单模型
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
	public $repassword;
	public $email;
	
	private $_identity;
	static $LOGIN_ERROR = 'lg_error';

	public function rules()
	{
		return array(
			array('username, password', 'required', 'on'=>'login'),
			array('username, password', 'required', 'on'=>'reg'),
			array('rememberMe', 'boolean'),
			array('password, repassword, email', 'required', 'on'=>'reg'),
			array('email', 'email'),
			array('repassword', 'compare', 'compareAttribute'=>'password', 'message'=>'密码不一致', 'on'=>'reg'),			
			array('username', 'unique',  'on'=>'reg', 'attributeName'=>'user_name', 'className'=>'Muser', 'caseSensitive'=>false, 'skipOnError'=>true),
			array('email', 'unique',  'on'=>'reg', 'attributeName'=>'email', 'className'=>'Muser', 'caseSensitive'=>false, 'skipOnError'=>true),
		);
	}

	public function attributeLabels()
	{
		return array(
			'username'=>'用户名',
			'password'=>'密码',
			'rememberMe'=>'下次自动登录',
			'repassword' => '确认密码',
			'email' => '电子邮箱',
		);
	}

	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity(trim($this->username), trim($this->password));
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*7 : 0; // 7 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
		{
			$this->addError(self::$LOGIN_ERROR, $this->_identity->errorCode);
			return false;
		}
	}
	
	public function reg() {
		
		$model = new Muser('reg');

		$model->setAttribute('user_name', trim($this->username));
		$model->setAttribute('user_pwd',  UserIdentity::encryptPwd(trim($this->password)));
		$model->setAttribute('email', trim($this->email));
		
		if($model->validate() && $model->save())
		{
			return true;
		}
		
		return false;
	}
	
}
