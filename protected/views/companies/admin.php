<?php
/* @var $this CompaniesController */
/* @var $model Companies */

$this->breadcrumbs=array(
	'Компании'=>array('index'),
	'Просмотреть',
);

if(Yii::app()->user->checkAccess('2')){
$this->menu=array(
    array('label'=>'Просмотреть компании', 'icon'=>'list','url'=>array('index')),
	array('label'=>'Создать компанию','icon'=>'plus-sign','url'=>array('create')),
);
}
elseif (Yii::app()->user->checkAccess('1')) {
$this->menu=array(
    array('label'=>'Просмотреть Вашу компанию','icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
}
elseif (Yii::app()->user->checkAccess('3')) {
$this->menu=array(
    array('label'=>'Просмотреть Ваши компании', 'icon'=>'list','url'=>array('index')),
);
}
?>

<h1>Управление компаниями</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'type'=>'striped bordered condensed',
	'id'=>'zayavki-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
    'name'=>'name',
	'headerHtmlOptions'=> array('width'=>150),
    
	),
		'faddress',
        'manager',
        'user_id',
    array(
    'name'=>'tarif',
    'headerHtmlOptions'=> array('width'=>30),
    ),
    array(
    'name'=>'payday',
    'headerHtmlOptions'=> array('width'=>100),
	),
		
		/*
		'kpp',
        'director',
    	'uraddress',
		'ogrn',
		'bik',
		'korschet',
		'schet',
        'inn',
		'tarif',
		'payday',
		*/
	    array(
    		'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
