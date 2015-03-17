<?php

class ReportBookController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
	
	public function actionIndex()
	{
		//$this->layout='column2';
		$model=new ReportBook('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReportBook']))
			$model->attributes=$_GET['ReportBook'];
	
		$this->render('index',array(
				'model'=>$model,
		));
	}
	
 	public function actionView($id)
	{
		$model=$this->loadModel($id);
		$model->status = 0;
		$model->save();
		$this->render('view',array(
				'model'=>$model,
		));
		
		//$this->render('view',array(
			//'model'=>$this->loadModel($id),
		//));
	} 

	/* public function actionView($id)
	{
		$model = User::model()->findByPK($id);
	
		$this->render('view', array(
				'model'=>$model,
		));
	} */
	
	
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

	
	public function actionAdmin()
	{
		$model=new ReportBook('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReportBook']))
			$model->attributes=$_GET['ReportBook'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ReportBook the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ReportBook::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ReportBook $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='report-book-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
