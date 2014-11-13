<?php

/**
 * This is the model class for table "{{category}}".
 *
 * The followings are the available columns in table '{{category}}':
 * @property string $id
 * @property string $pid
 * @property string $nav_name
 * @property string $nav_cn
 * @property string $total
 * @property string $m_time
 */
class Category extends BaseAR
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{category}}';
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
			array('pid, total, m_time', 'length', 'max'=>10),
			array('nav_name, nav_cn', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pid, nav_name, nav_cn, total, m_time', 'safe', 'on'=>'search'),
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
			'total' => 'Total',
			'm_time' => 'M Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('nav_name',$this->nav_name,true);
		$criteria->compare('nav_cn',$this->nav_cn,true);
		$criteria->compare('total',$this->total,true);
		$criteria->compare('m_time',$this->m_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @param int $topNode
	 *
	 * @return array
	 */
	public function dropDownList($topNode=NULL)
	{
		/* @var Category $item */
		$model = $this->findAll();
		$ret = array();
		foreach ($model as $item)
		{
			$ret[$item->id] = strtolower($item->nav_name);
		}
		return $ret;
	}

	/**
	 * 按主键查导航标签英文名
	 *
	 * @param int  $id self::id,primary key
	 * @param bool $lowercase
	 *
	 * @return string self::nav_name. empty string if not found;
	 *
	 * @author  : Straysh / 2013-9-27
	 * @version : 1.0
	 */
	public function navName($id, $lowercase=true)
	{
		/* @var Category $data */
		$data = $this->findByPk($id);
		if(empty($data))
			return '';
		return $lowercase ? strtolower($data->nav_name) : $data->nav_name;
	}

	/**
	 * @param string $category
	 *
	 * @return CActiveRecord
	 */
	public function findByName($category)
	{
		if(empty($category))
			return NULL;
		$result = $this->find(array(
				'condition' => 'nav_name=:name',
				'params' => array(':name' => $category)
			));

		return $result;
	}

	public function incTotal($navid, $inc = TRUE)
	{
		$inc = $inc ? '+' : '-';
		$data['total'] = new CDbExpression("total {$inc} 1");
		$cretiria['condition'] = 'id= :id';
		$cretiria['params'] = array(':id' => $navid);
		if(!$this->updateAll($data, $cretiria))
		{
			if(YII_DEBUG)
			{
				var_dump(__METHOD__.' #LINE '.__LINE__);
				var_dump($this->getErrors());
				exit;
			}
			throw new Exception('[DB]set category total fail ');
		}
	}
}
