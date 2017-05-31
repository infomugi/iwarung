<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Login',
  );
  ?>

  <div class="wrapper-page animated fadeInDown">
    <div class="panel panel-color panel-warning">
      <div class="panel-heading"> 
       <h3 class="text-center m-t-10"> Register to <strong>Hits Radio</strong> </h3>
     </div> 

     <div class="form-horizontal m-t-40">

      <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
         'validateOnSubmit'=>true,
         ),
         )); ?>

         <div class="text-blue text-center"><b><?php echo $form->error($model,'namaLengkap'); ?></b></center> </div>
         <div class="text-blue text-center"><b><?php echo $form->error($model,'username'); ?></b></center> </div>
         <div class="text-blue text-center"> <b><?php echo $form->error($model,'password'); ?></b></center> </div>
         <div class="text-blue text-center"><b><?php echo $form->error($model,'email'); ?></b></center> </div>

         <HR>


           <div class="form-group ">
            <div class="col-xs-12">
             <?php echo $form->textField($model,'namaLengkap', array('class' => 'form-control text-blue', 'placeholder'=>'Nama Lengkap')); ?>
           </div>
         </div>

         <div class="form-group ">
          <div class="col-xs-12">
           <?php echo $form->textField($model,'username', array('class' => 'form-control text-blue', 'placeholder'=>'Username')); ?>
         </div>
       </div>

       <div class="form-group ">
        <div class="col-xs-12">
         <?php echo $form->passwordField($model,'password', array('class' => 'form-control text-blue','placeholder'=>'Password')); ?>
       </div>
     </div>

       <div class="form-group ">
        <div class="col-xs-12">
         <?php echo $form->passwordField($model,'repeat_password', array('class' => 'form-control text-blue','placeholder'=>'Repeat Password')); ?>
       </div>
     </div>     

     <div class="form-group ">
      <div class="col-xs-12">
       <?php echo $form->textField($model,'email', array('class' => 'form-control text-blue', 'placeholder'=>'Email')); ?>
     </div>
   </div>       

   <div class="form-group text-right">
    <div class="col-xs-12">

      <?php echo CHtml::link('Login',
        array('site/login'),
        array('class' => 'btn btn-success btn-flat','title'=>'Login'));
        ?>

        <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-warning w-md')); ?>
      </div>
    </div>

    <?php $this->endWidget(); ?>

  </div>

</div>
</div>    

