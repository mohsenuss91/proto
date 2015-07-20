<?php

class ManagerModule extends CWebModule
{
	public function init()
	{
		parent::init();
		
		Yii::setPathOfAlias('manager',dirname(__FILE__));

		Yii::app()->setComponents(array(
			'user'=>array(
				'class'=>'CWebUser',
				'stateKeyPrefix'=>'protocms.manager',
				'loginUrl'=>Yii::app()->createUrl($this->getId().'/login')
				),
			'commandBus'=>array(
				'class'=>'CommandBus',
				'handlers'=>array(
					'CreateNodeCommand' => 'CreateNodeCommandHandler',
					'DeleteNodeCommand' => 'DeleteNodeCommandHandler',
					'UpdateNodeCommand' => 'UpdateNodeCommandHandler',
					'PublishNodeCommand'=> 'PublishNodeCommandHandler',
					'DraftNodeCommand'  => 'DraftNodeCommandHandler',
					'PendingNodeCommand'=> 'PendingNodeCommandHandler'
					)
			),
			),false);

		$this->setImport(array(
			'manager.models.*',
			'manager.components.*',
			'manager.forms.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			$route=$controller->id . '/' . $action->id;
			$allowedPages = array(
				'login/index'
				);

			if(Yii::app()->user->isGuest && !in_array($route,$allowedPages))
				Yii::app()->user->loginRequired();
			else
				return true;
		}
		else
			return false;
	}

	public function getAssetsUrl() {
		$assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('manager.assets'));
		return $assetsUrl;
	}
}
