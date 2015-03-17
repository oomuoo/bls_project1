<?php 
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


<h1>จัดการข้อมูลสมาชิก</h1>


<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->label($user, 'username'); ?>
<?php echo $form->textField($user,'username',array('size'=>25,'maxlength'=>45)); ?><br />
<?php echo CHtml::submitButton('ค้นหา'); ?>
<?php $this->endWidget(); ?>

<?php 
	$this->widget('bootstrap.widgets.TbGridView', array(
		'id'=>'user-grid',
		//'dataProvider'=>$user->searchMale(),
		'dataProvider'=>$user->search(),
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










