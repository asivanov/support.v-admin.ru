<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
    
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    
)); ?>
    <h3> <img src='/images/icons/home.png' /> Добро пожаловать, <?php echo Yii::app()->user->name; ?>, теперь Вы можете: </h3>

<div class="btn-toolbar">
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'info',
        'size'=>'normal',
        'label'=>'Создать заявку',
        'icon' => 'plus-sign',
        'url' => '/index.php/zayavki/create',
    )); ?></p>
 
<?php $this->endWidget(); ?>
</div>
