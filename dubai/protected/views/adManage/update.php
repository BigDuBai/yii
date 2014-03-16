<?php
$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->_id=>array('view','id'=>$model->_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ad', 'url'=>array('index')),
	array('label'=>'Create Ad', 'url'=>array('create')),
	array('label'=>'View Ad', 'url'=>array('view', 'id'=>$model->_id)),
	array('label'=>'Manage Ad', 'url'=>array('admin')),
);
?>

<h1>Update Ad <?php echo $model->_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>