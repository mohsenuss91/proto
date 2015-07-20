<?php
/* @var $this NodeController */
/* @var $model Node */

$this->breadcrumbs=array(
	'Nodes'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Node', 'url'=>array('index')),
	array('label'=>'Create Node', 'url'=>array('create')),
	array('label'=>'Update Node', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Node', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Node', 'url'=>array('admin')),
);
?>

<h1>View Node #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'guid',
		'title',
		'slug',
		'content',
		'type',
		'parent',
		'lft',
		'rgt',
		'level',
		'publication_date',
		'created_by',
		'updated_by',
		'create_time',
		'update_time',
	),
)); ?>
