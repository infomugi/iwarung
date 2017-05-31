<?php
/* @var $this penjualanController */
/* @var $model penjualan */
/* @var $form CActiveForm */
$url = Yii::app()->baseUrl."/"; 
?>

<H2 id="error-message"></H2>

<div class="form-normal form-horizontal clearfix">
	<div class="col-md-12"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'penjualan-form',
			'enableAjaxValidation'=>false,
			'enableClientValidation' => true,
			'clientOptions' => array(
				'validateOnSubmit' => true,
				),
			'errorMessageCssClass' => 'label label-info',
			'htmlOptions' => array('enctype' => 'multipart/form-data','autocomplete'=>'off'),
			)); ?>

			<?php echo $form->errorSummary($model, null, null, array('class' => 'alert alert-warning')); ?>

			<div class="col-sm-6">

				
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
								'value'=>date('d-m-Y'),
								'placeholder'=>'Tanggal Penjualan'
								),
							));
							?> 
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
								<?php echo $form->labelEx($model,'anggota_id'); ?>
							</div>   

							<div class="col-sm-8">
								<?php echo $form->error($model,'anggota_id'); ?>
								<?php echo $form->dropDownList($model, "anggota_id",
									CHtml::listData(Pelanggan::model()->findAll(),
										'idAnggota', 'namaLengkap'
										),
									array(
										"empty"=>"-- Pilih Pelanggan --", 
										'class'=>'form-control',
										'ajax' => array(
											'type'=>'POST',
											'dataType'=>'json',
											'url'=>CController::createUrl('/penjualan/pelanggan'),
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
									Alamat
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
									<table class="table table-hover table table-bordered table-striped" id="dynamic_field">  
										<tr id="row1">  
											<td><input class="search form-control ui-autocomplete-input" placeholder="Masukan Kode / Nama Barang" id="search" name="search" onfocusout="searchItem()" autocomplete="off" type="text"></td></td>  
											<td style="display:none"><input type="text" id="Detailpenjualan_barang_id1" name="Detailpenjualan[barang_id][]" placeholder="Kode Barang" class="form-control" /></td>  
											<td width="90px"><input type="text" id="Detailpenjualan_jumlah1" onfocusout="addItem()" onkeyup="subtotal(this);" name="Detailpenjualan[jumlah][]" placeholder="Qty" class="qty form-control" onkeypress="return check_int(event)" /></td>  
											<td width="50px"><h5 class="text-success stock"><span id="Detailpenjualan_stock1">0</span></h5></td>  
											<td width="110px"><h5 class="text-success price"><span id="Detailpenjualan_harga1">Rp. 0</span></h5></td>  
											<td width="140px"><h5 class="text-info subtotal" id="Detailpenjualan_subtotal1">-</h5></td>  
											<td><button type="button" style="display:none" name="add" id="add" class="btn btn-success btn-outline btn-rounded pull-right"><i class="fa fa-plus"></i></button></td>  
										</tr>  
									</table>  
								</div>  
							</div>  
						</div>

						<div class="form-group">
							<div class="col-sm-3">
								<p class="text-muted">Grand Total</p>
								<h5 class="text-success" data-placement="bottom" data-toggle="tooltip" title="Total Pembayaran"><span id="total" class="total">Rp. 0</span></h5>
							</div>
							<div class="col-sm-1">
								<p class="text-muted">Qty</p>
								<h5 class="text-success" data-placement="bottom" data-toggle="tooltip" title="Jumlah Pembelian"><span id="grand_qty" class="grand_qty">0</span></h5>
							</div>							
							<div class="col-sm-2">
								<p class="text-muted">Kembalian</p>
								<h5 class="text-info" data-toggle="tooltip" data-placement="bottom" title="Jumlah Kembalian" data-original-title="Tooltip on bottom"><span id="kembali" class="kembali">Rp. 0</span></h5>
							</div>
							<div class="col-sm-2">
								<input type="text" id="bayar" data-toggle="tooltip" data-placement="bottom" title="Jumlah Nominal Bayar" data-original-title="Tooltip on bottom" onkeypress="return check_int(event)" placeholder="Nominal Bayar" class="form-control input-lg" />
							</div>														
							<div class="col-sm-4">
								<button id="simpan" class="btn btn-success btn-rounded btn-lg btn-icon right-icon pull-right"><i class="fa fa-print"></i>  <span>Simpan & Cetak Faktur</span></button>
							</div>
						</div>						


						<?php $this->endWidget(); ?>

					</div></div><!-- form -->

					<script>  	
					//Inisiasi Awal
					var total=0;
					
					//Membuat Shortcut
					$(document).on('keydown', 'body', function(e){
						var charCode = ( e.which ) ? e.which : event.keyCode;
							if(charCode == 38) //Up
							{
								$('#bayar').focus();
								return false;
							}
							  if(charCode == 37) //Left
							  {
							  	window.location.replace("<?php echo YII::app()->baseUrl; ?>/penjualan/create");
							  }

							});

					$(document).on('keyup', '#bayar', function(){
						bayar();
					});

					function check_int(evt) {
						var charCode = ( evt.which ) ? evt.which : event.keyCode;
						return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
					}

					//START: KOLOM 1 
					//Autocomplete Kolom 1
					jQuery(function($) {
						jQuery('#search').autocomplete({'showAnim':'clip','select':function(event, ui) {
							var id = $('#Detailpenjualan_barang_id1').val(ui.item.id_barang);
							var harga = $('#Detailpenjualan_harga1').text(ui.item.harga);
							var stock = $('#Detailpenjualan_stock1').text(ui.item.stock);
							$('#search').val(ui.item.kode + ' - ' + ui.item.nama);
							$('#Detailpenjualan_stock1').focus();
							return false;
						},'source':'<?php echo $url; ?>penjualan/juiautocomplete'});
					});	

					//Subtotal Kolom 1
					$(function(){ 
						$('#Detailpenjualan_jumlah1').change(function() {
							var a = $('#Detailpenjualan_jumlah1').val();
							var b = $('#Detailpenjualan_harga1').text();
							var c = $('#Detailpenjualan_stock1').text();
							var e = $('#search').val();

							if(parseInt(a) > c){
								notifError("Perhatian",e + ' memiliki stok '+c);
								$('#Detailpenjualan_jumlah1').val('0').focus();
							}else{
								notif('Berhasil',e + ' telah ditambahkan');
								updateAll();
								// $('#add').click();
							}
						});
					});		
					//END: KOLOM 1

					//START: KOLOM 2
					$(document).ready(function(){  
						var i=1, a=1, b=1, c=1, d=1; 

						//Add Item
						$('#add').click(function(){
							updateAll();
							i++;  
							a++;  
							b++;  
							c++;  
							d++;  
							// START
							$('#dynamic_field').append('<tr id="row'+i+'"><td><input class="form-control ui-autocomplete-input search" placeholder="Masukan Kode / Nama Barang" id="search'+i+'" name="search" autocomplete="off" type="text"></td><td style="display:none"><input type="text" id="Detailpenjualan_barang_id'+i+'" name="Detailpenjualan[barang_id][]" placeholder="Kode Barang" class="form-control"/></td><td width="90px"><input type="text" id="Detailpenjualan_jumlah'+i+'" onfocusout="addItem()" onkeypress="return check_int(event)" name="Detailpenjualan[jumlah][]" placeholder="Qty" class="qty form-control" /></td><td width="120px" title="Jumlah Stok"><h5 class="text-success stock"><span id="Detailpenjualan_stock'+i+'">-</span></h5></td><td><h5 class="text-success price"><span id="Detailpenjualan_harga'+i+'">-</span></h5></td><td><h5 class="text-info subtotal" id="Detailpenjualan_subtotal'+i+'">-</h5></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-outline pull-right btn-rounded btn_remove">X</button></td></tr>');  

							//Fokus ke Kode Barang Selanjutnya
							$('#search'+i+'').focus();

							$( "#search1" ).click(function() {
								$( "#target" ).focus();
							});

							//Autocomplete
							jQuery(function($) {
								jQuery('#search'+i+'').autocomplete({'showAnim':'fold','select':function(event, ui) {
									var id = $('#Detailpenjualan_barang_id'+i+'').val(ui.item.id_barang);
									var harga = $('#Detailpenjualan_harga'+i+'').text(ui.item.harga);
									var stock = $('#Detailpenjualan_stock'+i+'').text(ui.item.stock);
									var jumlah = $('#Detailpenjualan_jumlah'+i+'').text(1);
									$('#search'+i+'').val(ui.item.kode + ' - ' + ui.item.nama);
									return false;
								},'source':'<?php echo $url; ?>penjualan/juiautocomplete'});
							});

							//Subtotal
							$(function(){ 
								$('#Detailpenjualan_jumlah'+i+'').change(function() {
									var a = $('#Detailpenjualan_jumlah'+i+'').val();
									var b = $('#Detailpenjualan_harga'+i+'').text();
									var c = $('#Detailpenjualan_stock'+i+'').text();
									var e = $('#search'+i+'').val();
									d = a * parseInt(b); 
									$('#Detailpenjualan_subtotal'+i+'').text(parseInt(d));

									if(parseInt(a) > c){
										notifError("Perhatian",e + ' memiliki stok '+c);
										updateAll();
										$('#Detailpenjualan_jumlah'+i+'').val(0);
										$('#Detailpenjualan_jumlah'+i+'').focus();
									}else{
										notif('Berhasil',e + ' telah ditambahkan');
										updateAll();
										// $('#add').click();
										$('#search'+i+'').focus();
									}
								});
							});	
						});  
						//END: KOLOM 2
						
							//Remove Item
							$(document).on('click', '.btn_remove', function(){  
								var button_id = $(this).attr("id");   
								$('#row'+button_id+'').remove(); 
								updateAll();
							});  
						});  		


					function addItem() {
						$(".qty").each(function(){
							qty = $(this).val();
						});
						if(qty==0){
							notifError("Error","QTY tidak Boleh Kosong");
							$(".qty").focus();
						}else{
							$('#add').click(); 
						}
					}	

					function searchItem() {
						$(".search").each(function(){
							search = $(this).val();
						});						
						if(search==0){
							notifError("Error","Kode Barang tidak Boleh Kosong");
							$(".search").focus();
						}else{
							$(".qty").focus();
						}
					}																		

					function bayar()
					{
						var Cash = $('#bayar').val();
						var TotalBayar = $('#Penjualan_total_jual').val();

						if(parseInt(Cash) >= parseInt(TotalBayar)){
							var Selisih = parseInt(Cash) - parseInt(TotalBayar);
							notif('Kembali','Sebesar '+to_rupiah(parseInt(Selisih)));
							$('#kembali').text(to_rupiah(parseInt(Selisih)));
						} else {
							$('#kembali').val('');
						}
					}									

					function subtotal(data) {
						validAngka(data);
						var a = $("#Detailpenjualan_jumlah1").val();
						var b = $("#Detailpenjualan_harga1").text();
						c = a * parseInt(b); 
						$("#Detailpenjualan_subtotal1").text(c);
					}

					function grandQty(){
						var qty=0;
						$(".qty").each(function(){
							qty += parseFloat($(this).val()||0);
						});
						$('#grand_qty').text(parseInt(qty));
					}	

					function grandtotal(){
						var sum = 0;
						$('#dynamic_field > tbody  > tr').each(function() {
							var qty = $(this).find('.qty').val();
							var price = $(this).find('.price').text();
							var amount = (parseInt(qty)*parseInt(price))
							sum+=parseInt(amount);
							$(this).find('.subtotal').text('Rp. '+validNum(amount));
						});
						$('.text-dark').text(parseInt(sum));
						$('#total').text(to_rupiah(validNum(parseInt(sum))));
						$('#Penjualan_total_jual').val(parseInt(sum));						
					}							

					$(".qty").on('change', function () {
						var self = $(this);
						self.val();
						grandtotal();
						grandQty();
					});								

					function updateAll(){
						grandtotal();
						grandQty();
					}

					function validNum(val) {
						if (isNaN(val)) {
							return 0;
						}
						return val;
					}

					$("#bayar").on('focus', function () {
						$("#simpan").show();
						$("#cetak").show();
					});	

					$(document).ready(function(){
						var a = $(".qty").val();						
						var c = $(".search").val();						
						if(a == 0 && c == 0 ){
							$("#add").hide();
						}else if(b == 0){
							$(".search").focus();
							notifError("Error","Kode Barang tidak Boleh Kosong");
						}else{
							$("#add").show();
						}
						$("#simpan").hide();
						$("#cetak").hide();
						$('[data-toggle="tooltip"]').tooltip();
					});
				</script> 

