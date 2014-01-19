$(document).ready(function(){

//init the Express Management TypeHead
$('input#inputGuessUser').typeahead([
{                   
  name: 'users',                    
//prefetch: "{{path('azog_getuser_list')}}?query=%QUERY",  //list of users the user communicate with

remote: "page/ajax.php?q1=%QUERY",
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
  remote: "page/ajax.php?q2=%QUERY",
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

//quick load visitor's information
$( "#viewVisitorBtn" ).click(function() {
  var uri = "page/ajax.php?view=" + $("#inputGuessUser").val();
  $.ajax({
    url: uri
  }).done(function(data) {
    console.log(data);
    $( "#viewContainer" ).html( data );
  });
  return false;
});



});