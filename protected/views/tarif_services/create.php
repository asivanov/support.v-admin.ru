<?php
$this->breadcrumbs=array(
	'Tarif Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tarif_services','url'=>array('index')),
	array('label'=>'Manage Tarif_services','url'=>array('admin')),
);
?>

<h1>Create Tarif_services</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

