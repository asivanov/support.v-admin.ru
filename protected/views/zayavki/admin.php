<?php
$this->breadcrumbs=array(
	'Заявки'=>array('index'),
	'Просмотреть',
);

$this->menu=array(
    array('label'=>'Действия с заявками'),
    array('label'=>'Создать заявку','icon'=>'plus-sign','url'=>array('create')),

);


?>

<h2>Управление заявками</h2>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
  	'type'=>'striped bordered condensed',
	'id'=>'zayavki-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	array(
    'name'=>'id',
	'headerHtmlOptions'=> array('width'=>30),
	'filter' => '',
	),
    array(
	'name'=>'Status',
    'type'=>'html',
	'headerHtmlOptions'=> array('width'=>50),
	),
	array(
	'name'=>'Date',
	'headerHtmlOptions'=> array('width'=>120),
	),
    array(
	'name'=>'Name',
	'headerHtmlOptions'=> array('width'=>400),
	),
    array(
    'name'=>'company',
	'headerHtmlOptions'=> array('width'=>150),
	),
	array(
    'name'=>'ZayavCategory_id',
	'headerHtmlOptions'=> array('width'=>120),
	),
	array(
    'name'=>'Type',
	'headerHtmlOptions'=> array('width'=>80),
	),
			
		/*
		'EndTime',
		'Status',
		'Priority',
		'Managers_id',
		'CUsers_id',
		'Address',
		'SLA',
		'Content',
		'Comment',
		'Object_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'headerHtmlOptions'=> array('width'=>50),
		),
	),
)); ?>
