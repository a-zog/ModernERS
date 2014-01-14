<?php 
include('header.php');
?>



<div class="container">
    <div class="col-md-6 col-md-offset-3">






        <div class="panel panel-default ">


            <div class="panel-heading"><i class="zicon-key-2"></i> Login to continue</div>

            <div class="panel-body">

               <div class="alert alert-success">Please Enter Your Login/Password Below</div>
               <form class="form-horizontal" method="POST">
               <div class="form-group">
                    <label class="control-label col-sm-4" for="inputEmail">Username</label>
                    <div class="controls col-md-8">
                        <input type="text" class=" form-control" id="inputEmail" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="inputPassword">Password</label>
                    <div class="controls col-md-8">
                        <input type="password"class=" form-control"  id="inputPassword" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls text-center">

                        <button type="submit" name="login" class="btn btn-success btn-lg"><i class="zicon-lock-open"></i>&nbsp;Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php
if (isset($_POST['login'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$query=mysql_query("select * from user where username='$username' and password='$password'")or die(mysql_error());
	$count=mysql_num_rows($query);
	$row=mysql_fetch_array($query);


	if ($count > 0){
       session_start();
       session_regenerate_id();
       $_SESSION['id'] = $row['user'];
       header('location:home.php');
       session_write_close();
   }
}
?>

</div>
<?php include("../footer.php"); ?>

</body>
</html>