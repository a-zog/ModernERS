

<div class="container">

  <?php
  $title="Statistics";

  include("admin_menu.php");
  $lib= new ERS;

  ?>

  <div class="col-md-9">
   <div class="panel panel-default">


    <div class="panel-heading">
      <i class="zicon-target"></i> Objectives / Total
    </div>
    <div class="panel-body">
      <?php
      $total= $lib->getStat("total");
      $objective=$lib->getObjective();
      $percent=$lib->getPercent( $total , $objective );
      ?>
      <h1><?php echo $total; ?> Registration <small>Targeting  <?php echo $objective ; ?>  Registrations</small></h1>
      <div class="progress progress-lg">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $percent ;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent ;?>%;">
          <span class="sr-only"><?php echo $percent ;?>% Complete</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-3">
 <div class="panel panel-default">

  <div class="panel-heading">
    <i class="zicon-target"></i> Set/Reset your Objective
  </div>
  <div class="panel-body">
    <p>You are now targeting <u> <?php echo $lib->getObjective(); ?> </u> registrations.</p>
    <a class="btn btn-primary btn-objective-edit">Edit objectives</a>
  </div>
</div>




</div>
</div>
<div class="container">

  <div class="col-md-4">
    <div class="panel panel-default">


      <div class="panel-heading">
        <i class="zicon-chart-line " ></i> Subscriptions
      </div>

      <div class="panel-body">
        <h3>Evolution</h3>
        <div id="subscription-line" style="height: 150px;"></div>

        <h3>Cumulative chart</h3>
        <div id="subscription-cumul-line"  style="height: 150px;"></div>


      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">


      <div class="panel-heading">
        <i class="zicon-chart-bar"></i> Age
      </div>

      <div class="panel-body">
        <h3>Age repartition</h3>

        <div id="registration-ages-interval-line" style="height: 150px;"></div>
        <h3>Age chart</h3>

        <div id="registration-ages-line" style="height: 150px;"></div>



      </div>
    </div>
  </div>
  <div class="col-md-4">

    <div class="panel panel-default">


      <div class="panel-heading">
        <i class="zicon-male"></i> Men vs. <i class="zicon-female"></i> Women
      </div>

      <div class="panel-body">
        <div id="gender-donut" style="height: 415px;"></div>

      </div>
    </div>
  </div>

</div>

<script type="text/javascript">
  Morris.Donut({
    colors: [
    '#0077b1',
    '#E92324',
    ],
    element: 'gender-donut',
    data: [
    {label: "Men", value: <?php echo $lib->getStat("men"); ?>},
    {label: "Women", value: <?php echo $lib->getStat("women"); ?>}
    ],
  });

  var registration = <?php echo $lib->getStat("registration"); ?> ;

  Morris.Line({
    element: 'subscription-line',

    data: registration,
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Registration']
  });

  var registration_cumul = <?php echo $lib->getStat("registration_cumul"); ?> ;
  Morris.Bar({
    element: 'subscription-cumul-line',
    data: registration_cumul,
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Registration']
  }); 

  var registration_ages = <?php echo $lib->getStat("registration_ages"); ?> ;
  Morris.Bar({
    element: 'registration-ages-line',
    barColors: [ '#01a717' ],
    data: registration_ages,
    xkey: 'y',
    ykeys: ['a'],
    labels: ['Registration']
  });

  var registration_ages_interval = <?php echo $lib->getStat("registration_ages_interval"); ?> ;

  Morris.Bar({
    element: 'registration-ages-interval-line',
    barColors: [ '#01a717' ],
    data:  registration_ages_interval,
    xkey: 'y',
    ykeys: ['a', "b", "c", "d"],
    labels: ['Children (0-19)', 'Youth(20-35)', 'mature(36-59)', 'Senior (60-100)']
  });
</script>


<script type="text/javascript">
  $(document).ready( function() {

    $('.btn-objective-edit').click( function() {


      $.ajax({
        type: "GET",
        url: "page/modal_ajax.php",
        data: ({load:"objective_edit"}),
        cache: false,
        success: function(html){
          $("#myModal").html(html).modal('show'); 
        } 
      }); 


      return false;
    });  



  });
</script>