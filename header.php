<?php 

include('dbcon.php');
require_once ("lib.php");
$lib= new ERS;

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php if ($lib->getEventName() != false) {echo $lib->getEventName()."'s";}else{ echo "Modern";}  ?> Event Registration System V2.0 - By AZOG</title>

    <link href="css/zogstrap.min.css" rel="stylesheet" type="text/css" media="screen">

    <link href="css/datatables.bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/adds.css" rel="stylesheet" type="text/css" media="screen">


<link href="css/zicon.css" rel="stylesheet">
<link href="css/zicon-ie7.css" rel="stylesheet">

  <link rel="shortcut icon" href="<?php if ( ($lib->getFavIcon()) ) {echo $lib->getFavIcon();}else{ echo "img/raimbox.gif";}  ?>">


    <script src="js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/zogstrap.min.js" type="text/javascript"></script> 
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="js/hogan-2.0.0.js" type="text/javascript"></script>
    <script src="js/typeahead.min.js" type="text/javascript"></script>
    <script src="js/init.js" type="text/javascript"></script>
    
</head>





<body>

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#zs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
<div class="navbar-header">
      <a href="./" class="navbar-brand" data-original-title="" title=""><i class="zicon-flash-1 pulse"></i> <?php if ($lib->getEventName() != false) {echo $lib->getEventName()." - ";}else{ echo "Modern ";}  ?> ERS</a>

    </div>
    <div class="collapse navbar-collapse" id="zs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li><a href="index.php"><i class="zicon-home"></i> Home</a></li>
          <li class="dropdown">
            <div class="dropdown-backdrop"></div><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zicon-user"></i> Manage Visitors <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li><a href="#" ><i class="zicon-eye-1"></i> Overview</a></li>
                <li class="divider"></li>
                <li><a href="em.php"><i class="zicon-address-book"></i> Easy Management</a></li>
                <li><a href="refresh.php"><i class="zicon-arrows-cw-1"></i> Refresh visitor's list</a></li>
                <li><a href="#"><i class="zicon-chart-line"></i> Statistics</a></li>
            </ul>
        </li>

        <li><a href="settings.php"><i class="zicon-cog"></i> Settings</a></li>
        <li><a href="admin"><i class="zicon-key-2"></i> Admin</a></li>
        
    </ul>
<ul class="nav navbar-nav pull-right">
            
        <li><a href="#"><i class="zicon-info-circled-alt"></i> About</a></li>
        </ul>

</div>
</nav>




