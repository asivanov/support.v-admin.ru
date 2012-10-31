<?php
$this->breadcrumbs=array(
	'Тарифные планы'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Просмотреть тарифы','icon'=>'list','url'=>array('index')),

);
?>

<h1>Создать тариф</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>