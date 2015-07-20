<?php

class NodeForm extends CFormModel
{
	public $title;
	public $content;
	public $excerpt;
	public $publicationDate;
	public $type;
	public $author;
	public $categories;
	public $tags;
	public $status;
	public $parent;
	public $visibility;

	public function rules() {
		return array(
			array('title','required'),
			array('content,visibility,type','safe'),
			array('publicationDate','date'),
			array('author,status','numerical','integerOnly'=>true)
			);
	}


}