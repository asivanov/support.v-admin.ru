<?php
$this->breadcrumbs=array(
	'Tarif Services'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tarif_services','url'=>array('index')),
	array('label'=>'Create Tarif_services','url'=>array('create')),
);


?>

<h3>Manage Tarif Services</h3>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tarif-services-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'tname',
		'tcost',
		'tarif_id',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
