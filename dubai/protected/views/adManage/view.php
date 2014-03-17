<?php
$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->_id,
);

$this->menu=array(
	array('label'=>'List Ad', 'url'=>array('index')),
	array('label'=>'Create Ad', 'url'=>array('create')),
	array('label'=>'Update Ad', 'url'=>array('update', 'id'=>$model->_id)),
	array('label'=>'Delete Ad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ad', 'url'=>array('admin')),
);
?>

<h1>View Ad #<?php echo $model->_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'images',
		'type',
		'_id',
	),
)); ?>