<?php
/* @var $this DetailpermintaanController */
/* @var $model Detailpermintaan */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-md-9"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'detailpermintaan-form',
			'enableAjaxValidation'=>false,
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			
				<div class="form-group">
					
					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'barang_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'barang_id'); ?>
						<?php echo $form->textField($model,'barang_id'),array('class'=>'form-control')); ?>
					</div>
					
				</div>  

				
				<div class="form-group">
					
					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'supplier_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'supplier_id'); ?>
						<?php echo $form->textField($model,'supplier_id'),array('class'=>'form-control')); ?>
					</div>
					
				</div>  

				
				<div class="form-group">
					
					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'jumlah'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'jumlah'); ?>
						<?php echo $form->textField($model,'jumlah'),array('class'=>'form-control')); ?>
					</div>
					
				</div>  

				
				<div class="form-group">
					
					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'group_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'group_id'); ?>
						<?php echo $form->textField($model,'group_id'),array('class'=>'form-control')); ?>
					</div>
					
				</div>  

							<div class="form-group">
				<div class="col-md-12">  
				</br></br>
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-success btn-rounded btn-lg btn-icon right-icon pull-right')); ?>
			</div>
		</div>

		<?php $this->endWidget(); ?>

</div></div><!-- form -->