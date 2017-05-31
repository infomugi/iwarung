<?php

/**
 * This is the model class for table "detailpembelian".
 *
 * The followings are the available columns in table 'detailpembelian':
 * @property integer $id
 * @property integer $barang_id
 * @property integer $deskripsi
 * @property integer $jumlah
 * @property integer $group_id
 */
class Detailpembelian extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'detail_pembelian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('barang_id, deskripsi, jumlah, group_id', 'required'),
			array('deskripsi', 'length', 'max'=>255),
			array('barang_id, jumlah, group_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, barang_id, deskripsi, jumlah, group_id', 'safe', 'on'=>'search'),
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
			'Barang'=>array(self::BELONGS_TO,'Barang','barang_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'barang_id' => 'Barang',
			'deskripsi' => 'Deskripsi',
			'jumlah' => 'Jumlah',
			'group_id' => 'Group',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('barang_id',$this->barang_id);
		$criteria->compare('deskripsi',$this->deskripsi);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('group_id',$this->group_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return detailpembelian the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function summaryToday(){
		$today = Yii::app()->db->createCommand('
			SELECT SUM(a.jumlah) AS summaryToday
			FROM detail_pembelian a LEFT JOIN pembelian b ON a.group_id=b.id 
			WHERE b.tanggal_masuk=DATE(NOW())
			GROUP BY b.tanggal_masuk
			')->queryScalar();
		return  $today;
	}

	public function summaryWeek(){
		$week = Yii::app()->db->createCommand('
			SELECT SUM(a.jumlah) AS summaryToday
			FROM detail_pembelian a LEFT JOIN pembelian b ON a.group_id=b.id 
			WHERE YEARWEEK(b.tanggal_masuk)=YEARWEEK(NOW())
			GROUP BY YEARWEEK(b.tanggal_masuk);
			')->queryScalar();
		return  $week;
	}

	public function summaryMonth(){
		$month = Yii::app()->db->createCommand('
			SELECT SUM(a.jumlah) AS summaryToday
			FROM detail_pembelian a LEFT JOIN pembelian b ON a.group_id=b.id 
			WHERE MONTH(b.tanggal_masuk)=MONTH(NOW())
			GROUP BY MONTH(b.tanggal_masuk)
			')->queryScalar();
		return  $month;
	}

	public function summaryYear(){
		$year = Yii::app()->db->createCommand('
			SELECT SUM(a.jumlah) AS summaryToday
			FROM detail_pembelian a LEFT JOIN pembelian b ON a.group_id=b.id 
			WHERE YEAR(b.tanggal_masuk)=YEAR(NOW())
			GROUP BY YEAR(b.tanggal_masuk)
			')->queryScalar();
		return $year;
	}	
	
}
