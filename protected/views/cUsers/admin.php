<?php
$this->breadcrumbs=array(
	'Пользователи'=>array('index'),
	'Управление',
);
if(Yii::app()->user->checkAccess('2')){
$this->menu=array(
	array('label'=>'Создать пользователя', 'icon'=>'plus-sign', 'url'=>array('create')),
);
}
else {

}
?>
<h1>Управление учетными данными</h1>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'type'=>'striped bordered condensed',
	'id'=>'cusers-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Username',
		'Email',
		'Phone',
		array(
        'name'=>'role',
        'headerHtmlOptions'=> array('width'=>30),
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
