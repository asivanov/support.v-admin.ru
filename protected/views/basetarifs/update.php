<?php
$this->breadcrumbs=array(
	'Базовые тарифы'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список тарифов', 'icon'=>'list', 'url'=>array('index')),



);
?>

<h1>Редактировать тариф <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>