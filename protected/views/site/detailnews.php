<?php
	$this->breadcrumbs=array(
		'ช่าวใหม่'=>array('indexnews'),
		'หัวข้อข่าว '.$news->header,
	);
 
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$news,
	'attributes'=>array(
		//'id',
		'header',
		'update_date',
		array(
			'name'=>'description',
			'type'=>'html',// show form text html format
			'value'=>$news->description,
		),
		array(
		'name'=>'image_new',
		'type'=>'html',
		'value'=>($news->image_new)?CHtml::image(
				Yii::app()->request->baseUrl.'/images/image_new/'
				.$news->image_new,'',
				array('width'=>200,'height'=>250)):CHtml::image(
						Yii::app()->request->baseUrl.'/images/image_new/analog.png'
						,'',array('width'=>200,'height'=>150)),
		),
	),
)); ?>
        