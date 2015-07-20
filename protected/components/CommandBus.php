<?php

class CommandBus extends CApplicationComponent
{
	public $handlers=array();

	protected $handlersMap;

	public function init()
	{
		parent::init();
		
		$this->handlersMap=new CMap;
		
		
		if(!is_array($this->handlers)) {
			throw new CException('Node handlers must be array');
		} else {
			foreach( $this->handlers as $command => $handler ) {
				$this->register($command,$handler);
			}
		}
	}

	public function register($command,$handler)
	{
		if(!class_exists($handler)) {
			throw new CException("$handler dosent exist");
		} else {
			$this->handlersMap->add($command,$handler);
		}
	}

	public function execute($command)
	{
		$commandClass = get_class($command);
		$handlerClass = $this->handlersMap->itemAt($commandClass);
		$handler = new $handlerClass;
		
		return $handler->handle($command);
	}
}