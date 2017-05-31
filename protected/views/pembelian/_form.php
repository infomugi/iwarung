<?php
/* @var $this PembelianController */
/* @var $model Pembelian */
/* @var $form CActiveForm */
$url = Yii::app()->baseUrl."/"; 
?>


<div class="form-normal form-horizontal clearfix">
	<div class="col-md-12"> 

		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'Pembelian-form',
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
						<?php echo $form->labelEx($model,'user_id'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'user_id'); ?>
						<input type="text" class="form-control" disabled value="<?php echo YII::app()->user->record->namaLengkap; ?>">
					</div>

				</div>				

				<div class="form-group">

					<div class="col-sm-4 control-label">
						<?php echo $form->labelEx($model,'tanggal_masuk'); ?>
					</div>   

					<div class="col-sm-8">
						<?php echo $form->error($model,'tanggal_masuk'); ?>
						<?php
						$this->widget('zii.widgets.jui.CJuiDatePicker',array(
							'name'=>'tanggal_masuk',
							'model' => $model,
							'attribute' => 'tanggal_masuk',
							'id'=>'tanggal_masuk',
							'value'=>Yii::app()->dateFormatter->format("dd-MM-yyyy",strtotime($model->tanggal_masuk)),
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
								'placeholder'=>'Tanggal Pembelian'
								),
							));
							?> 
						</div>

					</div>  	


				</div>


				<div class="col-sm-6">

					<div class="form-group"  style="display:none">

						<div class="col-sm-4 control-label">
							<?php echo $form->labelEx($model,'total_beli'); ?>
						</div>   

						<div class="col-sm-8">
							<?php echo $form->error($model,'total_beli'); ?>
							<?php echo $form->textField($model,'total_beli',array('class'=>'form-control','placeholder'=>'Total Pembelian')); ?>
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
								array(
									"empty"=>"-- Supplier --", 
									'class'=>'form-control',
									'ajax' => array(
										'type'=>'POST',
										'dataType'=>'json',
										'url'=>CController::createUrl('/pembelian/supplier'),
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
								Alamat Supplier
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
										<td><input class="form-control ui-autocomplete-input" placeholder="Cari Barang" id="search" name="search" autocomplete="off" type="text"></td></td>  
										<td style="display:none;"><input type="text" id="Detailpembelian_barang_id1" name="Detailpembelian[barang_id][]" placeholder="Kode Barang" class="form-control" /></td>  
										<td width="90px"><input type="text" id="Detailpembelian_jumlah1" onkeyup="subtotal(this);" name="Detailpembelian[jumlah][]" placeholder="Qty" class="form-control" /></td>  
										<td width="120px"><input type="text" id="Detailpembelian_stock1" name="Detailpembelian[stock][]" placeholder="Stock" class="form-control" disabled="true" /></td>  
										<td><input type="text" id="Detailpembelian_harga1" name="Detailpembelian[harga][]" placeholder="Harga" class="form-control" disabled="true" /></td>  
										<td><input type="text" id="Detailpembelian_subtotal1" name="Detailpembelian[subtotal][]" placeholder="Sub Total" class="form-control" disabled="true" /></td>  
										<td><button type="button" name="add" id="add" class="btn btn-success btn-outline btn-rounded pull-right"><i class="fa fa-plus"></i></button></td>  
									</tr>  
								</table>  
							</div>  
						</div>  
					</div>

					<button type="submit" class="btn btn-success btn-rounded btn-lg btn-icon right-icon pull-right">Simpan</button>

					<?php $this->endWidget(); ?>

				</div></div><!-- form -->

				<script> 
					function validAngka(data)
					{
						if(!/^[0-9.]+$/.test(data.value))
						{
							data.value = data.value.substring(0,data.value.length-1000);
						}
					}

					function to_rupiah(angka){
						var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
						var rev2    = '';
						for(var i = 0; i < rev.length; i++){
							rev2  += rev[i];
							if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
								rev2 += '.';
							}
						}
						return 'Rp. ' + rev2.split('').reverse().join('');
					}	

					function subtotal(data) {
						validAngka(data);
						var a = $("#Detailpembelian_jumlah1").val();
						var b = $("#Detailpembelian_harga1").val();
						c = a * b; 
						$("#Detailpembelian_subtotal1").val(to_rupiah(c));
					}

//Autocomplete
jQuery(function($) {
	jQuery('#search').autocomplete({'showAnim':'fold','select':function(event, ui) {
		var id = $('#Detailpembelian_barang_id1').val(ui.item.id_barang);
		var jumlah = $('#Detailpembelian_jumlah1').val(1);
		var harga = $('#Detailpembelian_harga1').val(ui.item.harga);
		// var stock = $('#Detailpembelian_stock1').val(ui.item.stock + ' ' + ui.item.satuan);
		var stock = $('#Detailpembelian_stock1').val(ui.item.stock);
		return false;
	},'source':'<?php echo $url; ?>pembelian/juiautocomplete'});
});	

//Subtotal
$(function(){ // this will be called when the DOM is ready
	$('#Detailpembelian_jumlah1').change(function() {
		var a = $('#Detailpembelian_jumlah1').val();
		var b = $('#Detailpembelian_harga1').val();
		var c = $('#Detailpembelian_stock1').val();
		d = a * b; 
		$('#Detailpembelian_subtotal').val(to_rupiah(d));
		// $('#add').click();
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
	$('#dynamic_field').append('<tr id="row'+i+'"><td><input class="form-control ui-autocomplete-input" placeholder="Cari Barang" id="search'+i+'" name="search" autocomplete="off" type="text"></td><td style="display:none;"><input type="text" id="Detailpembelian_barang_id'+i+'" name="Detailpembelian[barang_id][]" placeholder="Kode Barang" class="form-control" /></td><td width="90px"><input type="text" id="Detailpembelian_jumlah'+i+'" onkeyup="validAngka(this);" name="Detailpembelian[jumlah][]" placeholder="Qty" class="form-control" /></td><td width="120px" title="Jumlah Stok"><input type="text" id="Detailpembelian_stock'+i+'" name="Detailpembelian[stock][]" placeholder="Stock" class="form-control" disabled="true" /></td><td><input type="text" id="Detailpembelian_harga'+i+'" name="Detailpembelian[harga][]" placeholder="Harga" class="form-control" disabled="true" /></td><td><input type="text" id="Detailpembelian_subtotal'+i+'" name="Detailpembelian[subtotal][]" placeholder="Subtotal" class="form-control" disabled="true" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-outline pull-right btn-rounded btn_remove">X</button></td></tr>');  

	//Fokus ke Kode Barang Selanjutnya
	$('#search'+i+'').focus();

	//Autocomplete
	jQuery(function($) {
		jQuery('#search'+i+'').autocomplete({'showAnim':'fold','select':function(event, ui) {
			var id = $('#Detailpembelian_barang_id'+i+'').val(ui.item.id_barang);
			var harga = $('#Detailpembelian_harga'+i+'').val(ui.item.harga);
			// var stock = $('#Detailpembelian_stock'+i+'').val(ui.item.stock + ' ' + ui.item.satuan);
			var stock = $('#Detailpembelian_stock'+i+'').val(ui.item.stock);
			var jumlah = $('#Detailpembelian_jumlah'+i+'').val(1);
			var subtotal = $('#Detailpembelian_subtotal'+i+'').val(to_rupiah(1*ui.item.harga));
			return false;
		},'source':'<?php echo $url; ?>pembelian/juiautocomplete'});
	});

	//Subtotal
	$(function(){ // this will be called when the DOM is ready
		$('#Detailpembelian_jumlah'+i+'').change(function() {
			var a = $('#Detailpembelian_jumlah'+i+'').val();
			var b = $('#Detailpembelian_harga'+i+'').val();
			var c = $('#Detailpembelian_stock'+i+'').val();
			d = a * b; 
			$('#Detailpembelian_subtotal'+i+'').val(to_rupiah(d));
			// $('#add').click();
		});
	});	

	//Fokus Serach
	$('#search'+i+'').focus();

});  
	// END

	//Remove Item
	$(document).on('click', '.btn_remove', function(){  
		var button_id = $(this).attr("id");   
		$('#row'+button_id+'').remove(); 
	});  


});  						
</script> 