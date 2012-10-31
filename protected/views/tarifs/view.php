<?php
$this->breadcrumbs=array(
	'Тарифы'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Список тарифных планов', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Изменить тарифный план', 'icon'=>'edit','url'=>array('update','id'=>$model->id)),

);
?>

<h1>"<?php echo $model->name; ?>" - <?php echo $model->totalcost; ?> рублей</h1>
<p>&nbsp;</p>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'name',
        'description',
		'totalcost',

	),
)); ?>
<div>
<h5>Выбранные вами сервисы:</h5>
<?php 
    $config = array('pagination'=>array('pageSize' => 10 ));
    $rawData=$model->service;
    $dataProvider = new CArrayDataProvider($rawData, $config);

?>

<?php $this->widget('bootstrap.widgets.TbGridView',array( 
    'id'=>'tarif-services-grid', 
    'summaryText'=>'',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider, 
    'columns'=>array( 
        array(
        'header'=>'Сервисы',
        'type'=>'raw',
        'value'=> '$data->tname',
        ),
        array(
        'header'=>'Стоимость',
        'type'=>'raw',
        'value'=> '$data->tcost',
        ),
    ), 
)); ?> 
</div>
