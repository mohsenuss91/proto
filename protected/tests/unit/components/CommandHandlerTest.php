<?php

class TestCommandHandler extends CommandHandler
{
	public $handled = false;

	public function handleCommandHanlderTestCommand() {
		$this->handled = true;
	}
}

class CommandHanlderTestCommand implements CommandInterface {
	
	private $id;


	public function __construct($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}
}


/**
* 
*/
class CommandHandlerTest extends CTestCase
{
	
	/**
	 * @test
	 */
	public function shouldDelegateCommandToHandler ()
	{
		$commandHandler = new TestCommandHandler;

		$command = new CommandHanlderTestCommand(uniqid());
		$commandHandler->handle($command);

		$this->assertTrue($commandHandler->handled);
	}

	/**
	 * @test
	 * @dataProvider invalidCommand
	 */

	public function shouldThrowExceptionOnNotValidHandler($command)
	{
		$commandHandler = new TestCommandHandler;
		$this->setExpectedException('CException');
		$commandHandler->handle($command);
	}

	public function invalidCommand()
	{
		return array(
			array('foo'=>'bar')
		);
	}
}