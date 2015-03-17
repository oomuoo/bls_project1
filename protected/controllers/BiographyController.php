<?php

class BiographyController extends Controller
{
	public $layout='//layouts/column3';

	// Uncomment the following methods and override them if needed

	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function actionBiography()
	{

		/* $biography=new Book();

		$biography->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$biography->attributes=$_GET['Book'];

		$this->render('biography',array(
				'biography'=>$biography,
		)); */
		
		$results = Yii::app()->db->createCommand()-> select('book.id, book.category_id,book.create_date, book.description, book.member_id, book.picture, book.name, member.alias')-> from('book')->leftJoin('member', 'book.member_id = member.id')-> where('book.category_id=3')-> order ('book.id DESC')-> queryAll();
		$this->render('biography',array(
				'biography'=>$results
		));
	}

	public function actionView($id)
	{
		$this->render('view',array(
				'biography'=>$this->loadModel($id),
		));
	}
	public function actionReportBook($id)
	{
		//$healthAndBeauty = new HealthAndBeauty;
		$biography=$this->loadModel($id);
		$report= new ReportBook;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReportBook']))
		{
			$biography->attributes=$_POST['ReportBook'];
			$report->attributes=$_POST['ReportBook'];

			$report->book_id = $biography->id;
			$report->dateReport = date('Y-m-d H:i:s');
			$report->status = 1;
			$report->user_id = Yii::app()->user->id;

			if($report->save())
				$this->redirect(array('biography'));
		}

		$this->render('reportBook',array(
				'biography'=>$biography,
				'report'=>$report,
		));

	}

	public function loadModel($id)
	{
		$model=Book::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param MyMedia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='my-media-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}



}