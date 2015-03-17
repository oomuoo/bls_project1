<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	'การจัดการประเภทหนังสือ'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'แก้ไขประเภทหนังสือ',
);

$this->menu=array(
	array('label'=>'การจัดการประเภทหนังสือ', 'url'=>array('index')),
	array('label'=>'สร้างประเภทหนังสือ', 'url'=>array('create')),
	array('label'=>'ดูประเภทหนังสือ', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>แก้ไขประเภทหนังสือ<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>