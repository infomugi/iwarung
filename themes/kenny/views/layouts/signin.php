<?php
$baseUrl = Yii::app()->theme->baseUrl; 
$url = Yii::app()->baseUrl."/"; 
$cs = Yii::app()->getClientScript();
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="theme-color" content="#00a185" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title><?php echo $this->pageTitle; ?> - <?php echo YII::app()->name; ?></title>
    <link rel="shortcut icon" href="<?php echo $url."/image/shop/".Shop::model()->favicon(); ?>">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

</head>
<body>

    <?php echo $content; ?>

</body>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/bootstrap-validator/dist/validator.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/jquery.slimscroll.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/dropdown-bootstrap-extended.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/dist/js/init.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendors/bower_components/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $(function(){ 
        $('#username').change(function() {
            var name = $('#username').val();
            notifInfo('Selamat Datang','Halo '+name+', Silahkan Masukan Password');
        }); 

        $('#password').change(function() {
            notifInfo('Selangkah Lagi','Klik Login untuk masuk ke Aplikasi');
        });                       

    });

    function notifInfo(data,pesan){
        $.toast({
            heading: data,
            text: pesan,
            position: 'top-center',
            icon: 'success',
            hideAfter: 5500, 
            stack: 5
        }); 
    }

</script>
</body>
</html>