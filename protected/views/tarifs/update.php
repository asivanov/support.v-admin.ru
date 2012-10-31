<?php
$this->breadcrumbs=array(
	'Тарифы'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Список тарифов','icon'=>'list','url'=>array('index')),
);
?>

<h1>Тарифный план "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'model_s'=>$model_s)); ?>