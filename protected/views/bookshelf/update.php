<?php
/* @var $this BookshelfController */
/* @var $model Bookshelf */

$this->breadcrumbs=array(
	'Bookshelves'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bookshelf', 'url'=>array('index')),
	array('label'=>'Create Bookshelf', 'url'=>array('create')),
	array('label'=>'View Bookshelf', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Bookshelf', 'url'=>array('admin')),
);
?>

<h1>Update Bookshelf <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>