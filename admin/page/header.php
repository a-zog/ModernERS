<?php 
session_start();
include('../config/dbcon.php');
require_once ("../lib.php");

$lib= new ERS;
$lib->setXMLConfig("../config/config.xml");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>ADMIN - <?php if ($lib->getEventName() != false) {echo $lib->getEventName()."'s";}else{ echo "Modern";}  ?> Event Registration System V2.0 - By AZOG</title>



  <link href="../assets/css/zogstrap.min.css" rel="stylesheet" type="text/css" media="screen">

  <link href="../assets/css/zicon.css" rel="stylesheet" type="text/css" media="screen">
  <link href="../assets/css/zicon-ie7.css" rel="stylesheet" type="text/css" media="screen">
  <link href="../assets/css/morris.css" rel="stylesheet" type="text/css" media="screen">

  <link href="../assets/css/datatables.bootstrap.css" rel="stylesheet" type="text/css" media="screen">
  <link href="../assets/css/adds.css" rel="stylesheet" type="text/css" media="screen">

  <link rel="shortcut icon" href="<?php if ($lib->getFavIcon() ) {echo "../assets/".$lib->getFavIcon();}else{ echo "../assets/img/raimbox.gif";}  ?>">
  <script src="../assets/js/jquery-latest.min.js" type="text/javascript"></script>

  <script src="../assets/js/zogstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/raphael-2.1.0.min.js" type="text/javascript"></script> 
  <script src="../assets/js/morris.min.js" type="text/javascript"></script> 

  <script type="text/javascript" charset="utf-8" language="javascript" src="../assets/js/jquery.dataTables.js"></script>
  <script type="text/javascript" charset="utf-8" language="javascript" src="../assets/js/dataTables.bootstrap.js"></script>
    <script src="../assets/js/init.js" type="text/javascript"></script>
    <script src="../assets/js/admin_init.js" type="text/javascript"></script>



</head>


<body>

  <div class="container">
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

        <li><a href="../index.php"><i class="zicon-left-open-big"></i> Back to Home</a></li>
        <li class="active"><a href="home.php"><i class="zicon-key-2"></i> Admin</a></li>
        <li><a href="home.php?p=settings" ><i class="zicon-cog"></i> Settings</a></li>



      </ul>
      <ul class="nav navbar-nav pull-right">
<?php if ( isset($_SESSION["id"]) ){ ?>
        <li><a href="index.php?p=logout" id="logoutBtn"><span class="label label-info"><i class="zicon-logout-3"></i> Logout</a></span></li>
        <?php } ?>
        <li><a href="home.php?p=about"><i class="zicon-info-circled-alt"></i> About</a></li>
      </ul>

    </div>
  </nav>


  <p class="text-center">

    <img src="<?php if ($lib->getEventLogo() ) {echo "../".$lib->getEventLogo();}else{ echo "../assets/img/modern_ers_logo.png";}  ?>"/>
  </p>

