<?php

abstract class CommandHandler implements CommandHandlerInterface
{
	
	public function handle($command)
	{
		$method = $this->getHandleMethod($command);

		if( ! method_exists($this, $method)) {
			return ;
		}

		$this->$method($command);
	}

	protected function getHandleMethod($command)
	{
		if(!is_object($command))
		{
			throw new CException("Command must be a class");
		}

		$className = explode('\\',get_class($command));
		return 'handle' . end($className);
	}
}