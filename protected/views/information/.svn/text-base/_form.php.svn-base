<?php
/* @var $this InformationController */
/* @var $model Information */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'information-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">ช่องที่มี <span class="required">*</span> กรุณากรอกข้อมูลให้ครบถ้วน</p>
	<span class="header-line"></span> <br />
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'header'); ?>
		<?php echo $form->textField($model,'header',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'header'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php $this->widget('ext.editMe.widgets.ExtEditMe', array(
				//load edit me ใน protected/estension
   				'attribute'=>'description',
				'model'=>$model,
			));?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'image_new'); ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/image_new/'.$model->image_new,'',array('width'=>120,'height'=>150));?>
		<br />
		<?php echo $form->fileField($model,'image_new'); ?>
		<?php echo $form->error($model,'image_new'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'Save'); ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'ยกเลิก' : 'Cencel'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->