<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategoris'=>array('index'),
	$model->idKategori,
	);

$this->pageTitle='Detail Kategori';
?>



<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded','title'=>'Tambah Kategori'));
	?>
	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Daftar</span>',
		array('index'),
		array('class' => 'btn btn-success btn-rounded', 'title'=>'Daftar Kategori'));
		?>
		<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
			array('admin'),
			array('class' => 'btn btn-success btn-rounded','title'=>'Kelola Kategori'));
			?>
			<?php echo CHtml::link('<i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span>', 
				array('update', 'id'=>$model->idKategori,
					), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Kategori'));
					?>
<!-- 					<?php echo CHtml::link('<i class="fa fa-remove"></i> <span class="hidden-xs">Hapus</span>', 
						array('delete', 'id'=>$model->idKategori,
							),  array('class' => 'btn btn-warning btn-rounded', 'title'=>'Hapus Kategori'));
							?> -->
							<HR>

								<?php $this->widget('zii.widgets.CDetailView', array(
									'data'=>$model,
									'htmlOptions'=>array("class"=>"table"),
									'attributes'=>array(
										'nama',
										array(    
											'name'=>'status',
											'type'=>'raw', 
											'value'=>Kategori::model()->status($model->status),
											),
										),
										)); ?>


								<STYLE>
									th{width:150px;}
								</STYLE>

