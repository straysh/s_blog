<?php

/**
 * This is the model class for table "{{nav_list}}".
 *
 * The followings are the available columns in table '{{nav_list}}':
 * @property string $id
 * @property string $pid
 * @property string $nav_name
 * @property string $nav_cn
 */
class NavList extends BaseAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NavList the static model class
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
		return '{{nav_list}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nav_name', 'required'),
			array('pid', 'length', 'max'=>10),
			array('nav_name, nav_cn', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pid, nav_name, nav_cn', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'pid' => 'Pid',
			'nav_name' => 'Nav Name',
			'nav_cn' => 'Nav Cn',
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
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('nav_name',$this->nav_name,true);
		$criteria->compare('nav_cn',$this->nav_cn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function dropDownList($topNode=NULL)
	{
		$model = $this->findAll();
		$ret = array();
		foreach ($model as $meta)
		{
			$ret[$meta->id] = strtolower($meta->nav_name);
		}
		return $ret;
	}
	
	/**
	 * 按主键查导航标签英文名
	 * @param int $id NavList->id,primary key
	 * @return string NavList->nav_name. empty string if not found;
	 *
	 * @author  : Straysh / 2013-9-27
	 * @version : 1.0
	 */
	public function navName($id)
	{
		$data = $this->findByPk($id);
		return $data ? strtolower($data->nav_name) : '';
	}
}