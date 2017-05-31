<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
    );
    ?>

    <div class="wrapper-page animated fadeInDown">

        <div class="ex-page-content animated flipInX text-center">
            <h1><?php echo $code; ?></h1>
            <h2 class="font-light">Error <?php echo $code; ?> : <?php echo CHtml::encode($message); ?></h2><br>

            <br>

            <?php echo CHtml::link('<i class="fa fa-angle-left"></i> Back to Dashboard',
                array('index'),
                array('class' => 'btn btn-purple'));
                ?>


            </div>
            
        </div>