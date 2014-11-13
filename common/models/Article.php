<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property string $id
 * @property string $tid
 * @property string $title
 * @property string $author
 * @property integer $nav_id
 * @property string $parser
 * @property string $hits
 * @property string $state
 * @property string $c_time
 * @property string $m_time
 */
class Article extends BaseAR
{
	public $content;
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
			array('title', 'required'),
			array('nav_id', 'numerical', 'integerOnly'=>true),
			array('tid', 'length', 'max'=>13),
			array('title', 'length', 'max'=>128),
			array('author', 'length', 'max'=>64),
			array('parser', 'length', 'max'=>32),
			array('hits, c_time, m_time', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tid, title, author, nav_id, parser, hits, c_time, m_time', 'safe', 'on'=>'search'),
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
			'atkl_content'=>array(self::HAS_ONE, 'ArticleContent', 'article_id'),
			'atkl_category'=>array(self::HAS_ONE, 'Category', array('id' => 'nav_id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tid' => '标签ID',
			'title' => '标题',
			'author' => '作者',
			'nav_id' => '分组',
			'parser' => '文档解析器',
			'hits' => '浏览',
			'state' => '状态',
			'content' => '内容',
			'c_time' => '创建时间',
			'm_time' => '最后修改',
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
		$criteria->compare('tid',$this->tid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('nav_id',$this->nav_id);
		$criteria->compare('parser',$this->parser,true);
		$criteria->compare('hits',$this->hits,true);
		$criteria->compare('state', 1 );
		$criteria->compare('c_time',$this->c_time,true);
		$criteria->compare('m_time',$this->m_time,true);

		$criteria->order = 'id DESC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function dustbin()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('tid',$this->tid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('nav_id',$this->nav_id);
		$criteria->compare('parser',$this->parser,true);
		$criteria->compare('hits',$this->hits,true);
		$criteria->compare('state', 0 );
		$criteria->compare('c_time',$this->c_time,true);
		$criteria->compare('m_time',$this->m_time,true);

		$criteria->order = 'id DESC';
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @param int $categoryid
	 *
	 * @return array
	 */
	public function findByCategory($categoryid)
	{
		if(!is_numeric($categoryid) || empty($categoryid))
			return array();
		$result = $this->findAll(array(
				'condition' => 'nav_id=:navid',
				'params' => array(':navid' => $categoryid),
				'order' => 'c_time DESC'
			));

		return $result;
	}
}
