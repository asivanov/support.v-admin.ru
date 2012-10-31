<?php
$this->breadcrumbs=array(
	'Каталог сервисов'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список сервисов','icon'=>'list','url'=>array('index')),

);
?>

<h1>Создать новый сервис</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>