
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'tarifs-form',
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Поля помеченные <span class="required">*</span> необходимо заполнить.</p>
<div class="span4">
<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldRow($model, 'id', array('disabled'=>true)); ?>

<?php echo $form->textFieldRow($model, 'name', array('maxlength' => 50)); ?>

</div>
<div class="span4">
    <?php
    echo $form->dropDownListRow($model, 'basecost', Basetarifs::All(), array(
        'ajax' => array(
            'type' => 'POST', //тип запроса
            'url' => CController::createUrl('Tarifs/UpdateAjax'), //вызов контроллера c Ajax
            'update' => '#data', //id DIV-а в котором надо обновить данные 
            )));
    ?>
<?php echo $form->textFieldRow($model, 'description', array('maxlength' => 100)); ?>
</div>
<br/>
<div>

    <?php
    $config = array('keyField' => 'tarif_id', 'pagination' => array('pageSize' => 10)); //Подгружаем список сервисов
    $rawData = $model->service;
    $dataProvider = new CArrayDataProvider($rawData, $config);
    ?>

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'tarif-services-grid',
        'type'=>'striped bordered condensed',
        'summaryText'=>'',
        'dataProvider' => $dataProvider,
        'columns' => array(
            array(
                'header' => 'Сервисы',
                'type' => 'raw',
                'value' => '$data->tname',
            ),
            array(
                'header' => 'Стоимость',
                'type' => 'raw',
                'value' => '$data->tcost',
            ),
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn'
                , 'template' => '{delete}'
                , 'deleteButtonUrl' => 'Yii::app()->createUrl("/Tarif_services/delete", array("id"=>$data["id"]))'
                //Здесь мы перегружаем страницу для получения пересчитаных результатов 
                , 'afterDelete' => 'function(){  
            document.location.reload(true)  
        }'  
            )
        ),
    ));
    ?> 
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Добавить сервис',
        'icon' => 'plus-sign',

        'htmlOptions'=>array(
        'data-toggle'=>'modal',
        'data-target'=>'#myModal',
    ),
    ));
    ?>

    <br/>
    <div id="data">
        <?php $this->renderPartial('_ajaxform', array('costValue' => $model->totalcost)); ?>
    </div>

    <div class="form-actions">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type' => 'info',
            'label' => $model->isNewRecord ? 'Создать' : 'Сохранить',
        ));
        ?>
    </div>  

<?php $this->endWidget(); ?>
</div>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Выберите услугу из списка</h4>
</div>
 
<div class="modal-body">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'tarif-services-form',
	'enableAjaxValidation'=>false,
    'action' => '/Tarif_services/create'
)); ?>

	<?php echo $form->errorSummary($model_s); ?>

	<?php echo $form->dropDownListRow($model_s,'tname',Services::All()); ?>

	<?php echo $form->hiddenField($model_s,'tarif_id',array('value'=>$model->id)); ?>

</div>
 
<div class="modal-footer">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'info',
			'label'=>$model_s->isNewRecord ? 'Добавить' : 'Сохранить',
		)); ?>

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Отмена',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 <?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>
