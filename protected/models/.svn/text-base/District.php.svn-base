<?php
class District extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'district';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('code, name', 'required'),
				array('code, geo_id, province_id, amphur_id', 'numerical', 'integerOnly'=>true),
				array('name', 'length', 'max'=>255),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, code, name, geo_id, province_id, amphur_id', 'safe'),
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
				'amphur' => array(self::BELONGS_TO, 'Amphur', 'amphur_id'),
				'geo' => array(self::BELONGS_TO, 'Geography', 'geo_id'),
				'province' => array(self::BELONGS_TO, 'Province', 'province_id'),
				'members' => array(self::HAS_MANY, 'Member', 'district_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'ลำดับ',
				'code' => 'รหัส',
				'name' => 'ตำบล',
				'geo_id' => 'Geo',
				'province_id' => 'Province',
				'amphur_id' => 'Amphur',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		return new CActiveDataProvider($this);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
