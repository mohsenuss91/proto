<?php

class DefaultController extends CController
{
	public $layout='/layouts/manager';
	
	public function actionIndex()
	{
		$this->render('index');
	}
}