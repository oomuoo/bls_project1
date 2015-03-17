<?php
/* @var $this BookshelfController */
/* @var $model Bookshelf */

$this->breadcrumbs=array(
	'Bookshelves'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bookshelf', 'url'=>array('index')),
	array('label'=>'Manage Bookshelf', 'url'=>array('admin')),
);
?>

<h1>Create Bookshelf</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>