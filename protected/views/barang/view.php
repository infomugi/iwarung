<?php
/* @var $this BarangController */
/* @var $model Barang */

$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	$model->id_barang,
	);

$this->pageTitle='Detail Barang';
?>


<section class="col-xs-12">

	<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
		array('create'),
		array('class' => 'btn btn-success btn-rounded','title'=>'Tambah Barang'));
		?>
		<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Daftar</span>',
			array('index'),
			array('class' => 'btn btn-success btn-rounded', 'title'=>'Daftar Barang'));
			?>
			<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
				array('admin'),
				array('class' => 'btn btn-success btn-rounded','title'=>'Kelola Barang'));
				?>
				<?php echo CHtml::link('<i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span>', 
					array('update', 'id'=>$model->id_barang,
						), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Barang'));
						?>
<!-- 						<?php echo CHtml::link('<i class="fa fa-remove"></i> <span class="hidden-xs">Hapus</span>', 
							array('delete', 'id'=>$model->id_barang,
								),  array('class' => 'btn btn-warning btn-rounded', 'title'=>'Hapus Barang'));
								?> -->

								<HR>

									<?php $this->widget('zii.widgets.CDetailView', array(
										'data'=>$model,
										'htmlOptions'=>array("class"=>"table"),
										'attributes'=>array(
											'kode',
											'nama',
											'deskripsi',
											'harga_beli',
											'harga',
											array('name'=>'satuan','value'=>Barang::model()->satuan($model->satuan)),
											array('name'=>'kategori_id','value'=>$model->Kategori->nama),
											array('name'=>'supplier_id','value'=>$model->Supplier->nama),
											'stock',
											'minimal_stock',
											array('name'=>'status','value'=>Barang::model()->status($model->status)),
											),
											)); ?>

										</section>

										<STYLE>
											th{width:150px;}
										</STYLE>

