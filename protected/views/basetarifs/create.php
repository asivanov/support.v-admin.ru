<?php
$this->breadcrumbs=array(
	'Базовые тарифы'=>array('index'),
	'Созать',
);

$this->menu=array(
	array('label'=>'Список тарифов','icon'=>'list', 'url'=>array('index')),
);
?>

<h1>Создать базовый тарифный план</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>