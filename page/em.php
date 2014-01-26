


<div class="container">
<?php
$title="Easy Management";

include("page/em_menu.php");
?>

    <div class="col-md-6">

        <div class="panel panel-default">


            <div class="panel-heading">
                <span class="zicon-user"></span> Already registred visitor
            </div>

            <div class="panel-body">
                <form class="form-horizontal">
                    <p>Use this form to quickly retrieve registred visitors.</p>
                 
                    <div class="form-group ">
                        <label class="col-sm-3 control-label" for="inputGuessUser">Name Or Email</label>
                        <div class="controls col-md-9">
                            <input type="text" class="form-control" name="inputGuessUser" id="inputGuessUser" placeholder="Name Or Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls text-center">
                            <a href="#" id="viewVisitorBtn" class="btn btn-success"><i class="zicon-eye-1"></i> View</a>
                            <button type="submit" name="submit" class="btn btn-info btn-sm"><i class="zicon-print-6"></i> Print Badge</button>
                        </div>
                    </div>
                    <hr/>
                    <div id="viewContainer">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">


            <div class="panel-heading">   
             <span class="zicon-user-add"></span> Please Fill up all the details Below
         </div>

         <div id="registrationContainer">

         </div>
         <div class="panel-body">

            <form class="form-horizontal" id="newVisitorForm" role="form" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-4" for="firstname">First Name <span class="label label-danger">required</span></label>
                    <div class="controls col-md-8">
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-4" for="lastname">Last Name  <span class="label label-danger">required</span></label>
                    <div class="controls col-md-8">
                        <input type="text" class=" form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="organisation">Organization</label>
                    <div class="controls col-md-8">
                        <input type="text" class=" form-control" name="organisation" id="organisation" placeholder="Organization">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="age">Age</label>
                    <div class="controls col-md-8">
                        <input type="text" class=" form-control" name="age" id="age" placeholder="Age">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="gender">Gender</label>
                    <div class="col-md-8 controls">
                        <select class="form-control" name="gender">
                            <option></option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="address">Address</label>
                    <div class="controls col-md-8">
                        <input type="text" name="address" class=" form-control" id="address" placeholder="Address">
                    </div>
                </div>  


                <div class="form-group">
                    <label class="control-label col-sm-4" for="inputEmail">Email Adress  <span class="label label-danger">required</span></label>
                    <div class="controls col-md-8">
                        <input type="text" name="email" class=" form-control" id="inputEmail" placeholder="Email Address">
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label col-sm-4" for="c_number">Contact Number</label>
                    <div class="controls col-md-8">
                        <input type="text" class=" form-control" name="c_number" id="c_number" placeholder="Contact Number" required>
                    </div>
                </div>

                <div class="form-group">

                    <div class="controls  text-center">
                        <input type="hidden"  name="newVisitor"  value="true">
                        <button type="button" name="newVisitorSubmitted" id="newVisitorSubmitted" class="btn btn-success">Save</button>
                        <button type="button" name="newVisitorSubmittedandPrint" id="newVisitorSubmittedandPrint" class="btn btn-info">Save and Print Badge</button>
                        <button type="reset" name="newVisitorCancel" id="newVisitorSubmittedandPrint"  data-toggle="tooltip" data-placement="bottom" title="Clear the form" class="btn btn-sm btn-danger" ><i class="zicon-cancel"></i></button>
                    </div>
                </form>
            </div>


        </div>
    </div>

</div>
</div>


<script type="text/javascript">



  $(document).ready(function(){



    function submitNewVisitor(printAfter){

       var sentData=$( "#newVisitorForm").serialize();
       console.log(printAfter);
       if (printAfter){
         sentData=sentData + '&printAfter=' + printAfter;
     }


     $.post("page/ajax.php", sentData, function(response) {

        $("#registrationContainer").html(response);
    });



     event.preventDefault();

 }


 $( "#newVisitorSubmitted" ).click(function() {
    submitNewVisitor(false);


    return false;
});

 $( "#newVisitorSubmittedandPrint" ).click(function() {

    submitNewVisitor(true);


    return false;
});



});

</script>

