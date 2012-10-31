<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	$model->Username,
);
if(Yii::app()->user->checkAccess('1')){
$this->menu=array(
    array('label'=>'Редактировать пользователя', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
    array('label'=>'Редактировать компанию', 'icon'=>'briefcase', 'url'=>array('companies/update','id'=>$model->id)),
    array('label'=>'Редактировать Тариф', 'icon'=>'shopping-cart', 'url'=>array('tarifs/update','id'=>$model->id)),


);
}
elseif (Yii::app()->user->checkAccess('2')){
$this->menu=array(
    array('label'=>'Список пользователей', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Создать нового пользователя', 'icon'=>'plus-sign', 'url'=>array('create')),
    array('label'=>'Редактировать компанию', 'icon'=>'briefcase', 'url'=>array('companies/update','id'=>$model->id)),
    array('label'=>'Редактировать Тариф', 'icon'=>'shopping-cart', 'url'=>array('tarifs/update','id'=>$model->id)),
	array('label'=>'Редактировать пользователя', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
	array('label'=>'Удалить пользователя', 'icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить пользователя?')),

);
}
elseif (Yii::app()->user->checkAccess('3')){
$this->menu=array(
    array('label'=>'Список пользователей', 'icon'=>'list', 'url'=>array('index')),
    array('label'=>'Создать нового пользователя', 'icon'=>'plus-sign', 'url'=>array('create')),
    array('label'=>'Редактировать компанию', 'icon'=>'briefcase', 'url'=>array('companies/update','id'=>$model->id)),
    array('label'=>'Редактировать Тариф', 'icon'=>'shopping-cart', 'url'=>array('tarifs/update','id'=>$model->id)),
	array('label'=>'Редактировать пользователя', 'icon'=>'pencil', 'url'=>array('update','id'=>$model->id)),
	array('label'=>'Удалить пользователя', 'icon'=>'trash', 'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить пользователя?')),

);
}
?>

<h1>Просмотр пользователя <?php echo $model->Username; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'Username',
    array(
    'label'=>'Компания',
    'type'=>'html',
    'value'=>CHtml::link($model->company->name, '/companies/update/'.$model->id),
    ),
    array(
    'label'=>'Тарифный план',
    'type'=>'raw',
    'value'=>CHtml::link($model->tarif->name, '/tarifs/update/'.$model->id),
    ),
		'Email',
		'Phone',
		'role',

	),
)); ?>

