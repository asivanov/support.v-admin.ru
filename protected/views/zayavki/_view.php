<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Type')); ?>:</b>
	<?php echo CHtml::encode($data->Type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ZayavCategory_id')); ?>:</b>
	<?php echo CHtml::encode($data->ZayavCategory_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Date')); ?>:</b>
	<?php echo CHtml::encode($data->Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StartTime')); ?>:</b>
	<?php echo CHtml::encode($data->StartTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EndTime')); ?>:</b>
	<?php echo CHtml::encode($data->EndTime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Priority')); ?>:</b>
	<?php echo CHtml::encode($data->Priority); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Managers_id')); ?>:</b>
	<?php echo CHtml::encode($data->Managers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CUsers_id')); ?>:</b>
	<?php echo CHtml::encode($data->CUsers_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Address')); ?>:</b>
	<?php echo CHtml::encode($data->Address); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('Content')); ?>:</b>
	<?php echo CHtml::encode($data->Content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Object_id')); ?>:</b>
	<?php echo CHtml::encode($data->Object_id); ?>
	<br />

	*/ ?>

</div>