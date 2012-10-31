<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'zayavki-form',
	'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="help-block">Поля помеченные <span class="required">*</span> необходимо заполнить.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'Name',array('class'=>'span5','maxlength'=>50)); ?> 
	
	<?php echo $form->dropDownListRow($model, 'Type', ObjectTypes::all() ); ?>

	<?php echo $form->dropDownListRow($model,'ZayavCategory_id',ZayavCategory::all()); ?>

	<?php echo $form->textFieldRow($model,'Object_id',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?php $this->widget('application.extensions.ckeditor.CKEditor', array( 'model'=>$model, 'attribute'=>'Content', 'language'=>'ru', 'editorTemplate'=>'full', )); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'info',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
