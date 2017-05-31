<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $idUser
 * @property string $namaLengkap
 * @property string $jenisKelamin
 * @property string $tanggalLahir
 * @property string $alamat
 * @property string $email
 * @property string $telephone
 * @property integer $idDivisi
 * @property string $username
 * @property string $password
 * @property integer $level
 * @property integer $status
 */
class User extends CActiveRecord
{
	public $repeat_password;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email, namaLengkap', 'required','on'=>'registration'), 
			array('namaLengkap, jenisKelamin, tanggalLahir, alamat, email, telephone, idDivisi, username, password', 'required','on'=>'create'), 
			array('namaLengkap, jenisKelamin, tanggalLahir, alamat, email, telephone, idDivisi, username', 'required','on'=>'update'), 
			array('idDivisi, level, status, jenisKelamin', 'numerical', 'integerOnly'=>true),
			array('namaLengkap, username, password', 'length', 'max'=>255),
			array('password', 'required','on'=>'editpassword'), 
			array('password','length','max'=>64, 'min'=>6),			
			array('username','length','max'=>32),
			array('username','unique'),
			array('email', 'length', 'max'=>30),
			array('email','email'),
			array('email','unique'),
			array('username', 'match' ,'pattern'=>'/^[A-Za-z0-9_]+$/u',
				'message'=> 'Username hanya dapat diisi dengan Huruf dan Angka.'),
			array('username','filter', 'filter'=>'strtolower'),			
			array('telephone', 'length', 'max'=>15),
			array('password', 'compare', 'compareAttribute'=>'repeat_password', 'on'=>'registration'), 
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idUser, namaLengkap, jenisKelamin, tanggalLahir, alamat, email, telephone, idDivisi, username, password, level, status', 'safe', 'on'=>'search'),
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
			'division' => array(self::BELONGS_TO, 'divisi', 'idDivisi'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUser' => 'Id User',
			'namaLengkap' => 'Nama Lengkap',
			'jenisKelamin' => 'Jenis Kelamin',
			'tanggalLahir' => 'Tanggal Lahir',
			'alamat' => 'Alamat',
			'email' => 'Email',
			'telephone' => 'Telephone',
			'idDivisi' => 'Divisi',
			'username' => 'Username',
			'password' => 'Password',
			'level' => 'Level',
			'status' => 'Status',
			);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idUser',$this->idUser);
		$criteria->compare('namaLengkap',$this->namaLengkap,true);
		$criteria->compare('jenisKelamin',$this->jenisKelamin,true);
		$criteria->compare('tanggalLahir',$this->tanggalLahir,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('idDivisi',$this->idDivisi);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	public static function getSumMember()
	{
		$sql = "SELECT COUNT(idUser) as totalMember FROM User";
		$command = Yii::app()->db->createCommand($sql);
		
		return $command->queryAll();
	} 		

	protected function beforeSave()
	{
		$this->tanggalLahir = date('Y-m-d', strtotime($this->tanggalLahir));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->tanggalLahir = date('d-m-Y', strtotime($this->tanggalLahir));
		return TRUE;
	}    

	public function level($a)
	{
		if($a==0)
			return "Belum di Verifikasi";
		else if($a==1)
			return "Administrator";
		else if($a==2)
			return "Staff";								
		else 
			return "Tidak Diketahui";
	}	

	public function status($a)
	{
		if($a==0)
			return "Belum di Verifikasi";
		else if($a==1)
			return "Aktif";
		else if($a==2)
			return "Tidak Aktif";					
		else 
			return "Tidak Terdaftar";
	}		
}