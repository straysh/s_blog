<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property string $user_name
 * @property string $user_pwd
 * @property integer $avatar
 * @property integer $gender
 * @property string $email
 * @property integer $st_flag
 * @property integer $is_actived
 * @property string $active_code
 */
class Muser extends BaseAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return user the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, user_pwd', 'required'),
			array('avatar, gender, st_flag, is_actived', 'numerical', 'integerOnly'=>true),
			array('user_name, user_pwd, active_code', 'length', 'max'=>64),
			array('email', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name, user_pwd, avatar, gender, email, st_flag, is_actived, active_code', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'user_name' => 'User Name',
			'user_pwd' => 'User Pwd',
			'avatar' => 'Avatar',
			'gender' => 'Gender',
			'email' => 'Email',
			'st_flag' => 'St Flag',
			'is_actived' => 'Is Actived',
			'active_code' => 'Active Code',
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

		$criteria->compare('id',$this->id,true);

		$criteria->compare('user_name',$this->user_name,true);

		$criteria->compare('user_pwd',$this->user_pwd,true);

		$criteria->compare('avatar',$this->avatar);

		$criteria->compare('gender',$this->gender);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('st_flag',$this->st_flag);

		$criteria->compare('is_actived',$this->is_actived);

		$criteria->compare('active_code',$this->active_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}