<?php

class BookshelfController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column3';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Bookshelf;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bookshelf']))
		{
			$model->attributes=$_POST['Bookshelf'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bookshelf']))
		{
			$model->attributes=$_POST['Bookshelf'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	/* 
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Bookshelf');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	 */
	public function actionIndex()
	{	
		
		/* $bookshelf=new Bookshelf('search');
		
	 	$bookshelf->unsetAttributes();  // clear any default values
		if(isset($_GET['Bookshelf']))
			$bookshelf->attributes=$_GET['Bookshelf'];
			//$book->attributes=$_GET['Bookshelf'];
		
			
		$this->render('index',array(
				'bookshelf'=>$bookshelf,
				
		));  */
		
		/*$ID_User = Yii::app()->user->id;
		$results=Yii::app()->db->createCommand(
				'SELECT bookshelf.id, bookshelf.book_id, bookshelf.member_id , book.id , book.picture , book.name ,member.id ,user.id
				FROM (((bookshelf 
				LEFT JOIN book ON bookshelf.book_id = book.id)
				LEFT JOIN member ON book.member_id = member.id )
				LEFT JOIN user ON member.id = user.id )
				')
				-> where ('user.id=$ID_User')->queryAll();
		$this->render('index',array(
				'bookshelf'=>$results
				));*/
		//session_start();
		$ID_User = Yii::app()->session['_id'];
		if(!isset($_SESSION['_id']))
		{
		   header("Location: index.php?r=site/login");
		exit;
		}
		
		$results=Yii::app()->db->createCommand(
				'SELECT bookshelf.id, bookshelf.book_id, bookshelf.member_id , book.id , book.picture , book.name ,member.id ,user.id
				FROM (((bookshelf
				LEFT JOIN book ON bookshelf.book_id = book.id)
				LEFT JOIN member ON book.member_id = member.id )
				LEFT JOIN user ON member.id = user.id )
		   		where bookshelf.member_id='.$ID_User.'
				')
						//-> where ('user.id=19')
		->queryAll();
		
		
		$this->render('index',array(
				'bookshelf'=>$results
		));  
	}
	public function actionBookshelf()
	{
	
		/*$model=new Bookshelf('search');
	
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Bookshelf']))
			$model->attributes=$_GET['Bookshelf'];
		//$book->attributes=$_GET['Bookshelf'];
	
			
		$this->render('index',array(
				'model'=>$model,
	
		));
		*/
		$results=Yii::app()->db->createCommand('SELECT bookshelf. * , book.* FROM bookshelf LEFT JOIN book ON bookshelf.book_id = book.id WHERE bookshelf.member_id=18')->queryAll();
		$this->render('bookshelf',array(
				'bookshelf'=>$results
		));
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Bookshelf('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Bookshelf']))
			$model->attributes=$_GET['Bookshelf'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Bookshelf the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Bookshelf::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Bookshelf $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bookshelf-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
