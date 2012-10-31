<?php
$this->breadcrumbs=array(
	'Сервисы'=>array('index'),
	'Управление',
);

$this->menu=array(
    array('label'=>'Действия с сервисами'),
	array('label'=>'Список сервисов','icon'=>'list', 'url'=>array('index')),
	array('label'=>'Создать сервис','icon'=>'plus-sign', 'url'=>array('create')),
);
?>

<h3>Каталог сервисов</h3>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'services-grid',
    'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'name',
		'cost',
		'cofficient',
		'description',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
             'template' => '{update} {delete}',
		),
	),
)); ?>
