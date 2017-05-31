<?php
/* @var $this DivisiController */
/* @var $model Divisi */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idDivisi'); ?>
		<?php echo $form->textField($model,'idDivisi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kodeDivisi'); ?>
		<?php echo $form->textField($model,'kodeDivisi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'namaDivisi'); ?>
		<?php echo $form->textField($model,'namaDivisi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->