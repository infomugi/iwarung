<?php

/**
 * This is the model class for table "pembelian".
 *
 * The followings are the available columns in table 'pembelian':
 * @property integer $id
 * @property string $tanggal
 * @property string $tanggal_masuk
 * @property integer $user_id
 * @property string $supplier_id
 * @property string $total_beli
 * @property string $token
 * @property integer $status
 */
class Pembelian extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pembelian';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal, tanggal_masuk, user_id, supplier_id, status', 'required','on'=>'create'),
			array('tanggal, tanggal_masuk, user_id, supplier_id, total_beli, status', 'required','on'=>'update'),
			array('user_id, supplier_id, total_beli, status', 'numerical', 'integerOnly'=>true),
			array('token','length','max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tanggal, tanggal_masuk, user_id, supplier_id, total_beli, status', 'safe', 'on'=>'search'),
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
			'Supplier'=>array(self::BELONGS_TO,'Supplier','supplier_id'),
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
			'tanggal_masuk' => 'Tanggal Beli',
			'user_id' => 'Petugas',
			'supplier_id' => 'Kode Supplier',
			'total_beli' => 'Total Beli',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('tanggal_masuk',$this->tanggal_masuk,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('supplier_id',$this->supplier_id,true);
		$criteria->compare('total_beli',$this->total_beli,true);
		$criteria->compare('status',$this->status);
		$criteria->order = "tanggal_masuk DESC";

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
		$this->tanggal_masuk = date('Y-m-d', strtotime($this->tanggal_masuk));
		return TRUE;
	}
	
	protected function afterFind()
	{
		$this->tanggal = date('d-m-Y', strtotime($this->tanggal));
		$this->tanggal_masuk = date('d-m-Y', strtotime($this->tanggal_masuk));
		return TRUE;
	}   	

	public function status($data){
		if($data==0){
			return "Belum di Verifikasi";
		}else{
			return "Sudah di Verifikasi";
		}
	}

	public function grandtotal($data){
		$criteria= new CDbCriteria();
		$criteria->distinct = true;
		$criteria->group = 'barang_id';
		$criteria->order = 'barang_id';
		$criteria->condition = 'group_id='.$data;
		$totalBeli=new CActiveDataProvider('Detailpembelian', array(
			'criteria'=>$criteria,
			'pagination'=>false,
			));

		$beli =  $totalBeli->totalItemCount;
		$total=0;
		for ($i=0; $i < $beli; $i++) { 
			$total = Yii::app()->db->createCommand('
				SELECT SUM(orders.jumlah*product.harga_beli) as Jumlah 
				FROM detail_pembelian as orders 
				LEFT JOIN barang as product 
				ON orders.barang_id=product.id_barang 
				WHERE orders.group_id='.$data.'
				')->queryScalar();
		}

		if($total==null){
			return "0";
		}else{
			$data = self::model()->findBypk($data);
			$data->total_beli = $total;
			$data->save();
			return $total;
		}
	}	

	public function buyToday(){
		$today = Yii::app()->db->createCommand('
			SELECT SUM(total_beli) AS summaryToday
			FROM pembelian
			WHERE tanggal_masuk=DATE(NOW()) AND status=1
			GROUP BY tanggal_masuk
			')->queryScalar();
		return  $this->model()->rupiah($today);
	}

	public function buyWeek(){
		$week = Yii::app()->db->createCommand('
			SELECT SUM(total_beli) AS summaryToday
			FROM pembelian
			WHERE YEARWEEK(tanggal_masuk)=YEARWEEK(NOW()) AND status=1
			GROUP BY YEARWEEK(tanggal_masuk);
			')->queryScalar();
		return  $this->model()->rupiah($week);
	}

	public function buyMonth(){
		$month = Yii::app()->db->createCommand('
			SELECT SUM(total_beli) AS summaryToday
			FROM pembelian
			WHERE MONTH(tanggal_masuk)=MONTH(NOW())
			GROUP BY MONTH(tanggal_masuk)
			')->queryScalar();
		return  $this->model()->rupiah($month);
	}

	public function buyYear(){
		$year = Yii::app()->db->createCommand('
			SELECT SUM(total_beli) AS summaryToday
			FROM pembelian
			WHERE YEAR(tanggal_masuk)=YEAR(NOW()) AND status=1
			GROUP BY YEAR(tanggal_masuk)
			')->queryScalar();
		return $this->model()->rupiah($year);
	}		


	// Laporan Transaksi Penjualan

	public function countToday(){
		$today = Yii::app()->db->createCommand('
			SELECT COUNT(id) AS totalTransaction
			FROM pembelian
			WHERE tanggal_masuk=DATE(NOW())
			GROUP BY tanggal_masuk
			')->queryScalar();
		return $today;
	}		

	public function countWeek(){
		$week = Yii::app()->db->createCommand('
			SELECT COUNT(id) AS totalTransaction
			FROM pembelian
			WHERE YEARWEEK(tanggal_masuk)=YEARWEEK(NOW()) AND status=1
			GROUP BY YEARWEEK(tanggal_masuk);
			')->queryScalar();
		return $week;
	}

	public function countMonth(){
		$month = Yii::app()->db->createCommand('
			SELECT COUNT(id) AS totalTransaction
			FROM pembelian
			WHERE MONTH(tanggal_masuk)=MONTH(NOW()) AND status=1
			GROUP BY MONTH(tanggal_masuk)
			')->queryScalar();
		return $month;
	}

	public function countYear(){
		$year = Yii::app()->db->createCommand('
			SELECT COUNT(id) AS totalTransaction
			FROM pembelian
			WHERE YEAR(tanggal_masuk)=YEAR(NOW()) AND status=1
			GROUP BY YEAR(tanggal_masuk)
			')->queryScalar();
		return $year;
	}			

	public function rupiah($data){
		return Yii::app()->numberFormatter->format("###,###,###", $data);
	}	

}
