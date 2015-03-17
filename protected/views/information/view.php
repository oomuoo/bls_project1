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
	array('label'=>'แก้ไขหน้าข่าวสารของระบบ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'ลบหน้าข่าวสารของระบบ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'จัดการข่าวสารของระบบ', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'header',
		'update_date',
		array(
			'name'=>'description',
			'type'=>'html',// show form text html format
			'value'=>$model->description,
		),
		array(
		'name'=>'image_new',
		'type'=>'html',
		'value'=>($model->image_new)?CHtml::image(
				Yii::app()->request->baseUrl.'/images/image_new/'
				.$model->image_new,'',
				array('width'=>200,'height'=>250)):CHtml::image(
						Yii::app()->request->baseUrl.'/images/image_new/analog.png'
						,'',array('width'=>200,'height'=>150)),
		),
	),
)); ?>
