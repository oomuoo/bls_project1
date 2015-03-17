<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'การจัดการหมวดหมู่หนังสือ'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'เปลี่ยนแปลง/แก้ไข',
);

$this->menu=array(
	array('label'=>'การจัดการหมวดหมู่หนังสือ', 'url'=>array('index')),
	array('label'=>'สร้างหมวดหมู่หนังสือ', 'url'=>array('create')),
	array('label'=>'ดูหมวดหมู่หนังสือ', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<h1>แก้ไขหมวดหมู่หนังสือ<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>