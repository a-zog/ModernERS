

<div class="container">
    
    <?php
    $title="Refresh database";

    include("page/em_menu.php");
    ?>


    <div class="panel panel-default">


        <div class="panel-heading">
            <i class="zicon-arrows-cw-1"></i> Refresh visitor's list
        </div>

        <div class="panel-body">

            <?php
            $lib= new ERS;

            ?>



            <?php
            if (isset($_POST["sync"])){
                if (isset($_POST["visitor"])){

                    $visitors=$_POST["visitor"];
                    $allVisitors= $lib->getSpreadsheetData($lib->getGSID());

                    $lib->moveToBD($allVisitors,$visitors);

                }else{

                    ?>
                    <div class="alert alert-warning">
                        <p>No new subscribed user selected. Retry again.</p>

                    </div>
                    <?php
                }
            } else{
                ?>
                This will only connect recently registred visitors to your database (<?php if ($lib->getLastRefresh() == "NEVER") { echo "It's your first refresh !";} else{ echo 'those registred after <strong> <span class="label label-primary">'. date('d/m/Y - h:i a',$lib->getLastRefresh()).'</span></strong>'; } ?> )                 
                <?php
                try {
                    $lib->updateVisitorList();
                } catch (Exception $e) {
                    echo "<strong>Critical Error: ".$e."</strong>";
                }
            }

            ?>





            


        </div>
    </div>
    
</div>

