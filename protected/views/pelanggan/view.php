<?php
/* @var $this PelangganController */
/* @var $model Pelanggan */

$this->breadcrumbs=array(
	'Pelanggan'=>array('index'),
	$model->namaLengkap,
	);

$this->pageTitle='Detail Pelanggan - '.$model->namaLengkap;
?>


<?php if(YII::app()->user->record->level==1){ ?>

	<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
		array('create'),
		array('class' => 'btn btn-success btn-rounded','title'=>'Tambah Pelanggan'));
	?>
	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Daftar</span>',
		array('index'),
		array('class' => 'btn btn-success btn-rounded', 'title'=>'Daftar Pelanggan'));
	?>
	<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
		array('admin'),
		array('class' => 'btn btn-success btn-rounded','title'=>'Kelola Pelanggan'));
	?>
	<?php echo CHtml::link('<i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span>', 
		array('update', 'id'=>$model->idAnggota,
			), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Pelanggan'));
	?>

	<?php echo CHtml::link('<i class="fa fa-lock"></i> <span class="hidden-xs">Password</span>', 
		array('editpassword', 'id'=>$model->idAnggota,
			), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Password Pelanggan'));
	?>

	<?php 
	// echo CHtml::link('<i class="fa fa-remove"></i> <span class="hidden-xs">Hapus</span>', 
	// 	array('delete', 'id'=>$model->idAnggota,
	// 		),  array('class' => 'btn btn-warning btn-rounded', 'title'=>'Hapus Pelanggan'));
	?>

	<?php }else{ ?>

		<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
			array('admin'),
			array('class' => 'btn btn-success btn-rounded','title'=>'Kelola Pelanggan'));
		?>

		<?php echo CHtml::link('<i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span>', 
			array('update', 'id'=>$model->idAnggota,
				), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Pelanggan'));
		?>

		<?php echo CHtml::link('<i class="fa fa-lock"></i> <span class="hidden-xs">Password</span>', 
			array('editpassword', 'id'=>$model->idAnggota,
				), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Password Pelanggan'));
		?>

		<?php } ?>


		<HR>

			<h4><i class="fa fa-lock"></i> Hak Akses</h4>
			<?php 
			if($model->level==1){
				$alert = "info";
			}
			else if($model->level==2){
				$alert = "success";
			}
			else if($model->level==3){
				$alert = "warning";
			}
			else if($model->level==4){
				$alert = "danger";
			}
			?>
			<div class="alert alert-<?php echo $alert; ?>">
				<i class="fa fa-filter"></i> Level : <?php echo Pelanggan::model()->level($model->level); ?> - 
				<i class="fa fa-calendar"></i> Status : <?php echo Pelanggan::model()->status($model->status); ?>
			</div>

			<h4><i class="fa fa-github-alt"></i> <?php echo $model->namaLengkap; ?></h4>
			<?php $this->widget('zii.widgets.CDetailView', array(
				'data'=>$model,
				'htmlOptions'=>array("class"=>"table"),
				'attributes'=>array(
					'namaLengkap',
					'username',
					array('name'=>'jenisKelamin','value'=>$model->jenisKelamin == 1 ? "L" : "P"),
					'tanggalLahir',
					'alamat',
					'email',
					'telephone',

					),
					)); ?>

<!-- 
					<h4><i class="fa fa-credit-card"></i> Jumlah Saldo</h4>
					<?php $this->widget('zii.widgets.CDetailView', array(
						'data'=>$model,
						'htmlOptions'=>array("class"=>"table"),
						'attributes'=>array(

							array('name'=>'debit','value'=>Yii::app()->numberFormatter->formatCurrency($model->debit,"Rp. ")),
							array('name'=>'kredit','value'=>Yii::app()->numberFormatter->formatCurrency($model->kredit,"Rp. ")),

							),
							)); ?> -->


							<STYLE>
								th{width:150px;}
							</STYLE>

