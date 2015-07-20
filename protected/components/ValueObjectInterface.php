<?php
/**
* 
*/
interface ValueObjectInterface
{
	
	public static function fromNative();

	public function __toString();
}