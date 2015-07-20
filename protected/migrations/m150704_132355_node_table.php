<?php

class m150704_132355_node_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('{{node}}',[
			'id'=>'pk',
			'guid'=>'string',
			'title'=>'string',
			'slug'=>'string',
			'content'=>'text',
			'type'=>'text',
			'status'=>'string',
			'author_id'=>'integer',
			'parent'=>'integer',
			'lft'=>'integer',
			'rgt'=>'integer',
			'level'=>'integer',
			'publication_date'=>'datetime',
			'created_by'=>'integer',
			'updated_by'=>'integer',
			'create_time'=>'datetime',
			'update_time'=>'datetime'
			]);


	}
	public function down()
	{
		$this->dropTable('{{node}}');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}