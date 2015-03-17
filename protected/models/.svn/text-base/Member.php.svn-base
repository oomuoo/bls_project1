<?php
class Member extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, address, geo_id, province_id, amphur_id, district_id, postcode, email', 'required'),
			array('geo_id, province_id, amphur_id, district_id, postcode, phone, user_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>45),
			array('address, picture', 'length', 'max'=>255),
			array('picture', 'file', 'types'=>'jpg, gif, png, jpeg', 'allowEmpty' => true),
			array('phone', 'length', 'is'=>10),
			array('postcode', 'length', 'is'=>5),
			array('email', 'email'),
			array('email, alias', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, birthdate, address, geo_id, province_id, amphur_id, district_id, postcode, phone, email, picture, alias', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'books' => array(self::HAS_MANY, 'Book', 'member_id'),
			//'user' => array(self::HAS_ONE, 'User', 'user_id'),
			'amphur' => array(self::BELONGS_TO, 'Amphur', 'amphur_id'),
			'district' => array(self::BELONGS_TO, 'District', 'district_id'),
			'geo' => array(self::BELONGS_TO, 'Geography', 'geo_id'),
			'province' => array(self::BELONGS_TO, 'Province', 'province_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ลำดับที่',
			'first_name' => 'ชื่อ',
			'last_name' => 'นามสกุล',
			'birthdate' => 'วันเกิด',
			'address' => 'ที่อยู่',
			'geo_id' => 'ภูมิภาค',
			'province_id' => 'จังหวัด',
			'amphur_id' => 'อำเภอ',
			'district_id' => 'ตำบล',
			'postcode' => 'รหัสไปรษณีย์',
			'phone' => 'โทรศัพท์',
			'email' => 'อีเมล์',
			'picture' => 'รูปภาพ',
			'alias' => 'นามปากกา',
			'user_id' => 'ผู้ใช้',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('birthdate',$this->birthdate,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('geo_id',$this->geo_id);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('amphur_id',$this->amphur_id);
		$criteria->compare('district_id',$this->district_id);
		$criteria->compare('postcode',$this->postcode);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('alias',$this->alias,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getgeography()
	{
		$list = array();
		$geography = Geography::model()->findAll(array('order'=> 'name'));
		$list = CHtml::listData($geography,'id','name');
		return $list;
	}
	
	
	public function getprovince()
	{
		$list = array();
		$province = Province::model()->findAll(array('order'=> 'name'));
		$list = CHtml::listData($province,'id','name');
		return $list;
	}
	public function getamphur()
	{
		$list = array();
		$amphur = Amphur::model()->findAll(array('order'=> 'name'));
		$list = CHtml::listData($amphur,'id','name');
		return $list;
	}
	
	public function getdistrict()
	{
		$list = array();
		$district = District::model()->findAll(array('order'=> 'name'));
		$list = CHtml::listData($district,'id','name');
		return $list;
	}
	
	public function beforeSave() { // ก่อนจะบันทึก ให้แปลง date ที่รับมาเป็น Y-m-d แล้วเอาลง DB
		$this->birthdate = date('Y-m-d', strtotime($this->birthdate));
		//$this->genser = $this->gender == 'M'?1:2; เป็นการแปลงก่อนบันทึกลงดาต้าเบส คือ ถ้า genser เป็น M ก็ให้เก็บค่าเป็น 1 ถ้าไม่ ก็เป็น 2
		return true; // ที่ต้องมีการ return เพราะมันเป็นการเช็คค่าของ DB ถ้าเป็น false มันก็จะไม่บันทึกให้
	}
	
	public function afterFind() { // ก่อนจะโชว์ หรือดึงมาแสดง ให้แปลง date ให้อยู่ใน format d-m-Y
		$this->birthdate = date('d-m-Y', strtotime($this->birthdate));
		//$this->genser = $this->gender == '1'?'M':'F'; แปลงกลับ ก่อนที่จะเอามาโชว์
		return true;
	}

}