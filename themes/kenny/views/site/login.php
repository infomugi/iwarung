<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
  'Login',
  );
  ?>
  <!--Preloader-->
  <div class="preloader-it">
    <div class="la-anim-1"></div>
  </div>
  <!--/Preloader-->

  <div class="wrapper pa-0">

    <!-- Main Content -->
    <div class="page-wrapper pa-0 ma-0">
      <div class="container-fluid">
        <!-- Row -->
        <div class="table-struct full-width full-height">
          <div class="table-cell vertical-align-middle">
            <div class="auth-form  ml-auto mr-auto no-float">
              <div class="panel panel-default card-view mb-0">
                <div class="panel-heading">
                  <div class="text-center">
                    <h6 class="panel-title txt-dark hidden-xs"><?php echo YII::app()->name; ?></h6>
                    <BR>
                      <center>
                        <img class="img-responsive" src="<?php echo YII::app()->baseUrl."/image/shop/".Shop::model()->logo(); ?>" alt="Logo"/>
                      </center>

                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-12 col-xs-12">
                          <div class="form-wrap">
                           <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'enableAjaxValidation'=>false,
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                              'validateOnSubmit' => true,
                              ),
                            'errorMessageCssClass' => 'label label-info',
                            'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
                            )); ?>

                            <?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-danger')); ?>


                            <div class="form-group">
                              <label class="control-label mb-10" for="username">Username</label>
                              <div class="input-group">
                                <?php echo $form->textField($model,'username', array('class' => 'form-control text-blue', 'placeholder'=>'Username','id'=>'username')); ?>
                                <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label mb-10" for="password">Password</label>
                              <div class="input-group">
                               <?php echo $form->passwordField($model,'password', array('class' => 'form-control text-blue','placeholder'=>'Password','id'=>'password')); ?>
                               <div class="input-group-addon"><i class="icon-lock"></i></div>
                             </div>
                           </div>


                           <div class="form-group">
                            <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-success btn-block')); ?>   
                          </div>

                          <?php $this->endWidget(); ?>

                        </div>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Row --> 
      </div>

    </div>
    <!-- /Main Content -->

  </div>
    <!-- /#wrapper -->