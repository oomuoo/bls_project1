<?php
/* @var $this ReportBookController */
/* @var $model ReportBook */

$this->breadcrumbs=array(
	'รายการหนังสือที่ไม่เหมาะสม'=>array('index'),
	'หนังสือเรื่อง'.$model->id,
);

$this->menu=array(
	array('label'=>'รายการหนังสือที่ไม่เหมาะสม', 'url'=>array('index')),
	array('label'=>'ลบหนังสือ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'คุณต้องการที่จะลบหนังสือเล่มนี้ใช่หรือไม่')),
);
?>

<h3>รายละเอียด</h3>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'book.name',
		'comment',
		'dateReport',
		'user.usename',
	),
)); ?>
