<?php
	$cs=Yii::app()->clientScript;
	$baseUrl=$this->module->assetsUrl;
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>

		<!-- Bootstrap CSS -->
		<link href="<?php echo $baseUrl; ?>/css/styles.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>

			<div id="wrapper" class="container-fluid">
				<div class="row app-content">
					<div class="col-sm-3 col-md-2 sidebar">
						<?php
						$this->widget('zii.widgets.CMenu',array(
							'htmlOptions'=>array(
								'class'=>'nav'
								),
							'items'=>array(
								array('label'=>'Dashboard', 'url'=>Yii::app()->createUrl('manager')),
								array('label'=>'Articles', 'url'=>Yii::app()->createUrl('manager/node',array('type'=>'post'))),
								array('label'=>'Pages', 'url'=>Yii::app()->createUrl('manager/node',array('type'=>'page'))),
								array('label'=>'Media', 'url'=>Yii::app()->createUrl('manager/media')),
								array('label'=>'Comments', 'url'=>Yii::app()->createUrl('manager/comment')),
								array('label'=>'Users', 'url'=>Yii::app()->createUrl('manager/user')),
								array('label'=>'Settings', 'url'=>array('/manager/settings'))
							),
							));
						?>
					</div>
					<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2">
						<?php echo $content; ?>
					</div>
				</div>
			</div>

		<!-- jQuery -->
		<?php $cs->registerCoreScript('jquery'); ?>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo $baseUrl; ?>/js/bootstrap.min.js"></script>
	</body>
</html>
