<?php
/* @var $this CompaniesController */
/* @var $model Companies */

$this->breadcrumbs=array(
	'Компании'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Редактировать компанию', 'icon'=>'pencil', 'url'=>array('update', 'id'=>$model->id)),
);
?>

<h1>Просмотр компании "<?php echo $model->name; ?>"</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'data'=>$model,
	'attributes'=>array(
		'name',
		'director',
		'uraddress',
		'faddress',
		'inn',
		'kpp',
		'ogrn',
		'bik',
		'korschet',
		'schet',
		'tarif',
		'payday',
		'user_id',
		'manager',
	),
)); ?>
