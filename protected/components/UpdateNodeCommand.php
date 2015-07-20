<?php
/**
* 
*/
class UpdateNodeCommand extends NodeCommand
{

	public function __construct($id,$type,$data=array())
	{
		parent::__construct($id,$type,$data);
	}
}