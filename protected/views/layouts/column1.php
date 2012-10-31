<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
<div class="span2">
<br/>
<h5>Панель действий:</h5>
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
    'block'=>true, 
    'fade'=>true, 
    'closeText'=>false,
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=> $this->menu,
)); ?>

    </div>
    <div class="span10">
    <?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'links'=>$this->breadcrumbs,
)); ?>
	<?php endif?>
    <div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
    </div>

</div>
<?php $this->endContent(); ?>