<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property string $id
 * @property string $uid
 * @property string $class_id
 * @property string $title
 * @property string $content
 * @property string $comesfrom
 * @property string $key_words
 * @property string $hits
 * @property string $m_time
 * @property string $c_time
 */
class Article extends BaseAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return article the static model class
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
		return '{{article}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, class_id, hits, m_time, c_time', 'length', 'max'=>10),
			array('title, comesfrom', 'length', 'max'=>32),
			array('key_words', 'length', 'max'=>64),
			array('content', 'safe'),
			array('content', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, class_id, title, content, comesfrom, key_words, hits, m_time, c_time', 'safe', 'on'=>'search'),
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
			'uid' => '用户ID',
			'class_id' => '分类ID',
			'title' => '标题',
			'content' => '正文',
			'comesfrom' => '来源',
			'key_words' => '关键字',
			'hits' => '点击次数',
			'm_time' => '修改时间',
			'c_time' => '创建时间',
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

		$criteria->compare('uid',$this->uid,true);

		$criteria->compare('class_id',$this->class_id,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('content',$this->content,true);

		$criteria->compare('comesfrom',$this->comesfrom,true);

		$criteria->compare('key_words',$this->key_words,true);

		$criteria->compare('hits',$this->hits,true);

		$criteria->compare('m_time',$this->m_time,true);

		$criteria->compare('c_time',$this->c_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}