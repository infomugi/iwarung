<?php

class ShopController extends Controller
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
				'actions'=>array(
					'update','site','logo','favicon','seo','socialmedia'
					// 'create','index','admin','view','delete'
					),
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
	public function actionSite()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(1),
			));
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			));
	}	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Shop;
		$model->setScenario('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			$model->created_by = YII::app()->user->id;
			$model->created_date = date('Y-m-d h:i:s');
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_shop));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel(1);
		$model->setScenario('update');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			$model->update_by = YII::app()->user->id;
			$model->update_date = date('Y-m-d h:i:s');
			if($model->save()){
				$this->redirect(array('site'));
				// $this->redirect(array('view','id'=>$model->id_shop));
			}
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Shop');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Shop('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Shop']))
			$model->attributes=$_GET['Shop'];

		$this->render('admin',array(
			'model'=>$model,
			));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Shop the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Shop::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Shop $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='setting-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionLogo()
	{
		$model=$this->loadModel(1);
		$model->setScenario('logo');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'logo'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'logo'); 
				$model->logo=$model->id_shop.'.'.$tmp->extensionName; 
			}

			if($model->save())
			{	
				if(strlen(trim($model->logo)) > 0) {
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/shop/'.$model->logo);
				}
				$this->redirect(array('site'));
				// $this->redirect(array('view','id'=>$model->id_shop));
			}
		}

		$this->render('logo',array(
			'model'=>$model,
			));
	}

	public function actionFavicon()
	{
		$model=$this->loadModel(1);
		$model->setScenario('favicon');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			$tmp;
			if(strlen(trim(CUploadedFile::getInstance($model,'favicon'))) > 0) 
			{ 
				$tmp=CUploadedFile::getInstance($model,'favicon'); 
				$model->favicon=$model->id_shop.'.'.$tmp->extensionName; 
			}

			if($model->save())
			{	
				if(strlen(trim($model->favicon)) > 0) {
					$tmp->saveAs(Yii::getPathOfAlias('webroot').'/image/shop/'.$model->favicon);
				}
				$this->redirect(array('site'));
				// $this->redirect(array('view','id'=>$model->id_shop));
			}
		}

		$this->render('favicon',array(
			'model'=>$model,
			));
	}	

	public function actionSeo()
	{
		$model=$this->loadModel(1);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			if($model->save())
				$this->redirect(array('site'));
				// $this->redirect(array('view','id'=>$model->id_shop));
		}

		$this->render('seo',array(
			'model'=>$model,
			));
	}	

	public function actionSocialMedia()
	{
		$model=$this->loadModel(1);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Shop']))
		{
			$model->attributes=$_POST['Shop'];
			if($model->save())
				$this->redirect(array('site'));
				// $this->redirect(array('view','id'=>$model->id_shop));
		}

		$this->render('socialmedia',array(
			'model'=>$model,
			));
	}	

}
