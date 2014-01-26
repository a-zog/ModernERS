<?php 
include('page/header.php');
include('page/session.php');
?>






<?php

if ( isset($_SESSION["id"]) ){

if (isset($_GET["p"])){
    $page=$_GET["p"];
    switch ($page) {
        case 'visitors':
        include('page/visitors.php');
        break;
        
        case 'users':
        include('page/users.php');
        break;


        
        case 'settings':    
        include('page/settings.php');
        break;

        
        case 'stats':   
        include('page/stats.php');
        break;

        case 'report':   
        include('page/report.php');
        break;

        
        case 'about':   
        include('../page/about.php');
        break;

        default:
        include('page/admin_overview.php');
        break;
    }
}else{
        include('page/admin_overview.php');
    
}
}
else{
       header('location:index.php');

}
?>







<?php 
include('page/modal.php');
?>  
</div>
<?php include("../page/footer.php"); ?>

</body>
</html>