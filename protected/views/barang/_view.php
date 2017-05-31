<?php
/* @var $this BarangController */
/* @var $data Barang */
?>

<div class="col-xs-6">
	<!-- Default box -->
	<div class="box box-solid">
		<div class="box-header">
			<h3 class="box-title">

				<?php echo CHtml::link(CHtml::encode($data->kode . " - " .$data->nama), array('view', 'id'=>$data->id_barang)); ?>
				<br />

				
			</div>
			<div class="box-body">

				<?php $this->widget('zii.widgets.CDetailView', array(
					'data'=>$data,
					'htmlOptions'=>array("class"=>"table"),
					'attributes'=>array(
						'deskripsi',
						array('name'=>'satuan','value'=>Barang::model()->satuan($data->satuan)),
						array('name'=>'kategori_id','value'=>$data->Kategori->nama),
						array('name'=>'supplier_id','value'=>$data->Supplier->nama),
						),
						)); ?>


					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
