<?php
/*
//Start session
try {
	
session_start();
} catch (Exception $e) {
	echo $e;
}
*/
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['id'];
?>