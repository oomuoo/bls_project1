<?php
/* @var $this InformationController */
/* @var $model Information */

$this->breadcrumbs=array(
	'รายการข่าวสารของระบบ',
);

$this->menu=array(
	array('label'=>'รายการข่าวสารของระบบ', 'url'=>array('index')),
	array('label'=>'สร้างหน้าข่าวสารระบบ', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#information-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('ค้นหาข่าวสาร','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'information-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'header',
		'update_date',		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
