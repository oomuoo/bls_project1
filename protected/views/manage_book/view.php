<?php
/* @var $this ManagebookController */
/* @var $model  Managebook */

$this->breadcrumbs=array(
	'จัดการรายการหนังสือ'=>array('index'),
	'หนังสือรหัส '.$model->id,
);

$this->menu=array(
	array('label'=>'ลบหนังสือเล่มนี้', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
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
