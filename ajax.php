<?php 
require_once ("dbcon.php");
require_once ("lib.php");

$lib = new ERS;

if (isset($_GET["q1"])){ //name or surname

	$q=$lib->securePostVar($_GET["q1"]);	
	$lib->typeheadQuery($q, "name");
}


if (isset($_GET["q2"])){ //email

	$q=$lib->securePostVar($_GET["q2"]);	
	$lib->typeheadQuery($q);
}


if (isset($_GET["view"])){ //view details about a visitor got by mail

	$email=$lib->securePostVar($_GET["view"]);
	$lib->previewProfile($email);

}


if (isset($_POST["newVisitor"]))  { //processing the new visitor's form



$lib->addNewVisitor($_POST);

if (isset($_POST['printAfter'])){
$lib->PrintVisitorBadge($lib->securePostVar($_POST['printAfter']));
}


}

?>
