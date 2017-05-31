<?php

/**
 * This is the model class for table "barang".
 *
 * The followings are the available columns in table 'barang':
 * @property integer $id_barang
 * @property string $kode
 * @property string $nama
 * @property string $deskripsi
 * @property integer $satuan
 * @property integer $harga
 * @property integer $harga_beli
 * @property integer $kategori_id
 * @property integer $supplier_id
 * @property integer $stock
 * @property integer $minimal_stock
 * @property integer $status
 */
class Barang extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'barang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode, nama, deskripsi, satuan, harga, harga_beli, kategori_id, supplier_id, stock, minimal_stock, status', 'required'),
			array('satuan, harga, kategori_id, stock, status', 'numerical', 'integerOnly'=>true),
			array('kode', 'length', 'max'=>15),
			array('nama', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_barang, kode, nama, deskripsi, satuan, harga, kategori_id, stock, status', 'safe', 'on'=>'search'),
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
			'Kategori'=>array(self::BELONGS_TO,'Kategori','kategori_id'),
			'Supplier'=>array(self::BELONGS_TO,'Supplier','supplier_id'),
			);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_barang' => 'Id Barang',
			'kode' => 'Kode Barang',
			'nama' => 'Nama Barang',
			'deskripsi' => 'Deskripsi',
			'satuan' => 'Satuan',
			'harga' => 'Harga Jual',
			'harga_beli' => 'Harga Beli',
			'kategori_id' => 'Kategori',
			'supplier_id' => 'Supplier',
			'stock' => 'Stock',
			'minimal_stock' => 'Minimal Stock',
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

		$criteria->compare('id_barang',$this->id_barang);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('satuan',$this->satuan);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('kategori_id',$this->kategori_id);
		$criteria->compare('stock',$this->stock);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Barang the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function status($data){
		if($data==1){
			return "Aktif";
		}else{
			return "Tidak Aktif";
		}
	}	

	public function satuan($data){
		if($data==1){
			return "Unit";
		}else if($data==2){
			return "Pcs";
		}else if($data==3){
			return "Dus";
		}else if($data==4){
			return "Box";
		}
	}
}
