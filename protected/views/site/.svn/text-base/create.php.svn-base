<h1>สมัครสมาชิก</h1> 
<?php
	$this->breadcrumbs=array(
		'สมัครสมาชิก',
	);
	
	 $this->menu=array(
		//array('label'=>'รายชื่อสมาชิก', 'url'=>array('index')),
	);
?>
<div class="form">
<?php 
	$form = $this->beginWidget('CActiveForm', array(
		'id'=>'register-form',
		'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	));
?>
	<p class="note">ช่องที่มี <span class="required">*</span> ต้องกรอกข้อมูลให้ครบถ้วน</p>
	<span class="header-line"></span> <br />
	<?php echo $form->errorSummary($user); ?>
	<?php echo $form->errorSummary($member); ?>
	
	<div class="row">
		<?php echo $form->labelEx($user, 'username'); ?>
		<?php echo $form->textField($user, 'username'); ?>
		<?php echo $form->error($user, 'username'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($user, 'password'); ?>
		<?php echo $form->passwordField($user, 'password', array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($user, 'password'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($member, 'first_name'); ?>
		<?php echo $form->textField($member, 'first_name'); ?>
		<?php echo $form->error($member, 'first_name'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($member, 'last_name'); ?>
		<?php echo $form->textField($member, 'last_name'); ?>
		<?php echo $form->error($member, 'last_name'); ?>
	</div>
	<!-- 
		<div class="row">
		<?php //echo $form->labelEx($member,'birthdate'); ?>
		<?php //$this->widget('zii.widgets.jui.CJuiDatePicker', // เป็น zii ไลบรารี่ yii และจะไปโหลด  CJuiDataPicker จากFolder widget ที่อยู่ใน yii มาใช้ ส่วน  widgets เป็นแค่ฟังก์ชั่นการทำงาน . jui เป็น JQuery ของ ui ซึ่งจะเป็นตัวดึง calendar ออกมา 
					//array(
						//'attribute'=>'birthdate',
						//'model'=>$member,
						//'options'=>array( // เป็นการเลือกว่า จะให้ calendar ของเรามี effect แบบไหน
							//'showAnim'=>'fold', // 'slide', 'alideDown', 'fadein', 'blind, ...
							////'showButtonPanel'=>true,
							//'dateFormat'=>'dd-mm-yy', // เป็นการตั้งค่า ว่าจะให้อะไรขึ้นก่อน โดยค่าเริ่มต้น จะเป็นเดือนขึ้นก่อน
							//'selectOtherMonths'=>true, // เลือก หรือแสดงได้หลายเดือน
							//'showOtherMonths'=>true,
							//'changeMonth'=>true, // เปลี่ยนเดือน และแี ตามที่ต้องการได้เอง
							//'changeYear'=>true,
					//),
					//'htmlOptions'=>array( // เป็นรูปแบบของ calendar 
						//'style'=>'width:100px'
					//),
			//)); ?>
	</div>
	 -->
	<div class="row">
		<?php echo $form->labelEx($member,'address'); ?>
		<?php echo $form->textField($member,'address'); ?>
		<?php echo $form->error($member,'address'); ?>
	</div>
	<div class="row">

	<?php echo $form->labelEx($member,'geo_id'); ?>
	<?php echo $form->dropDownList($member,'geo_id',$member->getgeography(),
			array(
				'class'=>'span4',
				'prompt'=>'Select Geography',
				'ajax'=>array(
					'type'=>'POST',
					'url'=>CController::createUrl('user/ChangeGeography'),
					'dataType'=>'json',
					'data'=>array('geo_id'=>'js:this.value'),
					'beforeSend' => 'function(){
						$("#myajax").addClass("loading");}',
					'complete' => 'function(){
						$("#myajax").removeClass("loading");}',
					'success'=>'function(data) {
					    $("#Member_province_id").html(data.dropDownProvince);
					 }',
				)
			)); ?>

	</div>
	<div class="row">

	<?php echo $form->labelEx($member,'province_id'); ?>
	<?php echo $form->dropDownList($member,'province_id',$member->getprovince(),
			array(
				'class'=>'span4',
				'prompt'=>'Select Province',
				'ajax'=>array(
					'type'=>'POST',
					'url'=>CController::createUrl('user/ChangeProvince'),
					'dataType'=>'json',
					'data'=>array('province_id'=>'js:this.value'),
					'beforeSend' => 'function(){
						$("#myajax").addClass("loading");}',
					'complete' => 'function(){
						$("#myajax").removeClass("loading");}',
					'success'=>'function(data) {
					    $("#Member_amphur_id").html(data.dropDownAmphur);
					 }',
				)
			)); ?>

	</div>
	<div class="row">
	<?php echo $form->labelEx($member,'amphur_id'); ?>
	<?php echo $form->dropDownList($member,'amphur_id',$member->getamphur(),
			array(
				'class'=>'span4',
				'prompt'=>'Select Amphur',
				'ajax'=>array(
					'type'=>'POST',
					'url'=>CController::createUrl('user/ChangeAmphur'),
					'dataType'=>'json',
					'data'=>array('amphur_id'=>'js:this.value'),
					'beforeSend' => 'function(){
						$("#myajax").addClass("loading");}',
					'complete' => 'function(){
						$("#myajax").removeClass("loading");}',
					'success'=>'function(data) {
					    $("#Member_district_id").html(data.dropDownDistrict);
					 }',
				)
			)); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($member,'district_id'); ?>
		<?php echo $form->dropDownlist($member,'district_id', empty($member->amphur_id)?array():$member->getdistrict(),
			array(
				'class'=>'span4',
				'prompt'=>'Select District'
				
			)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($member,'postcode'); ?>
		<?php echo $form->textField($member,'postcode',array('size'=>10,'maxlength'=>5)); ?>
		<?php echo $form->error($member,'postcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($member,'phone'); ?>
		<?php echo $form->textField($member,'phone',array('size'=>20,'maxlength'=>10)); ?>
		<?php echo $form->error($member,'phone'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($member,'email'); ?>
		<?php echo $form->emailField($member,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($member,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($member,'picture'); ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$member->picture,'',array('width'=>120,'height'=>150));?>
		<br />
		<?php echo $form->fileField($member,'picture'); ?>
		<?php echo $form->error($member,'picture'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($member,'alias'); ?>
		<?php echo $form->textField($member,'alias',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($member,'alias'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($member->isNewRecord ? 'บันทึกข้อมูล' : 'Save'); ?>
		<?php echo CHtml::resetButton($member->isNewRecord ? 'ยกเลิก' : 'Cancel'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->