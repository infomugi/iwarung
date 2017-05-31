<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Profile'=>array('index'),
	$model->namaLengkap,
	);

$this->pageTitle='Detail User - '.$model->namaLengkap;
?>


<?php if(YII::app()->user->record->level==1){ ?>

	<?php echo CHtml::link('<i class="fa fa-plus-square"></i> <span class="hidden-xs">Tambah</span>',
		array('create'),
		array('class' => 'btn btn-success btn-rounded','title'=>'Tambah Petugas'));
	?>
	<?php echo CHtml::link('<i class="fa fa-list-alt"></i> <span class="hidden-xs">Daftar</span>',
		array('index'),
		array('class' => 'btn btn-success btn-rounded', 'title'=>'Daftar Petugas'));
	?>
	<?php echo CHtml::link('<i class="fa fa-server"></i> <span class="hidden-xs">Kelola</span>',
		array('admin'),
		array('class' => 'btn btn-success btn-rounded','title'=>'Kelola Petugas'));
	?>
	<?php echo CHtml::link('<i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span>', 
		array('update', 'id'=>$model->idUser,
			), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Petugas'));
	?>

	<?php echo CHtml::link('<i class="fa fa-lock"></i> <span class="hidden-xs">Password</span>', 
		array('editpassword', 'id'=>$model->idUser,
			), array('class' => 'btn btn-info btn-rounded', 'title'=>'Edit Password Petugas'));
	?>

	<?php echo CHtml::link('<i class="fa fa-users"></i> <span class="hidden-xs">Admin</span>', 
		array('setadmin', 'id'=>$model->idUser,
			),  array('class' => 'btn btn-primary btn-rounded', 'title'=>'Jadikan Administrator'));
	?>

	<?php echo CHtml::link('<i class="fa fa-user"></i> <span class="hidden-xs">Staff</span>', 
		array('setowner', 'id'=>$model->idUser,
			),  array('class' => 'btn btn-primary btn-rounded', 'title'=>'Jadikan Staff'));
	?>			

	<?php }else{ ?>

		<?php echo CHtml::link('Edit Profile', 
			array('update', 'id'=>$model->idUser,
				), array('class' => 'btn btn-success btn-rounded', 'title'=>'Edit Profile'));
		?>

		<?php echo CHtml::link('Edit Password', 
			array('editpassword', 'id'=>$model->idUser,
				), array('class' => 'btn btn-success btn-rounded', 'title'=>'Edit Password'));
		?>

		<?php } ?>


		<HR>

			<h4><i class="fa fa-lock"></i> Hak Akses</h4>
			<?php 
			if($model->level==1){
				$alert = "success";
			}
			else if($model->level==2){
				$alert = "info";
			}
			else if($model->level==3){
				$alert = "warning";
			}
			else if($model->level==4){
				$alert = "danger";
			}
			?>
			<div class="alert alert-<?php echo $alert; ?>">Hak Akses <?php echo User::model()->level($model->level); ?></div>
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


			<STYLE>
				th{width:150px;}
			</STYLE>

