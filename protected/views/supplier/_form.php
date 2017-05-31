<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-md-9"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'supplier-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-info',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			
			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'nama'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'nama'); ?>
					<?php echo $form->textField($model,'nama',array('class'=>'form-control','placeholder'=>'contoh: CV. Infomugi Media')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'alamat'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'alamat'); ?>
					<?php echo $form->textArea($model,'alamat',array('class'=>'form-control','placeholder'=>'contoh: Jl. Raya Soreang Km.17')); ?>
				</div>

			</div>  


			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'kategori_id'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'kategori_id'); ?>
					<?php
					echo $form->radioButtonList($model,'kategori_id',
						array('1'=>'Kecil','2'=>'Menengah','3'=>'Besar'),
						array(
							'template'=>'{input}{label}',
							'separator'=>'',
							'labelOptions'=>array(
								'style'=> '
								padding-left:5px;
								width: 95px;
								float: left;
								'),
							'style'=>'float:left;',
							)                              
						);
						?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'telepon'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'telepon'); ?>
						<?php echo $form->textField($model,'telepon',array('class'=>'form-control','placeholder'=>'contoh: 087824931504')); ?>
					</div>

				</div> 


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'email'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'email'); ?>
						<?php echo $form->textField($model,'email',array('class'=>'form-control','placeholder'=>'contoh: mugirachmat@infomugi.com')); ?>
					</div>

				</div> 	 


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'status'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'status'); ?>
						<?php
						echo $form->radioButtonList($model,'status',
							array('1'=>'Aktif','0'=>'Tidak Akrif'),
							array(
								'template'=>'{input}{label}',
								'separator'=>'',
								'labelOptions'=>array(
									'style'=> '
									padding-left:5px;
									width: 95px;
									float: left;
									'),
								'style'=>'float:left;',
								)                              
							);
							?>
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