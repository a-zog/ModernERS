<?php 
require_once ("../config/dbcon.php");
require_once ("../lib.php");

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

if (isset($_POST["updateVisitor"]))  { //processing the updated visitor's form
$lib->updateVisitor($_POST);
}

if (isset($_POST["deleteVisitor"]))  { //processing the delete visitor's form
$lib->deleteVisitor($_POST);
}

if (isset($_POST["editObjective"]))  { //processing the delete visitor's form
$lib->setObjective((int)$lib->securePostVar($_POST["inputObjective"]) );
?>

<div class="modal-body">
	<div class="alert alert-success fade in">
		<p>New objective successfully defined. You are aiming now to have <u><?php echo $lib->getObjective(); ?></u> registrations.</p>

	</div>
</div>
<div class="modal-footer">
	<button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="zicon-cancel"></i>&nbsp;Close</button>

</div>

<?php

}


?>
