<?php

//edit this vars
$host="localhost";
$login="root";
$passwd="";


mysql_select_db('ers',mysql_connect($host,$login,$passwd))or die(mysql_error());
?>