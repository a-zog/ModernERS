<?php 
require_once ("../dbcon.php");
require_once ("../lib.php");

$lib = new ERS;

if (isset($_POST["updateVisitor"]))  { //processing the updated visitor's form

$lib->updateVisitor($_POST);


}


?>
