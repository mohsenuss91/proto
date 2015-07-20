<?php

class NodeSearch extends Node
{
	
	
	public function search($params=array())
	{

		$criteria=new CDbCriteria;

		$this->attributes = $params;

		$criteria->compare('title',$this->title,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}