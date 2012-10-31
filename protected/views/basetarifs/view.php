<?php
$this->breadcrumbs=array(
	'Базовые тарифы'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список тарифов', 'icon'=>'list','url'=>array('index')),
	array('label'=>'Создать тариф','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Изменить тариф','icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Удалить тариф','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Просмотр тарифа <?php echo $model->name; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
		'cost',
	),
)); ?>
