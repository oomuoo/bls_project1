<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'รายการหนังสือ'=>array('index'),
	'แก้ไขหนังสือ'=>array('view','id'=>$model->id),
	$model->name,
);

$this->menu=array(
	array('label'=>'รายการหนังสือ', 'url'=>array('index')),
	array('label'=>'ดูรายละเอียดหนังสือ', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'สร้างหนังสือ', 'url'=>array('create')),
	
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>