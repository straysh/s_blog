<?php
class BaseAR extends CActiveRecord
{
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->hasAttribute('m_time'))
				$this->m_time = time();
			if($this->isNewRecord && $this->hasAttribute('c_time'))
				$this->c_time = time();
			return true;
		}else{
			return false;
		}
	}
}