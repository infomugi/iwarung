<?php
$this->pageTitle=Yii::app()->name . ' - Monitoring Event';
?>


<?php if(YII::app()->user->record->level==1): ?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default panel-stats">
            <div class="panel-heading">
                <h3 class="panel-title">Statistik</h3>
            </div>
            <div class="panel-body no-padding">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel-data">
                            160
                            <span>Event</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel-data">
                            70
                            <span>Proposal</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel-data">
                            98
                            <span>Member</span>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel-data">
                            30
                            <span>Disetujui</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel-data color-danger">
                            30
                            <span class="color-danger">Ditolak</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel-data color-danger">
                            30
                            <span class="color-danger">Pending</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer clearfix">
                <span class="pull-left">
                    Latest Update: <?php echo date('d M Y'); ?>
                </span>

                <div class="dropup pull-right">
                    <button type="button" class="btn btn-reset dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="index.html#">Edit</a></li>
                        <li><a href="index.html#">Delete</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default panel-color panel-color-alizarin">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Proposal
                </h4>
            </div>
            <div class="panel-body panel-hero text-center">
                <h3 class="panel-hero-title"><i class="fa fa-file"></i> <span class="count">15</span></h3>
                <p> proposal yang belum diverifikasi</p>
            </div>
            <ul class="list-group bg-white minified-task-list">
                <li class="list-group-item">
                    <div class="clearfix">
                        <div class="task-item">
                            <h5 class="task-title"><a href="index.html#">Promosi Acara Seminar LPKIA</a></h5>
                            <span class="task-date">29th October 2015</span>
                        </div>
                        <div class="pull-right">
                            <span class="label label-danger">Penting</span>
                        </div>
                    </div>
                </li>
                <div class="panel-footer clearfix text-center">
                    <a href="index.html#">Daftar Proposal</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default panel-color panel-color-belize panel-stats panel-stats-icon">
                <div class="panel-heading panel-icon-title clearfix">
                    <span class="pull-left">
                        <i class="fa fa-facebook"></i>
                    </span>
                    <h3 class="panel-title">Shared in Facebook</h3>
                </div>
                <div class="panel-body no-padding">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel-data">
                                <i class="fa fa-file-text"></i> 180
                                <span>Posts</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="panel-data">
                                <i class="fa fa-comments"></i> 100
                                <span>Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default panel-color panel-color-peterriver panel-stats panel-stats-icon">
                <div class="panel-heading panel-icon-title clearfix">
                    <span class="pull-left">
                        <i class="fa fa-twitter"></i>
                    </span>
                    <h3 class="panel-title">Shared in Twitter</h3>
                    <div class="dropdown">
                        <a href="index.html#" class="btn btn-reset dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cog"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="index.html#">Edit</a></li>
                            <li><a href="index.html#">Delete</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body no-padding">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel-data">
                                <i class="fa fa-file-text"></i> 110
                                <span>Posts</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="panel-data">
                                <i class="fa fa-comments"></i> 30
                                <span>Retweets</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php endif; ?>

