<?php

$this->pageTitle=Yii::app()->name . ' - Login';

?>


<div class="form-login">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'htmlOptions'=>array(
		'class'=>'form'
		),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

		<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'sr-only')); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'sr-only')); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login',array(
			'class'=>'btn btn-primary btn-block'
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
