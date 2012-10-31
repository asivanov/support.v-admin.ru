<?php
$this->breadcrumbs=array(
	'Сервисы'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
    array('label'=>'List Tarif_services','url'=>array('index')),
	array('label'=>'Create Tarif_services','url'=>array('create')),
);
?>

<h1>Редактировать сервис "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>