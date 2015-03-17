<?php
	$this->breadcrumbs=array(
		'Informations'=>array('view'),
		$model->description,
	);
 
?>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$information,
	'attributes'=>array(
		'description',

	),
)); ?>

  <?php  $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'infromation-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array( 
		'description',
		'link'=>array(
			'value'=> 'CHtml::button("เลือก",
					    array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("theme/hebo/viwes/site/pages/view",
					   array("id"=>$data->ID))."\'"))',
		),
	),
)); ?>