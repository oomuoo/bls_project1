<?php
/* @var $this InformationController */
/* @var $model Information */

$this->breadcrumbs=array(
	'ข่าวสารระบบ'=>array('index'),
	'สร้าง',
);

$this->menu=array(
	array('label'=>'รายการข่าวสารของระบบ', 'url'=>array('index')),
	//array('label'=>'จัดการข่าวสารของระบบ', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>