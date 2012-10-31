<?php
$this->breadcrumbs=array(
	'Базовые тарифы'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Создать новый тариф', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<h1>Базовые тарифные планы</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'basetarifs-grid',
    'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'cost',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
             'template' => '{update} {delete}',
		),
	),
)); ?>
