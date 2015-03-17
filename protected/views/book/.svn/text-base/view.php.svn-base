<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'รายการหนังสือ'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'รายการหนังสือ', 'url'=>array('index')),
	array('label'=>'สร้างหนังสือ', 'url'=>array('create')),
	array('label'=>'แก้ไขหนังสือ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'ลบหนังสือ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'คุณต้องการที่จะลบหนังสือเล่มนี้ใช่หรือไม่')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'name',
		'create_date',
		'update_date',
		'category.name',
		'type.name',
		//'status',
		array(
			'name'=>'status',
			'value'=>$model->status == 'P'?'สาธารณะ':'M'?'เฉพาะสมาชิก':'เฉพาะผู้เขียน'
		),
		'member.alias',

		array(
			'name'=>'picture',
			'type'=>'html',
			'value'=>($model->picture)?CHtml::image(
					Yii::app()->request->baseUrl.'/images/book_img/'
					.$model->picture,'',
					array('width'=>200,'height'=>250)):CHtml::image(
							Yii::app()->request->baseUrl.'/images/book_img/noimage.jpg'
							,'',array('width'=>200,'height'=>150)),
			), // show image on view
		
		array(
			'name'=>'description',
			'type'=>'html',// show form text html format
			'value'=>$model->description,
		),
			
	),
)); ?>
