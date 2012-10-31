<?php
$this->breadcrumbs=array(
	'Tarif Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tarif_services','url'=>array('index')),
	array('label'=>'Create Tarif_services','url'=>array('create')),
	array('label'=>'Update Tarif_services','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Tarif_services','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tarif_services','url'=>array('admin')),
);
?>

<h1>View Tarif_services #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tname',
		'tcost',
		'tarif_id',
	),
)); ?>
