<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	'การจัดการประเภทหนังสือ'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'การจัดการประเภทหนังสือ', 'url'=>array('index')),
	array('label'=>'สร้างประเภทหนังสือ', 'url'=>array('create')),
	array('label'=>'แก้ไขประเภทหนังสือ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'ลบประเภทหนังสือ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>ดูประเภทหนังสือ #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'category.name',

	),
)); ?>
