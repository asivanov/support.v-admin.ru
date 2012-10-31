<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
    <link rel="shortcut icon" href="/images/icons/favicon.ico">
    <link rel="icon" type="image/gif" href="/images/icons/animated_favicon1.gif">
    <link rel="SHORTCUT ICON" href="/images/icons/favicon.ico">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container-fluid" id="page">
	<div id="header">

	</div><!-- header -->

	<div id="mainmenu">
    
<?php 
if(Yii::app()->user->checkAccess('1')){
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=>  '<img src="/images/logo.png" />',
    'brandUrl'=>'/',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
				array('label'=>'Задать вопрос', 'icon'=> 'question-sign', 'url'=>array('/site/contact')),
				array('label'=>'Мои заявки', 'icon'=> 'edit', 'url'=>array('/zayavki')),
				array ('label'=> 'Мои данные', 'icon'=>'user','url'=>array('/cUsers/'.Yii::app()->user->id)),		
				'---',
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'icon'=>'arrow-right', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
        )))));
}
elseif (Yii::app()->user->checkAccess('2')){
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=>  '<img src="/images/logo.png" />',
    'brandUrl'=>'/',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
				array('label'=>'Все заявки', 'icon'=> 'edit', 'url'=>array('/zayavki')),
                array('label'=>'Справочники', 'icon'=> 'list', 'url' =>'#',
				'items'=> array(
                array ('label'=> 'Каталог сервисов', 'icon'=>'wrench','url'=>array('/services')),
                array ('label'=> 'Базовые тарифы', 'icon'=>'list-alt','url'=>array('/basetarifs')),
                )),
                array('label'=>'Настройки', 'icon'=> 'wrench', 'url' =>'#',
				'items'=> array(
				array ('label'=> 'Управление пользователями', 'icon'=>'user','url'=>array('/cUsers')),
				array ('label'=> 'Управление компаниями', 'icon'=>'random','url'=>array('/companies')),
                                array ('label'=> 'Управление тарифами', 'icon'=>'list-alt','url'=>array('/tarifs')),
				)),
				'---',
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')','icon'=>'arrow-right', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
        )))));
}
elseif (Yii::app()->user->checkAccess('3')){
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=>  '<img src="/images/logo.png" />',
    'brandUrl'=>'/',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
    			array('label'=>'Мои заявки', 'icon'=> 'edit', 'url'=>array('/zayavki')),
				array('label'=>'Настройки', 'icon'=> 'wrench', 'url' =>'#',
				'items'=> array(
				array ('label'=> 'Мои данные', 'icon'=>'user','url'=>array('/cUsers')),
				array ('label'=> 'Мои компании', 'icon'=>'random','url'=>array('/companies')),		
				)),
				'---',
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')','icon'=>'arrow-right', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
        )))));
}
else{
$this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>'null', // null or 'inverse'
    'brand'=>  '<img src="/images/logo.png" />',
    'brandUrl'=>'/',
    'collapse'=>true, // requires bootstrap-responsive.css
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
				'---',
				array('label'=>'Войти', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
        )))));
}
        ?>
	</div><!-- mainmenu -->
<br />
<br />
<br />
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Все права защищены &copy; <?php echo date('Y'); ?> ООО "Виадмин".<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
