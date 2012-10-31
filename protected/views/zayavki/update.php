<?php
$this->breadcrumbs=array(
	'Заявки'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Изменить заявку',
);

$this->menu=array(
    array('label'=>'Просмотреть все заявки', 'icon'=>'list','url'=>array('index')),
	array('label'=>'Создать новую заявку','icon'=>'edit','url'=>array('create')),
	array('label'=>'Удалить заявку','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены, что хотите удалить заявку?')),
);
?>

<h1>Редактировать заявку <?php echo $model->Name; ?></h1>

<?php if(Yii::app()->user->checkAccess('2')){
   $this->renderPartial('_adminform', array('model'=>$model));
}
elseif (Yii::app()->user->checkAccess('3')) {
       $this->renderPartial('_adminform', array('model'=>$model));
}
elseif (Yii::app()->user->checkAccess('1')) {
	   $this->renderPartial('_form', array('model'=>$model));
}
?>