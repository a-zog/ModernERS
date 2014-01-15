$(document).ready(function(){
console.log("init in progress...");
	

	/*$('input#inputGuessUser').bind('typeahead:selected', function(obj, datum, name) {      
        console.log(obj); // object
        // outputs, e.g., {"type":"typeahead:selected","timeStamp":1371822938628,"jQuery19105037956037711017":true,"isTrigger":true,"namespace":"","namespace_re":null,"target":{"jQuery19105037956037711017":46},"delegateTarget":{"jQuery19105037956037711017":46},"currentTarget":
        console.log(datum); // contains datum value, tokens and custom fields
        // outputs, e.g., {"redirect_url":"http://localhost/test/topic/test_topic","image_url":"http://localhost/test/upload/images/t_FWnYhhqd.jpg","description":"A test description","value":"A test value","tokens":["A","test","value"]}
        // in this case I created custom fields called 'redirect_url', 'image_url', 'description'   

        console.log(name); // contains dataset name
        // outputs, e.g., "my_dataset"

    });
*/
	$('input#inputGuessUser').typeahead([
	{                   
		name: 'users',                    
              //prefetch: "{{path('azog_getuser_list')}}?query=%QUERY",  //list of users the user communicate with
           
              remote: "ajax.php?q1=%QUERY",
                      header: '<h4 class="hdr-name">Name or Surname</h4>',                         
              limit: 20,
            template: [                                                                 
            '<p class="repo-group">{{group}}</p>',                              
            '<p class="repo-name">{{name}}</p>',                                      
            '<p class="repo-email">{{language}}</p>'                         
            ].join(''),
            engine: Hogan                       
        },
        {                   
        	name: 'emails',               
        	remote: "ajax.php?q2=%QUERY",
                      header: '<h4 class="hdr-name">Email address</h4>',                         

        	limit: 20,
             template: [                                                                 
             '<p class="repo-group">{{group}}</p>',                              
             '<p class="repo-name">{{name}}</p>',                                      
             '<p class="repo-email">{{language}}</p>'                         
             ].join(''),
             engine: Hogan                             
         }
         ]);


$( "#viewVisitorBtn" ).click(function() {
  console.log($("#inputGuessUser").val());

/*
  $.get( "ajax.php", { view: $("#inputGuessUser").val() } )
  .done(function( data ) {
    alert( "Data Loaded: " + data );
  });*/

//*
  var uri = "ajax.php?view=" + $("#inputGuessUser").val();
  $.ajax({
  url: uri
}).done(function(data) {
	 console.log(data);
  $( "#viewContainer" ).html( data );
});
//*/


  return false;

});


console.log("init done");
});