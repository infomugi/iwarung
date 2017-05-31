<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
	);
	?>

	<div class="login">

		<div class="row-fluid">
			
			<div class="dialog">
				<div class="block">
					<div class="well">
						<h3 class="header"><b>Masuk</b><span class="header-line"></span></h3>
						<div class="block-body">

							<div class="form">
								<?php $form=$this->beginWidget('CActiveForm', array(
									'id'=>'login-form',
									'enableClientValidation'=>true,
									'clientOptions'=>array(
										'validateOnSubmit'=>true,
										),
										)); ?>

										<div>
											<?php echo $form->labelEx($model,'username'); ?>
											<?php echo $form->textField($model,'username', array('class' => 'span12')); ?>
											<?php echo $form->error($model,'username'); ?>
										</div>

										<div>
											<?php echo $form->labelEx($model,'password'); ?>
											<?php echo $form->passwordField($model,'password', array('class' => 'span12')); ?>
											<?php echo $form->error($model,'password'); ?>
										</div>
										
										<?php echo CHtml::submitButton('Masuk', array('class' => 'btn btn-primary pull-right')); ?>
										
										<br>	
										<label class="login">* Belum punya akun? <b><a href="index.php?r=useraccounts/create"/>Registrasi</a></b></label>

										<div class="clearfix"></div>

										<?php $this->endWidget(); ?>
									</div><!-- form -->
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>



