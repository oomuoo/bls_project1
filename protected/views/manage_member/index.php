<?php 

$this->breadcrumbs=array(
		'จัดการสมาชิก',
);
// jquery gridview search
Yii::app()->clientScript->registerScript('search', "
$('form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h3>จัดการข้อมูลสมาชิก</h3>


<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php //echo $form->label($user, 'username'); ?>
<?php //echo $form->textField($user,'username',array('size'=>25,'maxlength'=>45)); ?><br />
<?php //echo CHtml::submitButton('ค้นหา'); ?>
<?php $this->endWidget(); ?>

<div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	 'id'=>'searchForm',
    'type'=>'search',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<?php echo $form->textFieldRow($user,'username', array('class'=>'input-medium', 'prepend'=>'<i class="icon-search"></i>')); ?>
<?php $this->widget('ext.bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'label'=>'ค้นหา')); ?>
<?php $this->endWidget(); ?>
</div>

<?php 
	$this->widget('bootstrap.widgets.TbGridView', array(
		'id'=>'user-grid',
		//'dataProvider'=>$user->searchMale(),
		'dataProvider'=>$user->searchForAll(),
		'columns'=>array(
			//'id',
			array(
				'name'=>'id',
				'value'=>'$this->grid->dataProvider->pagination->offset + $row + 1',			
			), // this code for running number of rows
			'username',
			'members.first_name',
			'members.last_name',
			'members.phone',
			'members.email',
			array(
	        'class'=>'bootstrap.widgets.TbButtonColumn',
			'htmlOptions'=>array('style'=>'width: 30px'),
			'template'=>'{view}{delete}',
			)
		)
	));
?>










