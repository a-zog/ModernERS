<div class="container">
 <?php
 $title="Visitors";

 include("admin_menu.php");
 $lib= new ERS;

 ?>


 <div class="panel panel-default">

  <div class="panel-body">
    <div id="test"></div>

    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="dtable">

      <thead>
        <tr>
          <th>Date Register</th>
          <th>Name</th>
          <th>Organisation</th>
          <th>Address</th>
          <th>Age</th>
          <th>Email_Address</th>
          <th>Gender</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       <?php
       $query=mysql_query("select * from reg_member")or die(mysql_error());
       while($row=mysql_fetch_array($query)){
         $id=$row['member_id'];
         ?>

         <tr class="del<?php echo $id ?>">
           <td><?php echo $row['r_date']; ?></td>
           <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
           <td><?php echo $row['organisation']; ?></td>
           <td><?php echo $row['address']; ?></td>
           <td><?php echo $row['age']; ?></td>
           <td><?php echo $row['email']; ?></td>
           <td><span style="font-size:30px;" class="<?php if ($row['gender']=="Male"){echo "zicon-male";}else{echo "zicon-female";} ?>"></span></td>
           <td width="105">
             <a href="#" data-id="<?php echo $id;?>" id="u<?php echo $id;?>" class="btn btn-primary edit_member"><i class="zicon-edit-1"></i></a>
             <a href="#" data-id="<?php echo $id;?>" id="u<?php echo $id;?>" class="btn btn-danger delete_member"><i class="zicon-trash"></i></a>
           </td>
         </tr>
         <?php } ?>





       </tbody>
     </table>
   </div>
 </div>


 <script type="text/javascript">
  $(document).ready( function() {

   $('#dtable').dataTable({
    "fnDrawCallback": function () {

      $('.delete_member').click( function() {

        var id = $(this).data("id");

        $.ajax({
          type: "GET",
          url: "page/modal_ajax.php",
          data: ({load:"delete", id: id}),
          cache: false,
          success: function(html){
            $("#myModal").html(html).modal('show'); 
          } 
        }); 


        return false;
      });        

      $('.edit_member').click( function() {

        var id = $(this).data("id");

        $.ajax({
          type: "GET",
          url: "page/modal_ajax.php",
          data: ({load:"edit", id: id}),
          cache: false,
          success: function(html){
            $("#myModal").html(html).modal('show'); 
                    //$("#test").html(html); 
                  } 
                }); 


        return false;
      });         
console.log("btn init ok");

    }
  });


 });
</script>

