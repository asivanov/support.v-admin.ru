<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),

	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список пользователей', 'icon'=>'list', 'url'=>array('index')),
);
?>

<h1>Редактировать пользователя <?php echo $model->Username; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>