<?php
/* @var $this PembelianController */
/* @var $data Pembelian */
?>

<div class="col-xs-12">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode("Pembelian - #".$data->id), array('view', 'id'=>$data->id)); ?>
				<br />

				
			</div>
			<div class="box-body">

				<div class="col-md-6">
					<?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$data,
						'htmlOptions'=>array("class"=>"table"),
						'attributes'=>array(

							'tanggal_masuk',
							array('name'=>'user_id','value'=>$data->User->namaLengkap),

							),
							)); ?>

						</div>
						<div class="col-md-6">

							<?php $this->widget('zii.widgets.CDetailView', array(
								'data'=>$data,
								'htmlOptions'=>array("class"=>"table"),
								'attributes'=>array(

									array('label'=>'Supplier','value'=>$data->Supplier->nama),
									array('label'=>'Alamat Supplier','value'=>$data->Supplier->alamat),
									array('name'=>'total_beli','value'=>Yii::app()->numberFormatter->formatCurrency($data->total_beli,"Rp. ")),

									),
									)); ?>



								</div>

								<div class="col-md-12">

									<?php echo CHtml::link('<i class="fa fa-print"></i> Cetak', 
										array('print', 'id'=>$data->id,
											), array('class' => 'btn btn-info pull-right btn-flat', 'title'=>'Cetak Pembelian'));
											?>

										</div>


									</div><!-- /.box-body -->
								</div><!-- /.box -->
							</div>
