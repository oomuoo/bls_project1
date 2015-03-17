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
<?php $this->menu=array(
	array('label'=>'รายชื่อ', 'url'=>array('index')),
	array('label'=>'แก้ไขข้อมูลส่วนตัว', 'url'=>array('update', 'id'=>$user->id)),
	//array('label'=>'ลบข้อมูลส่วนตัว', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$user->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->label($user, 'username'); ?>
<?php echo $form->textField($user,'username',array('size'=>25,'maxlength'=>45)); ?>



<?php echo CHtml::submitButton('ค้นหา'); ?>
<?php $this->endWidget(); ?>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
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
			'password',
			'members.first_name',
			'members.last_name',
			'members.birthdate',
			'members.address',
			'members.geo_id',
			'members.province_id',
			'members.amphur_id',
			'members.district_id',
			'members.postcode',
			'members.phone',
			'members.email',
			'members.picture',
			'members.alias',

			array(
	         'class'=>'CButtonColumn', 
			)
		)
	));
?>










