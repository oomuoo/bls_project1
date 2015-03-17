<?php
	$this->breadcrumbs=array(
		'ข่าวใหม่',
	);
?>

  <?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'infromation-grid',
	'dataProvider'=>$news->search(),
	'columns'=>array( 
		array('name'=>'update_date','htmlOptions'=>array('style' => 'text-align: center;')),
		'header',
		'image_new',
		'link'=>array(
			'header'=>'เพิ่มเติม',
			'type'=>'raw',
			'value'=> 'CHtml::button("อ่านข่าว",
					   array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("site/ViewNews",
					   array("id"=>$data->id))."\'"))'),
	),
));?>


  