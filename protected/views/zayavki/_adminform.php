<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'zayavki-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Поля помеченные звездочкой <span class="required">*</span> обязятельны.</p>
<div class="span4">
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Name',array('maxlength'=>50)); ?> 
	
    <?php echo $form->dropDownListRow($model, 'Status', Zstatus::all() ); ?>

	<?php echo $form->dropDownListRow($model,'Priority',array('Низкий','Средний', 'Высокий')); ?>
	
	<?php echo $form->textFieldRow($model,'Managers_id',array('maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'CUsers_id',array('maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'Address',array('maxlength'=>50)); ?>

	<?php echo $form->textAreaRow($model,'Comment',array('rows'=>2, 'cols'=>50, 'class'=>'span12')); ?>

</div>
<div class="span4">
    <?php echo $form->dropDownListRow($model,'ZayavCategory_id',ZayavCategory::all()); ?>
    
    <?php echo $form->dropDownListRow($model, 'Type', ObjectTypes::all() ); ?>
    
    <?php echo $form->textFieldRow($model,'Object_id',array('maxlength'=>50)); ?>

	<label for="Zayavki_Date">Дата создания</label>
	<?php $this->widget(
    'ext.jui.EJuiDateTimePicker',
    array(
        'model'     => $model,
        'attribute' => 'Date',
        'language'=> 'ru',//default Yii::app()->language
        //'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
        'options'   => array(
            'dateFormat' => 'dd.mm.yy',
            //'timeFormat' => '',//'hh:mm tt' default
        ),
    )
	);
	?>
	<label for="Zayavki_StartTime">Начало работ</label>
	<?php $this->widget(
    'ext.jui.EJuiDateTimePicker',
    array(
        'model'     => $model,
        'attribute' => 'StartTime',
        'language'=> 'ru',//default Yii::app()->language
        //'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
        'options'   => array(
            'dateFormat' => 'dd.mm.yy',
            //'timeFormat' => '',//'hh:mm tt' default
        ),
    )
	);
	?>
	<label for="Zayavki_EndTime">Окончание работ</label>
	<?php $this->widget(
    'ext.jui.EJuiDateTimePicker',
    array(
        'model'     => $model,
        'attribute' => 'EndTime',
        'language'=> 'ru',//default Yii::app()->language
        //'mode'    => 'datetime',//'datetime' or 'time' ('datetime' default)
        'options'   => array(
            'dateFormat' => 'dd.mm.yy',
            //'timeFormat' => '',//'hh:mm tt' default
        ),
    )
	);
	?>

</div>
<div class="span12">
<div class="span8">	
	<?php $this->widget('application.extensions.ckeditor.CKEditor', array( 'model'=>$model, 'attribute'=>'Content', 'language'=>'ru', 'editorTemplate'=>'basic', )); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'info',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
</div>