<?php 
global $title;
if ( isset($title) ){
?>
<h3 class="pull-left" style="margin-right:25px;"><i class="zicon-flash-1 pulse"></i> <?php echo $title; ?></h3>
<?php
    }

     ?>
<ul class="nav zs-appbar">

  <li class="highlight-success"><a href="home.php"  data-toggle="tooltip" data-placement="bottom" title="Administration overview"><i class="zicon-eye-1"></i> Overview</a></li>
  <li class="zs-appbar-divider"></li>

        <li><a href="home.php?p=visitors"  data-toggle="tooltip" data-placement="bottom" title="Advanced Visitor's management"><i class="zicon-user"></i> Visitors</a></li>
        <li><a href="home.php?p=users"  data-toggle="tooltip" data-placement="bottom" title="Manage the ERS users"><i class="zicon-users"></i> Users</a></li>
        <li><a href="home.php?p=stats"  data-toggle="tooltip" data-placement="bottom" title="Check statistics"><i class="zicon-chart-line"></i> Statistics</a></li>
        <li><a href="home.php?p=report"  data-toggle="tooltip" data-placement="bottom" title="Generate a registration report"><i class="zicon-chart-pie-2"></i> Reporting</a></li>
        <li><a href="home.php?p=settings" data-toggle="tooltip" data-placement="bottom" title="Manage MERS's settings" ><i class="zicon-cog"></i> Settings</a></li>

</ul>