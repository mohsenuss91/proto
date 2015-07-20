<?php
/**
* 
*/
class RepositoryInteface
{
	
	public function find($id);

	public function findAll();

	public function save($model);

	public function add($model);
}