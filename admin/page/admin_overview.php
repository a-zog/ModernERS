<?php ?>
<div class="container">
    <?php
    $title="Overview";

    include("admin_menu.php");
    $lib= new ERS;

    ?>
    <div class="col-md-8">

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="zicon-target"></i> Total
            </div>
    <div class="panel-body">
      <?php
      $total= $lib->getStat("total");
      $objective=$lib->getObjective();
      $percent=$lib->getPercent( $total , $objective );
      ?>
      <h1><?php echo $total; ?> Registration <small>Targeting  <?php echo $objective ; ?>  Registrations</small></h1>
      <div class="progress progress-lg">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $percent ;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent ;?>%;">
          <span class="sr-only"><?php echo $percent ;?>% Complete</span>
        </div>
      </div>
    </div>
        </div>

    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="zicon-arrows-cw"></i> Third-party Synchronization
            </div>
            <div class="panel-body">
                <?php 
                $toSync=count($spreadsheet_data= $lib->getSpreadsheetData($lib->getGSID()));
                if ($toSync > 0){
                    ?><h1 class="text-danger"><?php echo $toSync; ?> <small>visitors</small></h1>
                    <h2>Not synchronized yet</h2>
                    <?php
                }else{
                    ?>

                    <h2>All registrations was synchronized with the database</h2>
                <?php
                } 
                ?>
                </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="zicon-flag-filled"></i> Take actions
        </div>
        <div class="panel-body">

            <div class="col-md-2">
                <a href="home.php" class="btn btn-block btn-success btn-lg"><i class="zicon-eye-1"></i> Overview</a>
            </div>  
            <div class="col-md-2">
                <a href="home.php?p=visitors" class="btn btn-block btn-primary btn-lg"><i class="zicon-user"></i> Visitors</a></a>
            </div>
            <div class="col-md-2">
                <a href="home.php?p=users" class="btn btn-block btn-primary btn-lg"><i class="zicon-users"></i> Users</a></a>
            </div>  
            <div class="col-md-2">
                <a href="home.php?p=stats" class="btn btn-block btn-primary btn-lg"><i class="zicon-chart-line"></i> Statistics</a></a>
            </div>
            <div class="col-md-2">
                <a href="home.php?p=report" class="btn btn-block btn-primary btn-lg"><i class="zicon-chart-pie-2"></i> Reporting</a></a>
            </div>
            <div class="col-md-2">
               <a href="home.php?p=settings" class="btn btn-block btn-primary btn-lg"><i class="zicon-cog"></i> Settings</a>
            </div>
        </div>
    </div>
</div>