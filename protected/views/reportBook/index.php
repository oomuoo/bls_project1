<?php
/* @var $this ReportBookController */
/* @var $model ReportBook */

$this->breadcrumbs=array(
	'รายการหนังสือที่ไม่เหมาะสม'=>array('index'),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#report-book-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>หนังสือที่ไม่เหมาะสม</h2>

<div>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->textFieldRow($model, 'book_id', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
<?php $this->widget('ext.bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'ค้นหา')); ?>
<?php $this->endWidget(); ?>

<?php $this->widget('ext.bootstrap.widgets.TbGridView', array(
	'id'=>'report-book-grid',
	'template' => '{pager}{items}{pager}',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		//'book.name' => 'bookName' ,
		'book.name',
		/*array(
			'name'=>'book',
			'type'=>'html',
			'value'=>'$data->status?"<strong>".$data->$BookName"."</strong>":$data->$BookName',
		),*/
		array(
			'name'=>'comment',
			'type'=>'html',
			'value'=>'$data->status?"<strong>".$data->comment."</strong>":$data->comment',
		),
		array(
			'name'=>'dateReport',
			'type'=>'html',
			'value'=>'$data->status?"<strong>".$data->dateReport."</strong>":$data->dateReport',
		),
		/*array(
			'name'=>'user_id',
			'type'=>'html',
			'value'=>'$data->status?"<strong>".$data->user_id."</strong>":$data->user_id',
		),*/
			
				array(
					'class'=>'ext.bootstrap.widgets.TbButtonColumn',
					'htmlOptions'=>array('style'=>'width: 50px'),
					'template'=>'{view}{delete}',
				),

		),
)); ?>
