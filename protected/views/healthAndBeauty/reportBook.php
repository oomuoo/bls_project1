<?php
/* @var $this BookController */
/* @var $model Book */

$this->breadcrumbs=array(
		'แจ้งหนังสือไม่เหมาะสม  :: เรื่อง '.$healthAndBeauty->name,
);
?>
<h3>แจ้งหนังสือไม่เหมาะสม</h3>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'report-book-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($healthAndBeauty,'name'); ?>
		<?php echo $form->textField($healthAndBeauty,'name',array('readonly' => true)); ?>
		<?php echo $form->error($healthAndBeauty,'name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($healthAndBeauty,'comment'); ?>
		<?php echo $form->textArea($report,'comment', array('class'=>'span5', 'rows'=>5)); ?>
		<?php echo $form->error($report,'comment'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->hiddenField($report, 'id'); ?>
		<?php echo $form->error($report, 'id'); ?>
	</div>
	
<div style="margin-left: 125px"><?php echo CHtml::submitButton('ยืนยัน'); ?></div>

<?php $this->endWidget(); ?>

</div><!-- form -->