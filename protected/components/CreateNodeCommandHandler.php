<?php
/**
* 
*/
class CreateNodeCommandHandler extends CommandHandler
{
	public function handleCreateNodeCommand($command) {
		$record = new Node;
		$record->attributes = $command->toArray();
		$record->saveNode();
	}
	
}