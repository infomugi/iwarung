<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->nama,
	);

$this->pageTitle='Detail Supplier';
?>


<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded','title'=>'Tambah Supplier'));
	?>
	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Daftar</span>',
		array('index'),
		array('class' => 'btn btn-success btn-rounded', 'title'=>'Daftar Supplier'));
		?>
		<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
			array('admin'),
			array('class' => 'btn btn-success btn-rounded','title'=>'Kelola Supplier'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span>', 
				array('update', 'id'=>$model->id,
					), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Supplier'));
					?>
		<!-- 			<?php echo CHtml::link('<i class="fa fa-remove"></i> <span class="hidden-xs">Hapus</span>', 
						array('delete', 'id'=>$model->id,
							),  array('class' => 'btn btn-warning btn-rounded', 'title'=>'Hapus Supplier'));
							?> -->

							<HR>

								<h4>Kontak <?php echo $model->nama; ?></h4>
								<br>
								<?php $this->widget('zii.widgets.CDetailView', array(
									'data'=>$model,
									'htmlOptions'=>array("class"=>"table"),
									'attributes'=>array(
										'nama',
										'alamat',
										'telepon',
										'email',
										),
										)); ?>

										<h5>Daftar Supplier yang Berasal dari <?php echo $model->nama; ?></h5>
										<?php $this->widget('zii.widgets.grid.CGridView', array(
											'id'=>'barang-grid',
											'dataProvider'=>$dataProvider,
											'itemsCssClass' => 'table table-striped dataTable table-hover',
											'columns'=>array(

												array(
													'header'=>'No',
													'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
													'htmlOptions'=>array('width'=>'10px', 
														'style' => 'text-align: center;')),

												'nama',
												'deskripsi',
												'harga_beli',
												'harga',
												'stock',

												),
												)); ?>


										<STYLE>
											th{width:150px;}
										</STYLE>

