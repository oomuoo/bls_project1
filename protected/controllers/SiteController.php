<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='//layouts/column3';
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	public function actionCreate()
	{
		//Yii::app()->theme = 'classic';
		// new user model
		$user = new User;
		// new user profile model
		$member = new Member;
	
		// check submit form
		if(isset($_POST['User']))
		{
			// get User object form register page
			$user->attributes = $_POST['User'];
			// get UserProfile object form register page
			$member->attributes = $_POST['Member'];
				
			// check user's rules
			$valid = $user->validate();
			// check user profile's rules
			$valid = $member->validate() && $valid;
				
			if($valid){
				// set another user attribute
				//$user->create_date  = date('Y-m-d H:i:s');
				// insert user
				// save(false), it means save without check rule
				if($user->save(false)){
					// keep file to $image
					if($image = CUploadedFile::getInstance($member,'picture'))
					{
						// path for file upload
						$path = Yii::getPathOfAlias('webroot').'/images/member_img/';
						// use image name as username
						$filename = $user->username.'.'.$image->getExtensionName();
						// uploaded image to path
						$image->saveAs($path.$filename);
					}else
						// this for no image file upload
						$filename = 'member_img/noimage.jpg';
					// set another user attribute
					$member->picture = $filename;
					$member->user_id = $user->id;
					// insert userProfile
					if($member->save(false))
						// success and redirect to login page
						$this->redirect(array('site/login'));
				}
					
			}
				
				
		}
		//sent user and user profile to register page
		$this->render('create', array(
				'user'=>$user,
				'member'=>$member,
		));
	}
	
	
	public function actionNewBooks()
	{
		
		/* $news=new Information();
		
		$news->unsetAttributes();  // clear any default values
		if(isset($_GET['Information']))
			$news->attributes=$_GET['Information']; */
		
		$results = Yii::app()->db->createCommand('SELECT book.id, book.category_id,book.create_date, 
			book.description, book.member_id, book.picture, book.create_date,
			book.name, member.alias
			FROM book left Join member on book.member_id = member.id
			order by book.id DESC')-> queryAll();
		$this->render('news',array(
				'news'=>$results
		));
	}
	
	/* public function actionViewNews($id)
	{
		$news = Book::model()->findByPk($id);
	
		$this->render('detailbooks',array(
				'news'=>$news,
		));
	} */
	
	
	public function actionDetailbooks($id)
	{
		
		$news = Book::model()->findByPk($id);
		$bookshelf = new  Bookshelf;
	
		if(isset($_POST['Bookshelf']))
		{
			$news->attributes=$_POST['Bookshelf'];
			$bookshelf->attributes=$_POST['Bookshelf'];
	
			$bookshelf->book_id = $news->id;
			$bookshelf->member_id = Yii::app()->user->id;
	
			if($bookshelf->save())
				$this->redirect(array('bookshelf/index'));
		}
	
		$this->render('detailbooks',array(
				//'news'=>$this->loadModel($id),
				'news'=>$news,
				'bookshelf'=>$bookshelf,
		));
	}
	
	public function actionReportBook($id)
	{
		//$healthAndBeauty = new HealthAndBeauty;
		$news=$this->loadModel($id);
		$report= new ReportBook;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
	
		if(isset($_POST['ReportBook']))
		{
			$news->attributes=$_POST['ReportBook'];
			$report->attributes=$_POST['ReportBook'];
	
			$report->book_id = $news->id;
			$report->dateReport = date('Y-m-d H:i:s');
			$report->status = 1;
			$report->user_id = Yii::app()->user->id;
	
			if($report->save())
				$this->redirect(array('newBooks'));
		}
	
		$this->render('reportBook',array(
				'news'=>$news,
				'report'=>$report,
		));
	
	}
	
	public function actionToTheMoon()
	{
	
		$news=new Information();
	
		$news->unsetAttributes();  // clear any default values
		if(isset($_GET['Information']))
			$news->attributes=$_GET['Information'];
	
		$this->render('ToTheMoon',array(
				'ToTheMoon'=>$news,
		));
	}
	public function actionComment()
	{
	
		$comment=new Information();
	
		$comment->unsetAttributes();  // clear any default values
		if(isset($_GET['Information']))
			$comment->attributes=$_GET['Information'];
	
		$this->render('comment',array(
				'comment'=>$comment,
		));
	}
	public function actionLiterature()
	{
	
		$literature=new Category();
	
		$literature->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$literature->attributes=$_GET['Category'];
	
		$this->render('literature',array(
				'literature'=>$literature,
		));
	}
	
	/* public function actionHealthAndBeauty()
	{
	
		$healthAndBeauty=new Book();
	
		$healthAndBeauty->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$healthAndBeauty->attributes=$_GET['Book'];
	
		$this->render('healthAndBeauty',array(
				'healthAndBeauty'=>$healthAndBeauty,
		));
	} */
	
	/* public function actionBiography()
	{
	
		$biography=new Category();
	
		$biography->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$biography->attributes=$_GET['Category'];
	
		$this->render('biography',array(
				'biography'=>$biography,
		));
	} */
	/* public function actionTravel()
	{
	
		$travel=new Category();
	
		$travel->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$travel->attributes=$_GET['Book'];
	
		$this->render('travel',array(
				'travel'=>$travel,
		));
	} */
	public function actionMusic()
	{
	
		$music=new Book();
	
		$music->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$music->attributes=$_GET['Book'];
	
		$this->render('music',array(
				'music'=>$music,
		));
	}
	public function actionGeneral()
	{
	
		$general=new Category();
	
		$general->unsetAttributes();  // clear any default values
		if(isset($_GET['Category']))
			$music->attributes=$_GET['Category'];
	
		$this->render('general',array(
				'general'=>$general,
		));
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	
	public function actionHowTo()
	{
		$this->render('howTo');
	}
	

	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function loadModel($id)
	{
		$model=Book::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}