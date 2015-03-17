
<?php 
	$this->breadcrumbs=array(
			'จัดการสมาชิก'=>array('index'),
			$user->username
	);

	$this->menu=array(
	array('label'=>'ลบสมาชิกคนนี้', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$user->id),'confirm'=>'Are you sure you want to delete this item?')),
	);
?>
<?php 
	$this->widget('zii.widgets.CDetailView', array(
		'data'=>$user,
		'attributes'=>array(
			//array(
			//'type'=>'html',
					//), // show image on view
					'username',
					//'password',
					'members.first_name',
					'members.last_name',
					//'members.birthdate',
					'members.address',
					'members.geo.name',
					'members.province.name',
					'members.amphur.name',
					'members.district.name',
					'members.postcode',
					//'members.phone',
					'members.email',
					array(
						'name'=>'picture',
						'type'=>'html',
						'value'=>($user->members->picture)?CHtml::image(
								Yii::app()->request->baseUrl.'/images/member_img/'
								.$user->members->picture,'',
								array('width'=>200,'height'=>250)):CHtml::image(
										Yii::app()->request->baseUrl.'/images/member_img/noimage.jpg'
										,'',array('width'=>200,'height'=>150)),
					), // show image on view
					'members.alias',
		)
	));
?>



