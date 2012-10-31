<?php
$this->breadcrumbs=array(
	'Заявки'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'Просмотреть все заявки', 'icon'=>'list','url'=>array('index')),
	array('label'=>'Создать заявку','icon'=>'edit','url'=>array('create')),
	array('label'=>'Изменить заявку', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Удалить заявку','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить заявку?')),
);
?>

<h1>Просмотр заявки #<?php echo $model->id ?> "<?php echo $model->Name ?>"</h1>
<br/>
<div class="span8">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
    'type'=>'striped bordered condensed',
	'data'=>$model,
	'attributes'=>array(
        'Status:html',
		'Name',
		'Type',
		'ZayavCategory_id',
		'Date',
		'StartTime',
		'EndTime',
	
	),
)); ?>
</div>
<div class="span8">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'type'=>'striped bordered condensed',
    'data'=>$model,
	'attributes'=>array(
		'Priority',
		'Managers_id',
		'CUsers_id',
		'Address',
		'company',
		'Object_id',
		'Comment',
	),
)); ?>
</div>
<div class="span8">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'type'=>'striped bordered condensed',
    'data'=>$model,
    'attributes'=>array(
		'Content:html',
	),
)); ?>
</div>