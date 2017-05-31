<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	'Kelola',
	);

$this->pageTitle='Kelola Supplier';
?>

<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
	array('create'),
	array('class' => 'btn btn-success btn-rounded'));
	?>

	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Kelola</span>',
		array('admin'),
		array('class' => 'btn btn-success btn-rounded'));
		?>

		<div class="table-responsive">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'supplier-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'itemsCssClass' => 'table table-striped dataTable table-hover',
				'columns'=>array(

					array(
						'header'=>'No',
						'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
						'htmlOptions'=>array('width'=>'10px', 
							'style' => 'text-align: center;')),

						// 'id',
					'nama',
					'alamat',
						// 'kategori_id',
					'telepon',
					'email',
						// 'status',

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

