<?php

class LogoutController extends CController
{
	public function actionIndex()
	{
		Yii::app()->user->logout(false);
		$this->redirect(array('default/index'));
	}
}