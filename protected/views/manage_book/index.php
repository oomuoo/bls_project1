<?php
/* @var $this MyMediaController */
/* @var $model MyMedia */

$this->breadcrumbs=array(
	'จัดการรายการหนังสือ',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#my-media-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>จัดการรายการหนังสือ</h3>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php //echo $form->label($model, 'name'); ?>
<?php //echo $form->textField($model,'name',array('size'=>25,'maxlength'=>45)); ?><br />

<?php //echo CHtml::submitButton('ค้นหา'); ?>

<div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	 'id'=>'searchForm',
    'type'=>'search',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php echo $form->textFieldRow($model,'name', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
<?php $this->widget('ext.bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'ค้นหา')); ?>
<?php $this->endWidget(); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'book-grid',
	'dataProvider'=>$model->searchForAll(),
	'template' => '{pager}{items}{pager}',
	/*'columns'=>array(
		 'id',
		'name',
		'create_date',
		'update_date',
		'category.name', */
	'columns'=>array(
		array('name'=>'name',
				'htmlOptions'=>array('style'=>'text-align:left')),
		array('name'=>'create_date',
				'htmlOptions'=>array('style'=>'text-align:left;width: 150px')),
		array('name'=>'update_date',
				'htmlOptions'=>array('style'=>'text-align:left;width: 100px')),
		array('name'=>'category.name',
				'htmlOptions'=>array('style'=>'text-align:left;width: 100px')),
		
		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'htmlOptions'=>array('style'=>'width: 30px'),
		'template'=>'{view}{delete}',
),
	),
)); ?>

<?php $this->endWidget(); ?>
		