<?php

class WebUser extends CWebUser {

	private $_model;

		
	public function isAdmin()
	{
		$user = $this->loadUser(Yii::app()->user->id); //เรียก tblUser โดยดูที่ id ของตาราง
		if ($user===null)
			return 0;
		else
			return intval($user->status) == 1;
	}
	
	public function isMember()
	{
		$user = $this->loadUser(Yii::app()->user->id); //เรียก tblUser โดยดูที่ id ของตาราง
		if ($user===null)
			return 0;
		else
			return intval($user->status) == 0;
	}
	
	protected function loadUser($id=null)
	{
		if($this->_model===null)
		{
	    	if($id!==null):
	    	     $this->_model = User::model()->findByPk($id);
	   	 	endif;
		}
			return $this->_model;
	}
}
?>