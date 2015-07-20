<?php
class NodeCommand implements CommandInterface
{
	private $id;
	private $type;
	private $title;
	private $content;
	private $excerpt;
	private $author;
	private $publicationDate;	
	private $status;
	private $visibility;
	private $categories;
	private $tags;
	private $parent;


	public function __construct(NodeId $id,$type,$attrs=array())
	{		
		$this->id = $id;
		$this->type= $type;

		foreach($attrs as $attr => $value) {
			$this->$attr = $value ;
		}
	}

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getContent() {
		return $this->content;
	}

	public function getExcerpt()
	{
		return $this->excerpt;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getPublicationDate() {
		return $this->publicationDate;
	}

	public function getType() {
		return $this->type;
	}

	public function getStatus () {
		return $this->status;
	}

	public function getVisibility() {
		return $this->visibility;
	}

	public function getCategories() {
		return $this->categories;
	} 

	public function getTags() {
		return $this->tags;
	}

	public function getParent() {
		return $this->parendId;
	}

	public function toArray() {

		if(!isset($this->status)) {
			$this->status = NodeStatus::DRAFT;
		}


		$data = get_object_vars($this);
		

		$data['guid'] = $this->id;
		unset($data['id']);

		return $data;
	}
}