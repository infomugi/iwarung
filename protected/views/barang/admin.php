<?php
/* @var $this BarangController */
/* @var $model Barang */

$this->breadcrumbs=array(
	'Barangs'=>array('index'),
	'Kelola',
	);

$this->pageTitle='Kelola Barang';
?>

<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded'));
	?>

	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Kelola</span>',
		array('admin'),
		array('class' => 'btn btn-success btn-rounded'));
		?>

		<?php echo CHtml::link('<i class="fa fa-tags"></i> <span class="hidden-xs">Kategori</span>',
			array('kategori/admin'),
			array('class' => 'btn btn-success btn-rounded'));
			?>

			<div class="table-responsive">
				<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'barang-grid',
					'dataProvider'=>$model->search(),
					'filter'=>$model,
					'itemsCssClass' => 'table table-striped dataTable table-hover',
					'columns'=>array(

						array(
							'header'=>'No',
							'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
							'htmlOptions'=>array('width'=>'10px', 
								'style' => 'text-align: center;')),

						'kode',
						'nama',
						array('name'=>'satuan','value'=>'Barang::model()->satuan($data->satuan)'),
						array('name'=>'kategori_id','value'=>'$data->Kategori->nama'),
						'harga',
						'stock',

						array(
							'header'=>'Action',
							'template'=>'{view}{update}',
							'class'=>'CButtonColumn',
							'htmlOptions'=>array('width'=>'100px', 
								'style' => 'text-align: center;'),
							),
						),
						)); ?>
					</div>
