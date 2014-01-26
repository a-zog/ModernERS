
<div class="container">
    <div class="col-md-6">

        <div class="panel panel-default">


            <div class="panel-heading simple">
                <span class="zicon-exchange"></span> Connect to an external form
            </div>

            <div class="panel-body">
                <?php 
                $lib = new ERS;
                ?>

  <div class="alert alert-info">
                 <p>Because this app is exclusively made to run offline, you can refresh the registred visitors manually using <strong>"Manage visitors > Refresh visitor's list"</strong></p>

             </div>
<div class="panel-group" id="accordion">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
         <i class="zicon-google"></i> Google Spreadsheet
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        




             <h4>1- Create a new Google Spreadsheet</h4>
             <p>Go to <a href="https://drive.google.com/" target="_blank">Google Drive</a> and "Create > Google Form".</p>
             <h4>2 - Be sure to create exactly those same fields.</h4>


             <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-5" for="inputGSID">Google Spreadsheet ID</label>
                    <div class="controls col-sm-7">
                        <input type="text" class="form-control" name="fn" id="inputGSID" placeholder="Google Spreadsheet ID" value="<?php echo $lib->getGSID(); ?>" required>
                    </div>
                </div>








                <div class="form-group">
                    <div class="controls text-center">

                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                        <button type="submit" name="submit" class="btn btn-info">Test</button>
                    </div>
                </div>
            </form>


        
      </div>
    </div>
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        <i class="zicon-eventbrite"></i> EventBrite
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        
      <h4>1- Create a new event on EventBrite</h4>
             <p>Go to <a href="http://www.eventbrite.com/" target="_blank">EventBrite</a> and "Create > Google Form".</p>
             <h4>2 - Retreive the event ID and paste it here.</h4>


             <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-5" for="inputGSID">EventBrite - Event ID</label>
                    <div class="controls col-sm-7">
                        <input type="text" class="form-control" name="fn" id="inputEBID" placeholder="EventBrite event ID" required>
                    </div>
                </div>








                <div class="form-group">
                    <div class="controls text-center">

                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                        <button type="submit" name="submit" class="btn btn-info">Test</button>
                    </div>
                </div>
            </form>
        
      </div>
    </div>
  </div>
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <i class="zicon-location-6"></i> Podio
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
       
    <h4>1- Create a new app on Podio</h4>
             <p>Go to <a href="http://www.podio.com/" target="_blank">Podio</a> and "Create > New app".</p>
             <h4>2 - Retreive the event ID and paste it here.</h4>

<?php
/*
generated access token need - investigate

*/
?>
             <form class="form-horizontal" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-5" for="inputGSID">Podio - Form ID</label>
                    <div class="controls col-sm-7">
                        <input type="text" class="form-control" name="fn" id="inputPOID" placeholder="Podio form ID" required>
                    </div>
                </div>








                <div class="form-group">
                    <div class="controls text-center">

                        <button type="submit" name="submit" class="btn btn-success">Save</button>
                        <button type="submit" name="submit" class="btn btn-info">Test</button>
                    </div>
                </div>
            </form>

      </div>
    </div>
  </div>
</div>
              



        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="panel panel-default">


        <div class="panel-heading simple">   
           <span class="zicon-cog"></span> Settings
        </div>


        <div class="panel-body">



            <form class="form-horizontal" method="POST">

                <p>Set the timezone (must be the same as configured in the Google Spreadsheet)</p>

                <div class="form-group">
                    <label class="control-label col-sm-4" for="timezone">Timezone
                      </label>
                        <div class="controls col-sm-8">

                          <select name="timezone" class="form-control">
                          <?php $lib->getTimeZones(); ?>
                          </select>
                      </div>
                  </div>

                      

                  <p>Display the form fields in the "Express Management" feature (affects this feature only). It will allow you to fill this form faster.</p>
                  <div class="form-group ">
                      <div class="controls col-md-offset-1 col-sm-10">
                        <label class="checkbox">
                          <input type="checkbox" name="surname" checked> Surname
                      </label>
                  </div>


                  <div class="controls col-md-offset-1 col-sm-10">
                    <label class="checkbox">
                      <input type="checkbox" name="firstname" checked> First Name
                  </label>
              </div>

              <div class="controls col-md-offset-1 col-sm-10">
                <label class="checkbox">
                  <input type="checkbox" name="age" checked> Age


              </label>
          </div>

          <div class="controls col-md-offset-1 col-sm-10">
            <label class="checkbox">

              <input type="checkbox" name="gender" checked> Gender

          </label>
      </div>

      <div class="controls col-md-offset-1 col-sm-10">
        <label class="checkbox">
          <input type="checkbox" name="address" checked> Address


      </label>
  </div>

  <div class="controls col-md-offset-1 col-sm-10">
    <label class="checkbox">

      <input type="checkbox" name="email" checked> Email

  </label>
</div>

<div class="controls col-md-offset-1 col-sm-10">
    <label class="checkbox">

      <input type="checkbox" name="c_number" checked> Contact Number

  </label>
</div>

</div>

<div class="form-group">
    <div class="controls text-center">

        <button type="submit" name="submit" class="btn btn-success btn-lg">Save</button>
    </div>
</div>
</form>




</div>


</div>
</div>

</div>
</div>
