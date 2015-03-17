<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'การจัดการหมวดหมู่หนังสือ'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'การจัดการหมวดหมู่หนังสือ', 'url'=>array('index')),
	array('label'=>'สร้างหมวดหมู่หนังสือ', 'url'=>array('create')),
	array('label'=>'แก้ไขหมวดหมู่หนังสือ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'ลบหมวดหมู่หนังสือ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<h1>ดูประเภทหนังสือ #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
