<?php
/* @var $this AnggotaController */
/* @var $model Anggota */
/* @var $form CActiveForm */
?>

<div class="form-normal form-horizontal clearfix">
	<div class="col-md-9"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'Anggota-form',
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
					<?php echo $form->labelEx($model,'namaLengkap'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'namaLengkap'); ?>
					<?php echo $form->textField($model,'namaLengkap', array('class'=>'form-control','placeholder'=>'contoh: Mugi Rachmat')); ?>
				</div>

			</div>  

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'username'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'username'); ?>
					<?php echo $form->textField($model,'username', array('class'=>'form-control','placeholder'=>'contoh: infomugi')); ?>
				</div>

			</div> 

			<div class="form-group">

				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'password'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'password'); ?>
					<?php echo $form->passwordField($model,'password', array('class'=>'form-control','placeholder'=>'contoh: p@ssw0rd')); ?>
				</div>

			</div> 			 

			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'jenisKelamin'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'jenisKelamin'); ?>
					<?php
					echo $form->radioButtonList($model,'jenisKelamin',
						array('1'=>'Laki-Laki','0'=>'Perempuan'),
						array(
							'template'=>'{input}{label}',
							'separator'=>'',
							'labelOptions'=>array(
								'class'=>'minimal', 'style'=>'padding-right:20px;margin-left:15px'),

							)                              
						);
						?>
					</div>

				</div>  


				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'tanggalLahir'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'tanggalLahir'); ?>
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'tanggalLahir',
							'model' => $model,
							'attribute' => 'tanggalLahir',
							'id'=>'tanggalLahir',
							'value'=>Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->tanggalLahir)),
							'options'=>array(
								'dateFormat' => 'd-mm-yy',
							        'showAnim'=>'fadeIn',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
							        'changeMonth'=>true,
							        'changeYear'=>true,
							        'yearRange'=>'1960:2000',
							        ),
							'htmlOptions'=>array(
								'class'=>'form-control',
								'placeholder'=>'25-03-1994',
								),
							));
							?> 
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'alamat'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'alamat'); ?>
							<?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50, 'class'=>'form-control','placeholder'=>'contoh: Jl. Raya Soekarno Hatta No.456 Bandung')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'email'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'email'); ?>
							<?php echo $form->textField($model,'email', array('class'=>'form-control','placeholder'=>'contoh: mugirachmat@infomugi.com')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'telephone'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'telephone'); ?>
							<?php echo $form->textField($model,'telephone', array('class'=>'form-control','placeholder'=>'contoh: 087824931504')); ?>
						</div>

					</div>  


					<div class="form-group">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'idDivisi'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'idDivisi'); ?>
							<?php
							echo $form->radioButtonList($model,'idDivisi',
								array('1'=>'Kecil','2'=>'Menengah','3'=>'Besar'),
								array(
									'template'=>'{input}{label}',
									'separator'=>'',
									'labelOptions'=>array(
										'class'=>'minimal', 'style'=>'padding-right:20px;margin-left:15px'),

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


