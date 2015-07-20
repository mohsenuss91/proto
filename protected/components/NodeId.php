<?php
/**
* 
*/
final class NodeId implements ValueObjectInterface
{
	private $id;

	public function __construct($id)
	{
		$this->id = $id;
	}

	public static function fromNative() 
	{
		$args = func_get_args();
		$value = $args[0];
		return new NodeId($value);
	}
	
	public function __toString() 
	{
		return $this->id;		
	}
}