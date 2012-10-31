<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список пользователей','icon'=>'list', 'url'=>array('index')),
);
?>

<h1>Создать пользователя</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
