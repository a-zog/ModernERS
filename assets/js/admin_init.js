$(document).ready(function(){



//quick load visitor's information
$( "#logoutBtn" ).click(function() {

   $.ajax({
          type: "GET",
          url: "page/modal_ajax.php",
          data: ({load:"logout"}),
          cache: false,
          success: function(html){
            $("#myModal").html(html).modal('show'); 
                    //$("#test").html(html); 
                  } 
                }); 

  return false;
});
    
});