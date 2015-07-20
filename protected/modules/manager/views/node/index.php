<?php
/* @var $this NodeController */
/* @var $model Node */

$this->breadcrumbs=array(
	'Nodes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Node', 'url'=>array('index')),
	array('label'=>'Create Node', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
	$('#node-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
	<div class="col-md-3">
		<a class="btn btn-default" href="<?php echo Yii::app()->createUrl('manager/node/create',array('type'=>$type)) ?>">Add</a>
	</div>
	<div class="col-md-3 pull-right search-form">
	<?php $this->renderPartial('_search',array(
		'model'=>$model,
		'type'=>$type
	)); ?>
	</div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'node-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'title',
		'publicationDate',
		'author_id',
		'categories',
		'tags',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
