<?php

/**
 * This is the model class for table "setting".
 *
 * The followings are the available columns in table 'setting':
 * @property integer $id_shop
 * @property string $name
 * @property string $description
 * @property string $keywords
 * @property string $favicon
 * @property string $logo
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $facebook
 * @property string $instagram
 * @property string $twitter
 * @property integer $status
 * @property integer $created_by
 * @property string $created_date
 * @property integer $update_by
 * @property string $update_date 
 */
class Shop extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'shop';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description, keywords, favicon, logo, address, phone, email, facebook, instagram, twitter, status', 'required','on'=>'create'),
			array('name, address, phone, email', 'required','on'=>'update'),
			array('logo', 'required','on'=>'logo'),
			array('favicon', 'required','on'=>'favicon'),
			array('status, phone, created_by, update_by', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('keywords, email, facebook, instagram, twitter', 'length', 'max'=>150),
			array('favicon, logo, phone', 'length', 'max'=>25),
			array('email','email'),
			array('logo', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'on'=>'logo'), 
			array('favicon', 'file', 'allowEmpty'=>true, 'types'=>'jpg, gif, png', 'on'=>'favicon'), 
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_shop, name, description, keywords, favicon, logo, address, phone, email, facebook, instagram, twitter, status', 'safe', 'on'=>'search'),
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
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_shop' => 'Id Site',
			'name' => 'Name',
			'description' => 'Description',
			'keywords' => 'Keywords',
			'favicon' => 'Favicon',
			'logo' => 'Logo',
			'address' => 'Address',
			'phone' => 'Phone',
			'email' => 'Email',
			'facebook' => 'Facebook',
			'instagram' => 'Instagram',
			'twitter' => 'Twitter',
			'status' => 'Status',
			);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_shop',$this->id_shop);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('favicon',$this->favicon,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('instagram',$this->instagram,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Setting the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function name(){
		$data = self::model()->findBypk(1);
		return $data->name;
	}

	public function phone(){
		$data = self::model()->findBypk(1);
		return $data->phone;
	}	

	public function email(){
		$data = self::model()->findBypk(1);
		return $data->email;
	}	

	public function address(){
		$data = self::model()->findBypk(1);
		return $data->address;
	}	

	public function logo(){
		$data = self::model()->findBypk(1);
		return $data->logo;
	}		

	public function favicon(){
		$data = self::model()->findBypk(1);
		return $data->favicon;
	}	

	public function facebook(){
		$data = self::model()->findBypk(1);
		return $data->facebook;
	}	

	public function twitter(){
		$data = self::model()->findBypk(1);
		return $data->twitter;
	}	

	public function instagram(){
		$data = self::model()->findBypk(1);
		return $data->instagram;
	}

	public function keywords(){
		$data = self::model()->findBypk(1);
		return $data->keywords;
	}

	public function description(){
		$data = self::model()->findBypk(1);
		return $data->description;
	}							
}
