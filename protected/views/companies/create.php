<?php
/* @var $this CompaniesController */
/* @var $model Companies */

$this->breadcrumbs=array(
	'Компании'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Просмотреть список компаний', 'icon'=>'list', 'url'=>array('index')),
);
?>

<h1>Создать компанию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>