<?php 
include('header.php');
include('session.php');
?>





<div class="panel panel-default">


    <div class="panel-heading simple">
        <span  class="zicon-key-2"></span> Admin utilities
    </div>

    <div class="panel-body">


        <?php 
        if (isset($_GET["p"])){
            $page=$_GET["p"];
            switch ($page) {
                case 'visitors':
                include('visitors.php');
                break;
                
                case 'users':
                include('users.php');

                break;
                default:
                echo "Hello Admin";
                break;
            }
        }
        ?>
        





    </div>
</div>
<?php 
include('modal.php');
?>	
</div>
<?php include("../page/footer.php"); ?>

</body>
</html>