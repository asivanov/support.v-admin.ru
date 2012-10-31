<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'basetarifs-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Поля помеченные звездочкой <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'cost',array('append'=>'.00')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'info',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
