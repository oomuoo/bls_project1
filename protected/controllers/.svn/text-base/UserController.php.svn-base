<?php
class UserController extends Controller
{
	// set layout
	public $layout='//layouts/column2';

	/**
	 * Creates a new user model.
	 */
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
	
	/**
	 * Updates a user model.
	 */
	public function actionUpdate($id)
	{
		$user = User::model()->findByPK($id);
		$member = Member::model()->findByAttributes(array('user_id'=>$id));
		
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
						$this->redirect(array('user/view','id'=>$user->id));
				}
					
			}
		}
		
		$this->render('update', array(
			'user'=>$user,
			'member'=>$member,
		));
	}
	
	/**
	 * Deletes a user model.
	 */
	public function actionDelete($id)
	{
		$user = User::model()->findByPK($id);
		//$member = Member::model()->findByAttributes(array('user_id'=>$id));
		//$member->delete();
		$user->delete();
		if(!isset($_GET['ajax']))
			$this->redirect(
					isset($_POST['returnUrl'])?
					$_POST['returnUrl'] : array('index'));
	}
	
	/**
	 * Display one user model
	 */
	public function actionView($id)
	{
		$user = User::model()->findByPK($id);
		
		$this->render('view', array(
			'user'=>$user,
		));
	}
	
	/**
	 * Show all user models and manage function.
	 */
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
	
	public function actionChangeGeography()
	{
		$province = Province::model()->findAll('geo_id=:geo_id',
				array(':geo_id'=>(int) $_POST['geo_id']));
	
		$province = CHtml::listData($province,'id','name');
		$dropDownProvince = "<option value=''>Select Province</option>";
		foreach($province as $value=>$name)
			$dropDownProvince .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	
		echo CJSON::encode(array(
				'dropDownProvince'=>$dropDownProvince,
		));
	}
	public function actionChangeProvince()
	{
		$amphur = Amphur::model()->findAll('province_id=:province_id',
				array(':province_id'=>(int) $_POST['province_id']));
	
		$amphur = CHtml::listData($amphur,'id','name');
		$dropDownAmphur = "<option value=''>Select Amphur</option>";
		foreach($amphur as $value=>$name)
			$dropDownAmphur .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	
		echo CJSON::encode(array(
				'dropDownAmphur'=>$dropDownAmphur,
		));
	}
	public function actionChangeAmphur()
	{
		$district = District::model()->findAll('amphur_id=:amphur_id',
				array(':amphur_id'=>(int) $_POST['amphur_id']));
	
		$district = CHtml::listData($district,'id','name');
		$dropDownDistrict = "<option value=''>Select District</option>";
		foreach($district as $value=>$name)
			$dropDownDistrict .= CHtml::tag('option', array('value'=>$value),CHtml::encode($name),true);
	
		echo CJSON::encode(array(
				'dropDownDistrict'=>$dropDownDistrict,
		));
	}
}