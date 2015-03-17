<?php
/* @var $this BookController */
/* @var $model Book */

		$this->breadcrumbs=array(
			'รายการหนังสือ',
		);
		
		$this->menu=array(
			array('label'=>'สร้างหนังสือ', 'url'=>array('create')),
		);

		Yii::app()->clientScript->registerScript('search', "
		$('.search-button').click(function(){
			$('.search-form').toggle();
			return false;
		});
		$('.search-form form').submit(function(){
			$('#adviser-grid').yiiGridView('update', {
				data: $(this).serialize()
			});
			return false;
		});
		");

?>

<h1>จัดการข้อมูลหนังสือ</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php echo $form->label($model, 'name'); ?>
<?php echo $form->textField($model,'name',array('size'=>25,'maxlength'=>45)); ?><br />

<?php echo CHtml::submitButton('ค้นหา'); ?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'book-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'create_date',
		'update_date',
		//'description',
		//'category_id',
		
		//'picture',
		array(
			'name'=>'status',
			'value'=>'$data->status == "P"?"สาธารณะ":"เฉพาะผู้เขียน"'
		),
		'member.alias',
		//'score_id',
		//'type_id',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php $this->endWidget(); ?>
