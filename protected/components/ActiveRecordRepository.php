<?php
/**
* 
*/
class ActiveRecordRepository extends Object implements RepositoryInterface
{
	private $recordClass;
	private $records=array();
	private $scopes=array();
	
	public function __construct($recordClass)
	{
		$this->recordClass= $recordClass;
	}

	public function find($id,$condition='',$params=array()) {
		return CActiveRecord::model($this->recordClass)->findByPk($id);
	}

	public function findAll($condition = '', $params=array()) {
		$records = CActiveRecord::model($this->recordClass)->findAll($condition,$params);
	}

	public function save($record) {
		return $record->save(false);
	}

	public function add($record) {
		$this->records[] = $record;
		return $records;
	}

	public function getRecords() {
		return $this->records;
	}


}