<?php
$this->breadcrumbs=array(
	'Tarif Services'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tarif_services','url'=>array('index')),
	array('label'=>'Create Tarif_services','url'=>array('create')),
	array('label'=>'View Tarif_services','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Tarif_services','url'=>array('admin')),
);
?>

<h1>Update Tarif_services <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>