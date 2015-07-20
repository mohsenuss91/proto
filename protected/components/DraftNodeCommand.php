<?php
/**
* 
*/
class DraftNodeCommand implements CommandInterface
{
	private $id;
	
	function __construct(NodeId $id)
	{
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}
}