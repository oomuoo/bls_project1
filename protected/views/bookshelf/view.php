<?php
/* @var $this BookshelfController */
/* @var $model Bookshelf */

$this->breadcrumbs=array(
	'Bookshelves'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Bookshelf', 'url'=>array('index')),
	array('label'=>'Create Bookshelf', 'url'=>array('create')),
	array('label'=>'Update Bookshelf', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bookshelf', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bookshelf', 'url'=>array('admin')),
);
?>

<h1>View Bookshelf #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'member_id',
		'book_id',
	),
)); ?>
