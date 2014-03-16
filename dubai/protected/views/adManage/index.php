<?php
$this->breadcrumbs=array(
	'广告管理',
);

$this->menu=array(
	array('label'=>'创建广告', 'url'=>array('create')),
	array('label'=>'管理广告', 'url'=>array('admin')),
);
?>

<h1>Ads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>