 <div class="container">
   <?php
   $title="ERS Users";

   include("admin_menu.php");
   $lib= new ERS;

   ?>


   <div class="panel panel-default">
       
    <div class="panel-body">

        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
             <?php
             $query=mysql_query("select * from user")or die(mysql_error());
             while($row=mysql_fetch_array($query)){
                 $id=$row['user'];
                 ?>
                 
                 <tr class="del<?php echo $id ?>">
                  
                     <td><?php echo $row['username']; ?></td>
                     <td><?php echo $row['password']; ?></td>
                     <td><?php echo $row['firstname']; ?></td>
                     <td><?php echo $row['lastname']; ?></td>
                     <td width="120">
                         <a href="#" data-id="<?php echo $id;?>" id="u<?php echo $id;?>" class="btn btn-primary edit_member"><i class="zicon-edit-1"></i></a>
                         <a href="#" data-id="<?php echo $id;?>" id="u<?php echo $id;?>" class="btn btn-danger delete_member"><i class="zicon-trash"></i></a>
                     </td>


                 </tr>
                 <?php } ?>
                 
                 
                 
                 
                 
             </tbody>
         </table>
     </div>
 </div>
</div>

<script type="text/javascript">
    $(document).ready( function() {

       $('.delete_user').click( function() {

        var id = $(this).data("id");

        $.ajax({
          type: "GET",
          url: "page/modal_ajax.php",
          data: ({load:"delete_user", id: id}),
          cache: false,
          success: function(html){
            $("#myModal").html(html).modal('show'); 
          } 
        }); 


        return false;
      });  
       

			
    });
</script>


