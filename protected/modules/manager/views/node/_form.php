<?php
/* @var $this NodeFormController */
/* @var $model NodeForm */
/* @var $form CActiveForm */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'node-form',
	//'action'=>$this->createUrl('publish'),
	'htmlOptions'=>array(
		'class'=>'form'
		),
	'enableAjaxValidation'=>false,
)); ?>
	
	<?php echo $form->hiddenField($model,'type',array('value'=>$type)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="col-md-9">
		<div class="row form-group">
			<?php echo $form->labelEx($model,'title',array('class'=>'sr-only')); ?>
			<?php echo $form->textField($model,'title',array('class'=>'form-control','placeholder'=>'Title')); ?>
			<?php echo $form->error($model,'title'); ?>
		</div>
		
		<div class="row form-group">
			<?php echo $form->labelEx($model,'content',array('class'=>'sr-only')); ?>
			<?php echo $form->textArea($model,'content',array('class'=>'form-control','placeholder'=>'Content')); ?>
			<?php echo $form->error($model,'content'); ?>
		</div>
	</div>
		

	<div class="col-md-3">
		<div class="row form-group">
			<?php echo $form->labelEx($model,'status',array('class'=>'sr-only')); ?>
			<?php echo $form->textField($model,'status',array('class'=>'form-control','placeholder'=>'Status')); ?>
			<?php echo $form->error($model,'status'); ?>
		</div>
		<div class="row form-group">
			<?php echo $form->labelEx($model,'publicationDate',array('class'=>'sr-only')); ?>
			<?php echo $form->dateField($model,'publicationDate',array('class'=>'form-control','placeholder'=>'Publication date')); ?>
			<?php echo $form->error($model,'publicationDate'); ?>
		</div>


		<div class="row form-group">
			<?php echo $form->labelEx($model,'author',array('class'=>'sr-only')); ?>
			<?php echo $form->textField($model,'author',array('class'=>'form-control','placeholder'=>'Author')); ?>
			<?php echo $form->error($model,'author'); ?>
		</div>
		
		<div class="row form-group">
			<?php echo $form->labelEx($model,'parent',array('class'=>'sr-only')); ?>
			<?php echo $form->textField($model,'parent',array('class'=>'form-control','placeholder'=>'Parent page')); ?>
			<?php echo $form->error($model,'parent'); ?>
		</div>
	</div>


	<div class="row buttons form-group">
		<?php echo CHtml::submitButton('Publish',array(
				'id'=>'publish',
				'class'=>'btn btn-success',
				'name'=>'publish'
			)); ?>

			<?php echo CHtml::submitButton('Draft',array(
					'id'=>'save',
					'class'=>'btn',
					'name'=>'save'
				)); 
			?>
	</div>

<?php $this->endWidget(); ?>