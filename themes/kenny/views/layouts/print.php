<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $cs = Yii::app()->getClientScript();
  Yii::app()->clientScript->registerCoreScript('jquery');
  ?>
  <meta charset="utf-8">
  <meta name="theme-color" content="#00a185" />
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <link rel="shortcut icon" href="<?php echo YII::app()->baseUrl."/image/shop/".Shop::model()->favicon(); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/dist/css/bootstrap.min.css">

  <script>
    window.print();
    function cetak(){
      window.print();

    }
          //Membuat Shortcut
          $(document).on('keydown', 'body', function(e){
            var charCode = ( e.which ) ? e.which : event.keyCode;
              if(charCode == 38) //Up
              {
                $('#transaksi').text("- [ L U N A S ] -");
                return false;
              }
               if(charCode == 37) //Left
               {
                 window.location.replace("<?php echo YII::app()->baseUrl; ?>/penjualan/create");
               }
                   if(charCode == 39) //Right
                   {
                    cetak();
                  }
                });
              </script>

            </head>

            <body style="background:#999999">
              <BR>
                <div class="container">
                  <div class="col-xs-12 col-md-1 col-lg-2">
                  </div>
                  <div class="col-xs-12 col-md-10 col-lg-8">
                    <div id="target">
                      <?php echo $content; ?>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-1 col-lg-2">
                  </div>
                </div>

              </body>
              </html>


