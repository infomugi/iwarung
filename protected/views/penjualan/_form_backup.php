<?php
/* @var $this penjualanController */
/* @var $model penjualan */
/* @var $form CActiveForm */
$url = Yii::app()->baseUrl."/index.php?r="; 
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-md-12"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'penjualan-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('enctype'=>'multipart/form-data'), 
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			<div class="col-sm-6">

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'user_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'user_id'); ?>
						<input type="text" class="form-control" disabled value="<?php echo YII::app()->user->record->namaLengkap; ?>">
					</div>

				</div>	

				<div class="form-group">

					<div class="col-sm-4 control-label">
						Bagian
					</div>   

					<div class="col-sm-8">
						<input type="text" class="form-control" disabled value="<?php $data = Divisi::model()->findBypk(YII::app()->user->record->level); echo $data->namaDivisi; ?>">
					</div>

				</div>								

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'tanggal_jual'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'tanggal_jual'); ?>
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'tanggal_jual',
							'model' => $model,
							'attribute' => 'tanggal_jual',
							'id'=>'tanggal_jual',
							'value'=>Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->tanggal_jual)),
							'options'=>array(
								'dateFormat' => 'd-mm-yy',
			        'showAnim'=>'fadeIn',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
			        'changeMonth'=>true,
			        'changeYear'=>true,
			        'yearRange'=>'2017:2025',
			        ),
							'htmlOptions'=>array(
								'class'=>'form-control',
								'placeholder'=>'Tanggal penjualan'
								),
							));
							?> 
						</div>

					</div>   					


				</div>


				<div class="col-sm-6">

					<div class="form-group" style="display:none">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'total_jual'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'total_jual'); ?>
							<?php echo $form->textField($model,'total_jual',array('class'=>'form-control','placeholder'=>'Total penjualan')); ?>
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
								array('1'=>'Tunai','2'=>'Kredit'),
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
								<?php echo $form->labelEx($model,'anggota_id'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->error($model,'anggota_id'); ?>
								<?php echo $form->dropDownList($model, "anggota_id",
									CHtml::listData(Anggota::model()->findAll(),
										'idAnggota', 'namaLengkap'
										),
									array(
										"empty"=>"-- Anggota --", 
										'class'=>'form-control',
										'ajax' => array(
											'type'=>'POST',
											'dataType'=>'json',
											'url'=>CController::createUrl('/penjualan/anggota'),
											'data' => "js:{data:$(this).val()}",
											'success'=>'function(data){
												$("#rekomendasi").val(data.isi);
											}',),							
										)
									); 
									?> 


								</div>

							</div> 						

							<div class="form-group">

								<div class="col-sm-4 control-label">
									Alamat Anggota
								</div>   

								<div class="col-sm-8">
									<textarea type="text" class="form form-control" disabled id="rekomendasi"> 
									</textarea>
								</div>

							</div>						  

						</div> 



						<div class="form-group" style="display:none;">
							<div class="col-md-12">  
								<?php echo CHtml::submitButton($model->isNewRecord ? 'Simpan' : 'Edit', array('class' => 'btn btn-success btn-rounded btn-lg btn-icon right-icon pull-right')); ?>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group">  
								<div class="table-responsive">  
									<table class="table table-bordered" id="dynamic_field">  
										<tr id="row1">  
											<td><input class="form-control ui-autocomplete-input" placeholder="Cari Barang" id="search" name="search" autocomplete="off" type="text"></td></td>  
											<td style="display:none;"><input type="text" id="Detailpenjualan_barang_id1" name="Detailpenjualan[barang_id][]" placeholder="Kode Barang" class="form-control" /></td>  
											<td width="90px"><input type="text" id="Detailpenjualan_jumlah1" onkeyup="subtotal(this);" name="Detailpenjualan[jumlah][]" placeholder="Qty" class="form-control" /></td>  
											<td width="120px"><input type="text" id="Detailpenjualan_stock1" name="Detailpenjualan[stock][]" placeholder="Stock" class="form-control" disabled="true" /></td>  
											<td><input type="text" id="Detailpenjualan_harga1" name="Detailpenjualan[harga][]" placeholder="Harga" class="form-control" disabled="true" /></td>  
											<td><input type="text" id="Detailpenjualan_subtotal1" name="Detailpenjualan[subtotal][]" placeholder="Sub Total" class="form-control" disabled="true" /></td>  
											<td><button type="button" name="add" id="add" class="btn btn-success"><i class="fa fa-plus"></i></button></td>  
										</tr>  
									</table>  
								</div>  
							</div>  
						</div>

						<div class="form-group">
							<div class="col-sm-4">
								<input type="text" id="total" disabled="true" placeholder="Grand Total" class="form-control form-lg" />
							</div>
							<div class="col-sm-3">
								<input type="text" id="kembali" disabled="true" placeholder="Kembali" class="form-control form-lg" />
							</div>
							<div class="col-sm-3">
								<input type="text" id="bayar" onkeyup="validAngka(this);" placeholder="Bayar" class="form-control form-lg" />
							</div>														
							<div class="col-sm-2">
								<button type="submit" class="btn btn-info pull-right">Simpan</button>
							</div>
						</div>						


						<?php $this->endWidget(); ?>

					</div></div><!-- form -->

					<script>  	
					//Inisiasi Awal
					var total=0;
					bayar();

					function bayar(){
						$(function(){ 
							$('#bayar').keyup(function() {
								var a = $('#bayar').val();
								var b = $('#Penjualan_total_jual').val();
								c = parseInt(a) - parseInt(b); 
								$('#kembali').val(to_rupiah(parseInt(c)));
								notif('Kembali','Sebesar '+to_rupiah(c));
							});
						});														
					}						

					function subtotal(data) {
						validAngka(data);
						var a = $("#Detailpenjualan_jumlah1").val();
						var b = $("#Detailpenjualan_harga1").val();
						c = a * b; 
						$("#Detailpenjualan_subtotal1").val(to_rupiah(c));
					}

					function grandtotal(data){
						total += parseInt(data); 
						$('#total').val(to_rupiah(parseInt(total)));
						$('#Penjualan_total_jual').val(parseInt(total));

					}

					//Autocomplete
					jQuery(function($) {
						jQuery('#search').autocomplete({'showAnim':'clip','select':function(event, ui) {
							var id = $('#Detailpenjualan_barang_id1').val(ui.item.id_barang);
							// var jumlah = $('#Detailpenjualan_jumlah1').val(1);
							var harga = $('#Detailpenjualan_harga1').val(ui.item.harga);
							// var stock = $('#Detailpenjualan_stock1').val(ui.item.stock + ' ' + ui.item.satuan);
							var stock = $('#Detailpenjualan_stock1').val(ui.item.stock);
							$('#search').val(ui.item.kode + ' - ' + ui.item.nama);
							return false;
						},'source':'<?php echo $url; ?>penjualan/juiautocomplete'});
					});	

					//Subtotal
					$(function(){ // this will be called when the DOM is ready
						$('#Detailpenjualan_jumlah1').change(function() {
							var a = $('#Detailpenjualan_jumlah1').val();
							var b = $('#Detailpenjualan_harga1').val();
							var c = $('#Detailpenjualan_stock1').val();
							var e = $('#search').val();
							d = a * b; 
							$('#Detailpenjualan_subtotal1').val(to_rupiah(d));

							if(parseInt(a) > c){

								$.toast({
									heading: 'Gagal',
									text: e + ' memiliki stok '+c,
									position: 'bottom-right',
									loaderBg:'#3cb878',
									icon: 'error',
									hideAfter: 3500, 
									stack: 3
								});	

								$('#Detailpenjualan_jumlah1').val('');
								$('#Detailpenjualan_jumlah1').focus();

							}else{

								notif('Berhasil',e + ' telah ditambahkan');
								grandtotal(d);
								// $('#add').click();
							}

						});

					});


					$(document).ready(function(){  
						var i=1, a=1, b=1, c=1, d=1; 
						
						//Add Item
						$('#add').click(function(){
							i++;  
							a++;  
							b++;  
							c++;  
							d++;  
							// START
							$('#dynamic_field').append('<tr id="row'+i+'"><td><input class="form-control ui-autocomplete-input" placeholder="Cari Barang" id="search'+i+'" name="search" autocomplete="off" type="text"></td><td style="display:none;"><input type="text" id="Detailpenjualan_barang_id'+i+'" name="Detailpenjualan[barang_id][]" placeholder="Kode Barang" class="form-control" /></td><td width="90px"><input type="text" id="Detailpenjualan_jumlah'+i+'" onkeyup="validAngka(this);" name="Detailpenjualan[jumlah][]" placeholder="Qty" class="form-control" /></td><td width="120px" title="Jumlah Stok"><input type="text" id="Detailpenjualan_stock'+i+'" name="Detailpenjualan[stock][]" placeholder="Stock" class="form-control" disabled="true" /></td><td><input type="text" id="Detailpenjualan_harga'+i+'" name="Detailpenjualan[harga][]" placeholder="Harga" class="form-control" disabled="true" /></td><td><input type="text" id="Detailpenjualan_subtotal'+i+'" name="Detailpenjualan[subtotal][]" placeholder="Subtotal" class="form-control" disabled="true" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  

							//Fokus ke Kode Barang Selanjutnya
							$('#search'+i+'').focus();

							//Autocomplete
							jQuery(function($) {
								jQuery('#search'+i+'').autocomplete({'showAnim':'fold','select':function(event, ui) {
									var id = $('#Detailpenjualan_barang_id'+i+'').val(ui.item.id_barang);
									var harga = $('#Detailpenjualan_harga'+i+'').val(ui.item.harga);
									// var stock = $('#Detailpenjualan_stock'+i+'').val(ui.item.stock + ' ' + ui.item.satuan);
									var stock = $('#Detailpenjualan_stock'+i+'').val(ui.item.stock);
									var jumlah = $('#Detailpenjualan_jumlah'+i+'').val(1);
									var subtotal = $('#Detailpenjualan_subtotal'+i+'').val(to_rupiah(1*ui.item.harga));
									$('#search'+i+'').val(ui.item.kode + ' - ' + ui.item.nama);
									return false;
								},'source':'<?php echo $url; ?>penjualan/juiautocomplete'});
							});

							//Subtotal
							$(function(){ 
								$('#Detailpenjualan_jumlah'+i+'').change(function() {
									var a = $('#Detailpenjualan_jumlah'+i+'').val();
									var b = $('#Detailpenjualan_harga'+i+'').val();
									var c = $('#Detailpenjualan_stock'+i+'').val();
									var e = $('#search'+i+'').val();
									d = a * b; 
									$('#Detailpenjualan_subtotal'+i+'').val(to_rupiah(d));

									if(parseInt(a) > c){

										$.toast({
											heading: 'Gagal',
											text: e + ' memiliki stok '+c,
											position: 'bottom-right',
											loaderBg:'#3cb878',
											icon: 'error',
											hideAfter: 3500, 
											stack: 3
										});	

										$('#Detailpenjualan_jumlah'+i+'').val(0);
										$('#Detailpenjualan_jumlah'+i+'').focus();

									}else{

										notif('Berhasil',e + ' telah ditambahkan');
										grandtotal(d);
										// $('#add').click();
										$('#search'+i+'').focus();
									}

								});

							});	


						});  
							// END

							//Remove Item
							$(document).on('click', '.btn_remove', function(){  
								var button_id = $(this).attr("id");   
								$('#row'+button_id+'').remove(); 
							});  


						});  						
					</script> 