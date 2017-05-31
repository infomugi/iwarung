<?php

class PembelianController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			// 'postOnly + delete', // we only allow deletion via POST request
			);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index','view','create','print','juiautocomplete','supplier','admin'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==2',
				),			
			array('allow',
				'actions'=>array('create','update','view','delete','index','admin','print','juiautocomplete','supplier'),
				'users'=>array('@'),
				'expression'=>'Yii::app()->user->record->level==1',
				),
			array('deny',
				'users'=>array('*'),
				),
			);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		Pembelian::model()->grandtotal($id);
		$criteria= new CDbCriteria();
		$criteria->distinct = 'barang_id';
		// $criteria->group = 'barang_id';
		$criteria->order = 'barang_id';
		$criteria->condition = 'group_id = '.$id;
		$dataProvider=new CActiveDataProvider('Detailpembelian', array(
			'criteria'=>$criteria,
			'pagination'=>false,
			));	
		

		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		Yii::import('ext.multimodelform.MultiModelForm');

		$model = new Pembelian;

		$member = new Detailpembelian;
		$validatedMembers = array();  //ensure an empty array
		$model->setScenario('create');
		
		if(isset($_POST['Pembelian']))
		{
			$model->attributes=$_POST['Pembelian'];
			$model->tanggal = date('Y-m-d h:i:s');
			$model->user_id = YII::app()->user->id;
			$model->status=1;	
			$model->token = md5($model->tanggal.rand(10000,10000));

            //validate detail before saving the master
			$detailOK = MultiModelForm::validate($member,$validatedMembers,$deleteItems);

			if ($detailOK && empty($validatedMembers))
			{
				Yii::app()->user->setFlash('error','No detail submitted');
				$detailOK = false;
			}

			if(
				$detailOK &&
				$model->save()
				)
			{
				//the value for the foreign key 'Pembelianid'
				$masterValues = array ('group_id'=>$model->id,'deskripsi'=>"Transaksi #".$model->id." Pengadaan Barang");

				if (MultiModelForm::save($member,$validatedMembers,$deleteItems,$masterValues)){
					
					//Update Grand Total				
					Pembelian::model()->grandtotal($model->id);

					$this->redirect(array('print','token'=>$model->token));
				}
			}
		}
     	//die("detailOK=$detailOK");
		$this->render('create',array(
			'model'=>$model,
			//submit the member and validatedItems to the widget in the edit form
			'member'=>$member,
			'validatedMembers' => $validatedMembers,
			));
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pembelian']))
		{
			$model->attributes=$_POST['Pembelian'];
			$model->total_beli = 0;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
			));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$head=$this->loadModel($id);
		$chile=$this->loadModelDetailBarang($id);
		$chile->delete();
		$head->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pembelian');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pembelian('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pembelian']))
			$model->attributes=$_GET['Pembelian'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pembelian the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pembelian::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadToken($token)
	{
		$model=Pembelian::model()->findByAttributes(array('token'=>$token));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		

	public function loadModelDetailBarang($id)
	{
		$model=Detailpembelian::model()->findByAttributes(array('group_id'=>$id));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}		

	public function loadModelBarang($id)
	{
		$model=Barang::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}	

	/**
	 * Performs the AJAX validation.
	 * @param Pembelian $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='Pembelian-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionPrint($token)
	{
		$this->layout = "print";

		$transaksi = $this->loadToken($token);

		$dataProvider=new CActiveDataProvider('Detailpembelian',array('criteria'=>array('condition'=>'group_id='.$transaksi->id)));

		$this->render('print',array(
			'model'=>$this->loadModel($transaksi->id),
			'dataProvider'=>$dataProvider,
			));
	}

	public function actionJuiAutoComplete($term) {
		$criteria = new CDbCriteria;
		$criteria->compare('nama', $term, true);
		$model = Barang::model()->findAll($criteria);

		foreach ($model as $value) {
			$array[] = array(
				'value' => ($value->kode . ' - ' . $value->nama),  
				'label' => ($value->kode . ' - ' . $value->nama),
				'kode'=>$value->kode,
				'nama'=>$value->nama,
				'harga'=>$value->harga_beli,
				'id_barang'=>$value->id_barang,
				'stock'=>$value->stock,
				'satuan'=>Barang::model()->satuan($value->satuan),
				);
		}

		echo CJSON::encode($array);
		Yii::app()->end();
	}	

	public function actionSupplier()
	{
		$isi='';

		$itu=Supplier::model()->findAll();
		foreach($itu as $i=>$ii)
		{
			if($_POST['data']==$ii->id)
			{
				$isi.=$ii->alamat;
			}		      
		}        

		echo CJSON::encode(array('isi'=>$isi));
		Yii::app()->end();
	}			

}
