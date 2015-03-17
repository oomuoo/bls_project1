<?php
/* @var $this TypeController */
/* @var $model Type */

$this->breadcrumbs=array(
	'การจัดการประเภทหนังสือ',
);

$this->menu=array(
	array('label'=>'สร้างประเภทหนังสือ', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>การจัดการประเภทหนังสือ</h1>

<?php echo CHtml::link('ค้นหาประเภทหนังสือ','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'type-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'category.name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
