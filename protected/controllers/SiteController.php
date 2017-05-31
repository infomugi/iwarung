<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
				),
			);
	}


	public function actionIndex()
	{
		if(Yii::app()->user->isGuest) {
			$this->actionLogin();
		} else {
			$this->render('dashboard');
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		$this->layout = "error";
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	public function actionPengeluaran()
	{
		if(Yii::app()->user->isGuest) {
			$this->actionLogin();
		} else {
			if(Yii::app()->user->record->level==1 || Yii::app()->user->record->level==2){
				$this->render('laporan_pembelian');
			}else{
				throw new CHttpException(403,'Anda tidak diotorisasi untuk melakukan action ini.');
			}
		}
	}	

	public function actionPendapatan()
	{
		if(Yii::app()->user->isGuest) {
			$this->actionLogin();
		} else {
			if(Yii::app()->user->record->level==1 || Yii::app()->user->record->level==2){
				$this->render('laporan_penjualan');
			}else{
				throw new CHttpException(403,'Anda tidak diotorisasi untuk melakukan action ini.');
			}
		}
	}			

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
				"Reply-To: {$model->email}\r\n".
				"MIME-Version: 1.0\r\n".
				"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		$this->layout = "signin";

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				if(YII::app()->user->record->level==1){
					$this->redirect(Yii::app()->user->returnUrl);
				}elseif(YII::app()->user->record->level==2){
					$this->redirect(array('site/index'));
				}elseif(YII::app()->user->record->level==3){
					$this->redirect(array('site/index'));
				}else{
					$this->redirect(array('site/index'));
				}
			}
		// display the login form
			$this->render('login',array('model'=>$model));
		}


		public function actionLoginAnggota()
		{
			$model=new LoginFormAnggota;

			$this->layout = "signin";

		// if it is ajax validation request
			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

		// collect user input data
			if(isset($_POST['LoginFormAnggota']))
			{
				$model->attributes=$_POST['LoginFormAnggota'];
			// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login())
					if(YII::app()->user->record->level==1){
						$this->redirect(Yii::app()->user->returnUrl);
					}elseif(YII::app()->user->record->level==2){
						$this->redirect(array('site/index'));
					}elseif(YII::app()->user->record->level==3){
						$this->redirect(array('site/index'));
					}else{
						$this->redirect(array('site/index'));
					}
				}
		// display the login form
				$this->render('login',array('model'=>$model));
			}	


			public function actionRegister()
			{
				$model=new User('registration');
				$this->layout = "signin";

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

				if(isset($_POST['User']))
				{
					$model->attributes=$_POST['User'];
					$model->password = md5($model->password);
					if($model->save())
						$this->redirect(Yii::app()->homeUrl);
				}

				$this->render('register',array(
					'model'=>$model,
					));
			}	

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	
}