<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'ข่าวใหม่', 'url'=>array('/site/indexnews')),
				//array('label'=>'ข่าวใหม่', 'url'=>array('/information/index'), 'visible'=>Yii::app()->user->isMember()),
				//array('label'=>'ข่าวใหม่', 'url'=>array('/information/index'), 'visible'=>Yii::app()->user->isAdmin()),
				array('label'=>'วิธีการสร้างหนังสือ', 'url'=>array('/site/how-to'), 'visible'=>!Yii::app()->user->isAdmin()),
				array('label'=>'สมัครสมาชิก', 'url'=>array('/user/create'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'จัดการข่าวสารระบบ', 'url'=>array('/information/index'), 'visible'=>Yii::app()->user->isAdmin()),
				array('label'=>'จัดการประเภทหนังสือ', 'url'=>array('/category/index'), 'visible'=>Yii::app()->user->isAdmin()),
				array('label'=>'จัดการหมวดหมู่หนังสือ', 'url'=>array('/type/index'), 'visible'=>Yii::app()->user->isAdmin()),
				array('label'=>'สร้างหนังสือ', 'url'=>array('/book/create'), 'visible'=>Yii::app()->user->isMember()),
				array('label'=>'จัดการข้อมูลสมาชิก', 'url'=>array('/user/view', 'id'=>Yii::app()->user->id), 'visible'=>Yii::app()->user->isMember()),
				//array('label'=>'จัดการข้อมูลหนังสือ', 'url'=>array('/book/view', 'id'=>Yii::app()->user->id), 'visible'=>Yii::app()->user->isMember()),
				array('label'=>'เข้าสู่ระบบ', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'ออกจากระบบ ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
					),
			)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>''
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div id="main-content">
		<?php echo $content; ?>
	</div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
