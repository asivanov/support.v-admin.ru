<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'companies-form',
	 'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
    ),
)); ?>

	<p class="help-block">Поля помеченные звездочкой <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'director',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'uraddress',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'faddress',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'inn',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kpp',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'ogrn',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'bik',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'korschet',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'schet',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'tarif',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'payday',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'manager',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
