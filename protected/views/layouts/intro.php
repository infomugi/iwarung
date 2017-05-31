<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Template Didesain oleh Mugi Rachmat - www.infomugi.com">
  <meta name="author" content="Mugi Rachmat - infomugi@gmail.com">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

  <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/static/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo Yii::app()->request->baseUrl; ?>/static/img/favicon.ico" type="image/x-icon">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/litebox.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo Yii::app()->request->baseUrl; ?>/static/css/main.css" rel="stylesheet">    

  <body>

    <?php echo $content; ?>

    <!--PRELOAD-->
    <div id="preloader">
      <div id="status"></div>
    </div>
    <!--end PRELOAD--> 


    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery-2.1.3.min.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/retina.min.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/wow.min.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/skrollr.min.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/litebox.min.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.ajaxchimp.min.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/jquery.downCount.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/tweetie.min.js"></script> 
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/static/js/main.js"></script>

  </body>

  </html>