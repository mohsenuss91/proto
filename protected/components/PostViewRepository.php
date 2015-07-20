<?php

class PostViewRepository
{
	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function find($id) 
	{
		$sql="SELECT * FROM {{node}} WHERE type=:type AND id=:id";
		$command = $this->db->createCommand($sql);
		$command->bindParam(':type',NodeTypeEnum::ARTICLE);
		$command->bindParam(':status',NodeStatusEnum::PUBLISHED);
		$command->bindParam(':id',$id);
		$record = $command->queryRow();
		return Yii::createComponent(array(
			'class'=>'PostView'
			),
			$record['id'],
			$record['title'],
			$record['content'],
			$record['excerpt'],
			$record['author'],
			$record['publication_date'],
			$record['categories'],
			$record['tags'],
			$record['status'],
			$record['visibility']
			));
	}

	public function findAll() 
	{
		$articles=[];

		$sql="SELECT * FROM {{node}} WHERE type=:type AND status=:status";
		$command = $this->db->createCommand($sql);
		$command->bindParam(':type',NodeTypeEnum::ARTICLE);
		$command->bindParam(':status',NodeStatusEnum::PUBLISHED);
		$records = $command->queryAll();
		foreach ($records as $record) {
			$articles[]=Yii::createComponent(array(
			'class'=>'PostView',
			'id'=$record['id'],
			'title'=>$record['title'],
			'content'=>$record['content'],
			'author'=>$record['author'],
			'publicationDate'=>$record['publicationDate'],
			'tags'=>$record['tags'],
			'categories'=>$record['categories'],
			'visibility'=>$record['visibility']
			));
		}
		return $articles;
	}
}