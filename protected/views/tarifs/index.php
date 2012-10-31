<?php
$this->breadcrumbs=array(
	'Конфигуратор тарифа'=>array('index'),
	'Управление',
);


?>

<h1>Тарифные планы клиентов</h1>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'tarifs-grid',
	'dataProvider'=>$model->search(),
    'type'=>'striped bordered condensed',
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'basecost',
        'totalcost',
		/*

		'description',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
