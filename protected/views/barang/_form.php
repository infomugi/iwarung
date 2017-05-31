<?php
/* @var $this BarangController */
/* @var $model Barang */
/* @var $form CActiveForm */
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-md-9"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'barang-form',
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
					<?php echo $form->labelEx($model,'kode'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'kode'); ?>
					<?php echo $form->textField($model,'kode',array('class'=>'form-control','placeholder'=>'contoh: B00010')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'nama'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'nama'); ?>
					<?php echo $form->textField($model,'nama',array('class'=>'form-control','placeholder'=>'contoh: Dompet Kulit Coklat')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'deskripsi'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'deskripsi'); ?>
					<?php echo $form->textArea($model,'deskripsi',array('class'=>'form-control','placeholder'=>'contoh: Produk Kulit Asli Garut')); ?>
				</div>
				
			</div>  

			
			<div class="form-group">
				
				<div class="col-sm-4 control-label">
					<?php echo $form->labelEx($model,'satuan'); ?>
				</div>   

				<div class="col-sm-8">
					<?php echo $form->error($model,'satuan'); ?>
					<?php
					echo $form->radioButtonList($model,'satuan',
						array('1'=>'Unit','2'=>'Pcs','3'=>'Pack','4'=>'Dus'),
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
						<?php echo $form->labelEx($model,'harga_beli'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'harga_beli'); ?>
						<?php echo $form->textField($model,'harga_beli',array('class'=>'form-control','placeholder'=>'contoh: 50000')); ?>
					</div>
					
				</div>  				

				
				<div class="form-group">
					
					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'harga'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'harga'); ?>
						<?php echo $form->textField($model,'harga',array('class'=>'form-control','placeholder'=>'contoh: 75000')); ?>
					</div>
					
				</div>  

				
				<div class="form-group">
					
					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'kategori_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'kategori_id'); ?>
						<?php echo $form->dropDownList($model, "kategori_id",
							CHtml::listData(Kategori::model()->findAll(),
								'idKategori', 'nama'
								),
							array("empty"=>"-- Pilih Kategori --", 'class'=>'form-control')
							); ?> 
						</div>
						
					</div>  

					<div class="form-group">
						
						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'supplier_id'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'supplier_id'); ?>
							<?php echo $form->dropDownList($model, "supplier_id",
								CHtml::listData(Supplier::model()->findAll(),
									'id', 'nama'
									),
								array("empty"=>"-- Pilih Supplier --", 'class'=>'form-control')
								); ?> 
							</div>
							
						</div> 				

						
						<div class="form-group">
							
							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'stock'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->error($model,'stock'); ?>
								<?php echo $form->textField($model,'stock',array('class'=>'form-control','placeholder'=>'contoh: 25')); ?>
							</div>
							
						</div>  


						<div class="form-group">
							
							<div class="col-sm-4 control-label">
								<?php echo $form->labelEx($model,'minimal_stock'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->error($model,'minimal_stock'); ?>
								<?php echo $form->textField($model,'minimal_stock',array('class'=>'form-control','placeholder'=>'contoh: 5')); ?>
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
									array('1'=>'Aktif','0'=>'Tidak Aktif'),
									array(
										'template'=>'{input}{label}',
										'separator'=>'',
										'labelOptions'=>array(
											'style'=> '
											padding-left:15px;
											width: 120px;
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

					<script>  	
						// function count(){
						// 	var harga, bunga;
						// 	var a = $('#Barang_harga_beli').val();
						// 	bunga = a * 1 / 100;
						// 	harga = parseInt(a) + parseInt(bunga);
						// 	$('#Barang_harga').val(harga);
						// 	notif('Informasi','Harg Jual + Bunga Sebesar '+to_rupiah(harga));
						// }			

						// //Subtotal
						// $(function(){ // this will be called when the DOM is ready
							
						// 	$('#Barang_harga_beli').keyup(function() {
						// 		count();
						// 	});				

						// });
					</script>