<?php

class Manage_memberController extends Controller

{
	public $layout='//layouts/column2';
	
	// Uncomment the following methods and override them if needed
	
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','view'),
						'users'=>array('admin'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('create','update'),
						'users'=>array('admin'),
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
	
public function actionIndex()
	{
		$user = new User('search');
		$user->unsetAttributes();  // clear any default values
		if(isset($_GET['User'])) // this code for search function
			$user->attributes=$_GET['User'];
		$this->render('index', array(
				'user'=>$user,
		));
	}
	
	public function actionView($id)
	{
		$user = User::model()->findByPK($id);
	
		$this->render('view', array(
				'user'=>$user,
		));
	}
}