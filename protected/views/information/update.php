<?php
/* @var $this InformationController */
/* @var $model Information */

$this->breadcrumbs=array(
	'รายการข่าวสารระบบ'=>array('index'),
	$model->header,
);

$this->menu=array(
	array('label'=>'รายการข่าวสารของระบบ', 'url'=>array('index')),
	array('label'=>'สร้างหน้าข่าวสารระบบ', 'url'=>array('create')),
	array('label'=>'ดูหน้าข่าวสารของระบบ', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'ลบหน้าข่าวสารของระบบ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>