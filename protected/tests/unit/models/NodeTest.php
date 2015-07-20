<?php
/**
* 
*/
class NodeTest extends CTestCase
{
	public function testSettersGetters() {
		$node= new Node;

		$node->publication_date= new DateTime();
	}

}