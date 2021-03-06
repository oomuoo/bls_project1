<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'book-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">ช่องที่มี <span class="required">*</span> ต้องกรอกข้อมูลให้ครบถ้วน</p>
	<span class="header-line"></span> <br />
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
	

		<?php echo $form->fileField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>

		<?php //echo $form->labelEx($model,'description'); ?>
		<?php //$this->widget('ext.yii-ckeditor.CKEditorWidget', array(
				
			    //'name'=>'example',
			    //'value'=>'put your template code here',
			    //'attribute'=>'description', // map with filed in table major
/*
				'model'=>$model,
				'attribute'=>'description',
				# Additional Parameter (Check http://docs.cksource.com/ckeditor_api/symbols/CKEDITOR.config.html)

				'config' => array(
						'language' => 'ru',
				),

*/

/*				'model'=>$model,
				'modelAttribute'=>'description',
				'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
				'config'=>array(
						'tools'=>'full', // mini, simple, mfull, full or from XHeditor::$_tools
						'width'=>'300',
				),
				
/*				'model'=>$model,
				'modelAttribute'=>'description',
				'showModelAttributeValue'=>false, // defaults to true, displays the value of $modelInstance->attribute in the textarea
				'config'=>array(
						'tools'=>'full', // mini, simple, mfull, full or from XHeditor::$_tools
						'width'=>'300',
				),
				*/
//			));			
		//<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php //echo $form->error($model,'description'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id',$model->getcategory(),
			array(
				'class'=>'span5',
				'prompt'=>'Select Category',
				'ajax'=>array(
					'type'=>'POST',
					'url'=>CController::createUrl('book/ChangeCategory'),
					'dataType'=>'json',
					'data'=>array('category_id'=>'js:this.value'),
					'beforeSend' => 'function(){
						$("#myajax").addClass("loading");}',
					'complete' => 'function(){
						$("#myajax").removeClass("loading");}',
					'success'=>'function(data) {
					    $("#Book_type_id").html(data.dropDownType);
					 }',
				)
			)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'type_id'); ?>
		<?php echo $form->dropDownlist($model,'type_id', empty($model->category_id)?array():$model->gettype(),
			array(
				'class'=>'span5','maxlength'=>45,
				'prompt'=>'Select District'
				
			)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'member_id'); ?>
		<?php echo $form->dropDownList($model,'member_id', CHtml::listData(Member::model()->findAllByAttributes(array('id'=>Yii::app()->user->id)),
											'id', 'alias'),
											array('prompt'=>'นามปากกา')); 
		//<?php echo $form->textField($model,'category',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'member.alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->picture,'',array('width'=>120,'height'=>150));?>
		<br />
		<?php echo $form->fileField($model,'picture'); ?>
		<?php echo $form->error($model,'picture'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->radioButtonList($model,'status',array('P'=>'สาธารณะ', 'M'=>'เฉพาะสมาชิก', 'W'=>'เฉพาะผู้เขียน',), // ถ้าไม่ใส่ style ให้มัน ก็ได้ แต่ format ที่ออกมาจะไม่สวย 
															array(
																'separator'=>'',
																'labelOptions'=>array(
																	'style'=>'display:inline;padding-right:15px',))); // padding-right:15px คือ กำหนดให้ระยะห่างระหว่าง แต่ละตัวห่สงกัน 15 
		//<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<br />
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'บันทึกข้อมูล' : 'Save'); ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'ยกเลิก' : 'Cancel'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->