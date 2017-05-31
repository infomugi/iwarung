<?php

/**
 * This is the model class for table "divisi".
 *
 * The followings are the available columns in table 'divisi':
 * @property integer $idDivisi
 * @property string $kodeDivisi
 * @property string $namaDivisi
 * @property integer $status
 */
class Divisi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Divisi the static model class
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
		return 'divisi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kodeDivisi, namaDivisi, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('kodeDivisi', 'length', 'max'=>7),
			array('namaDivisi', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idDivisi, kodeDivisi, namaDivisi, status', 'safe', 'on'=>'search'),
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
			'idDivisi' => 'Id Divisi',
			'kodeDivisi' => 'Kode Divisi',
			'namaDivisi' => 'Nama Divisi',
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

		$criteria->compare('idDivisi',$this->idDivisi);
		$criteria->compare('kodeDivisi',$this->kodeDivisi,true);
		$criteria->compare('namaDivisi',$this->namaDivisi,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function status($a)
	{
		if($a==1)
			return "Aktif";
		else if($a==2)
			return "Tidak Aktif";	
		else 
			return "Tidak Terdaftar";
	}			
}