<?php
/* @var $this PenjualanController */
/* @var $data Penjualan */
?>

<div class="col-xs-12">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode("Penjualan - #".$data->id), array('view', 'id'=>$data->id)); ?>
				<br />

				
			</div>
			<div class="box-body">
				<div class="col-md-6">
					<?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$data,
						'htmlOptions'=>array("class"=>"table"),
						'attributes'=>array(

							'tanggal_jual',
							array('name'=>'user_id','value'=>$data->User->namaLengkap),
							array('label'=>'Status','value'=>Penjualan::model()->status($data->status)),

							),
							)); ?>

						</div>
						<div class="col-md-6">

							<?php $this->widget('zii.widgets.CDetailView', array(
								'data'=>$data,
								'htmlOptions'=>array("class"=>"table"),
								'attributes'=>array(

									array('name'=>'total_jual','value'=>Yii::app()->numberFormatter->formatCurrency($data->total_jual,"Rp. ")),
									array('label'=>'Pelanggan','value'=>$data->Pelanggan->namaLengkap),
									array('label'=>'Alamat Pelanggan','value'=>$data->Pelanggan->alamat),

									),
									)); ?>



								</div>

								<div class="col-md-12">

									<?php echo CHtml::link('<i class="fa fa-print"></i> Cetak Nota', 
										array('print', 'id'=>$data->id,
											), array('class' => 'btn btn-success pull-right btn-flat', 'title'=>'Cetak Penjualan'));
											?>

										</div>


									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
