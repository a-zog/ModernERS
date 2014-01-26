<?php 
session_start();

//call basic libraries and external config files
include('config/dbcon.php');
require_once ("lib.php");

//create a library object so we can call our predefined functions across the page
$lib= new ERS;

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php if ($lib->getEventName() != false) {echo $lib->getEventName()."'s";}else{ echo "Modern";}  ?> Event Registration System V2.0 - By AZOG</title>

    <link href="assets/css/zogstrap.min.css" rel="stylesheet" type="text/css" media="screen">

    <link href="assets/css/datatables.bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <link href="assets/css/adds.css" rel="stylesheet" type="text/css" media="screen">


<link href="assets/css/zicon.css" rel="stylesheet">
<link href="assets/css/zicon-ie7.css" rel="stylesheet">

  <link rel="shortcut icon" href="<?php if ( ($lib->getFavIcon()) ) {echo $lib->getFavIcon();}else{ echo "img/raimbox.gif";}  ?>">


    <script src="assets/js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="assets/js/zogstrap.min.js" type="text/javascript"></script> 
    <script src="assets/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/hogan-2.0.0.js" type="text/javascript"></script>
    <script src="assets/js/typeahead.min.js" type="text/javascript"></script>
    <script src="assets/js/init.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
    
    
</head>





<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#zs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
<div class="navbar-header">
      <a href="./" class="navbar-brand" data-original-title="" title=""><i class="zicon-flash-1 pulse"></i> <?php if ($lib->getEventName() != false) {echo $lib->getEventName()." - ";}else{ echo "Modern ";}  ?> ERS</a>

    </div>
    <div class="collapse navbar-collapse" id="zs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li><a href="index.php"><i class="zicon-home"></i> Home</a></li>
          <li class="dropdown">
            <div class="dropdown-backdrop"></div><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="zicon-user"></i> Manage Visitors <b class="caret"></b></a>
            <ul class="dropdown-menu">

                <li><a href="?p=overview" ><i class="zicon-eye-1"></i> Overview</a></li>
                <li class="divider"></li>
                <li><a href="?p=em"><i class="zicon-address-book"></i> Easy Management</a></li>
                <li><a href="?p=refresh"><i class="zicon-arrows-cw-1"></i> Refresh visitor's list</a></li>
            </ul>
        </li>

        
    </ul>
<ul class="nav navbar-nav pull-right">
            
        <li><a href="admin"><i class="zicon-key-2"></i> Admin</a></li>
        <li><a href="?p=about"><i class="zicon-info-circled-alt"></i> About</a></li>
        </ul>

</div>
</nav>

  <p class="text-center">

    <img src="<?php if ($lib->getEventLogo() ) {echo $lib->getEventLogo();}else{ echo "assets/img/modern_ers_logo.png";}  ?>"/>
  </p>

