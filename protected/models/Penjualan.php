<?php

/**
 * This is the model class for table "penjualan".
 *
 * The followings are the available columns in table 'penjualan':
 * @property integer $id
 * @property string $tanggal
 * @property string $tanggal_jual
 * @property integer $user_id
 * @property string $anggota_id
 * @property string $total_jual
 * @property string $token
 * @property integer $status
 */
class Penjualan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'penjualan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, tanggal_jual, user_id, anggota_id, status', 'required','on'=>'create'),
			array('tanggal, tanggal_jual, user_id, anggota_id, total_jual, status', 'required','on'=>'update'),
			array('user_id, anggota_id, total_jual, status', 'numerical', 'integerOnly'=>true),
			array('token','length','max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tanggal, tanggal_jual, user_id, anggota_id, total_jual, status', 'safe', 'on'=>'search'),
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
			'User'=>array(self::BELONGS_TO,'User','user_id'),
			'Pelanggan'=>array(self::BELONGS_TO,'Pelanggan','anggota_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tanggal' => 'Tanggal Input',
			'tanggal_jual' => 'Tanggal Jual',
			'user_id' => 'Petugas',
			'anggota_id' => 'Pelanggan',
			'total_jual' => 'Total Jual',
			'status' => 'Transaksi',
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
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('tanggal_jual',$this->tanggal_jual,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('anggota_id',$this->anggota_id,true);
		$criteria->compare('total_jual',$this->total_jual,true);
		$criteria->compare('status',$this->status);
		$criteria-> order = "tanggal_jual DESC";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Permintaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function beforeSave()
	{
		$this->tanggal = date('Y-m-d', strtotime($this->tanggal));
		$this->tanggal_jual = date('Y-m-d', strtotime($this->tanggal_jual));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->tanggal = date('d-m-Y', strtotime($this->tanggal));
		$this->tanggal_jual = date('d-m-Y', strtotime($this->tanggal_jual));
		return TRUE;
	}   	

	public function status($data){
		if($data==1){
			return "Tunai";
		}else{
			return "Kredit";
		}
	}

	public function grandtotal($data){
		$criteria= new CDbCriteria();
		$criteria->distinct = true;
		$criteria->group = 'barang_id';
		$criteria->order = 'barang_id';
		$criteria->condition = 'group_id='.$data;
		$totalBeli=new CActiveDataProvider('Detailpenjualan', array(
			'criteria'=>$criteria,
			'pagination'=>false,
			));

		$beli =  $totalBeli->totalItemCount;
		$total=0;
		for ($i=0; $i < $beli; $i++) { 
			$total = Yii::app()->db->createCommand('
				SELECT SUM(orders.jumlah*product.harga) as Jumlah 
				FROM detail_penjualan as orders 
				LEFT JOIN barang as product 
				ON orders.barang_id=product.id_barang 
				WHERE orders.group_id='.$data.'
				')->queryScalar();
		}

		if($total==null){
			return "0";
		}else{
			$data = self::model()->findBypk($data);
			$data->total_jual = $total;
			$data->save();
			return $total;
		}
	}	

	// Laporan Pendapatan Uang

	public function summaryToday(){
		$today = Yii::app()->db->createCommand('
			SELECT SUM(total_jual) AS summaryToday
			FROM penjualan
			WHERE tanggal_jual=DATE(NOW()) AND status=1
			GROUP BY tanggal_jual
			')->queryScalar();
		return  $this->model()->rupiah($today);
	}

	public function summaryWeek(){
		$week = Yii::app()->db->createCommand('
			SELECT SUM(total_jual) AS summaryToday
			FROM penjualan
			WHERE YEARWEEK(tanggal_jual)=YEARWEEK(NOW()) AND status=1
			GROUP BY YEARWEEK(tanggal_jual);
			')->queryScalar();
		return  $this->model()->rupiah($week);
	}

	public function summaryMonth(){
		$month = Yii::app()->db->createCommand('
			SELECT SUM(total_jual) AS summaryToday
			FROM penjualan
			WHERE MONTH(tanggal_jual)=MONTH(NOW()) AND status=1
			GROUP BY MONTH(tanggal_jual)
			')->queryScalar();
		return  $this->model()->rupiah($month);
	}

	public function summaryYear(){
		$year = Yii::app()->db->createCommand('
			SELECT SUM(total_jual) AS summaryToday
			FROM penjualan
			WHERE YEAR(tanggal_jual)=YEAR(NOW())
			GROUP BY YEAR(tanggal_jual)
			')->queryScalar();
		return $this->model()->rupiah($year);
	}	

	// Laporan Transaksi Penjualan

	public function countToday(){
		$today = Yii::app()->db->createCommand('
			SELECT COUNT(id) AS totalTransaction
			FROM penjualan
			WHERE tanggal_jual=DATE(NOW())
			GROUP BY tanggal_jual
			')->queryScalar();
		return $today;
	}	

	public function countWeek(){
		$week = Yii::app()->db->createCommand('
			SELECT COUNT(id) AS totalTransaction
			FROM penjualan
			WHERE YEARWEEK(tanggal_jual)=YEARWEEK(NOW()) AND status=1
			GROUP BY YEARWEEK(tanggal_jual);
			')->queryScalar();
		return $week;
	}

	public function countMonth(){
		$month = Yii::app()->db->createCommand('
			SELECT COUNT(id) AS totalTransaction
			FROM penjualan
			WHERE MONTH(tanggal_jual)=MONTH(NOW()) AND status=1
			GROUP BY MONTH(tanggal_jual)
			')->queryScalar();
		return $month;
	}

	public function countYear(){
		$year = Yii::app()->db->createCommand('
			SELECT COUNT(id) AS totalTransaction
			FROM penjualan
			WHERE YEAR(tanggal_jual)=YEAR(NOW()) AND status=1
			GROUP BY YEAR(tanggal_jual)
			')->queryScalar();
		return $year;
	}			

	public function rupiah($data){
		return Yii::app()->numberFormatter->format("###,###,###", $data);
	}


}
