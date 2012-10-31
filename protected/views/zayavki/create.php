<?php
$this->breadcrumbs=array(
	'Заявки'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Просмотреть все заявки', 'icon'=>'list','url'=>array('index')),
);
?>

<h1>Создание заявки</h1>

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
