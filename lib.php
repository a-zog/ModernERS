<?php

/* ========================================================================
* MERS: Modern Event Registration System
* https://github.com/a-zog
* ========================================================================
* Copyright (c) 2014 Zoghlami Ahmed
* 
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
* ======================================================================== */

/* ========================================================================

Var list:

	$useXML: boolean (Turn XML ON/OFF)
	$xmlConfig: string (contains the XML file to use )

Function list:
	
	(get)Config(): retrieve the content of the XML File and returns a DomDocument value

	(get/set)TagValue($tag): read/write a $tag value
	(get/set)EventName(): read/write the current event Name
	(get/set)EventLogo(): read/write the current event logo
	(get/set)EventFavIcon(): read/write the current event favicon
	
	showLandingPage(): display the MERS landing page


	(get/set)LastRefresh(): read/write the last refreshed entries
	(get)GSID(): retrieve the Google Spreadsheet ID from the database
	(get)GSTimeStamp(): [with a little hack] retrieve the timestamp of Google Spreadsheet date
	(get)GSTimeStamp(): retrieve the timestamp of Google Spreadsheet date
	(get)TimeZones(): a list of timezones to display. We need to synchronize both MERS and Google Spreadsheet's timezone
	to be sure that we retreive only freshly subscribed visitors
	invertDate(): Useful when inverting Google spreadsheet dates (american format)
	moveToBD(): Move an array of users to the database 
	isNewEntry(): Check if the visitor is new and he wasn't included in the database before (to avoid double entries)
	getSpreadsheetData($gsid): Get a list of entries from Google Spreadsheet
	updateVisitorList(): Display the visitor's list retrieved from a Google spreadsheet
	isUniqueVisitor(): Check if the email of the visitor is unique (database constraint)
	PrintVisitorBadge(): Launch the print process
	updateVisitor(): Update (and check) an existing visitor (from the web-based form)
	addNewVisitor(): Add (and check) a new visitor (from the web-based form)
	securePostVar(): A function to secure post/get vars and prevent sql injections (and other threats)
	getVisitorInfo($id): returns an array with information about a visitor
	previewProfile($email): display a short summary about a visitor
	typeheadQuery($q,$type="email"): the server-side processor of the typehead ($q: query, $type: if it's email or name/surname)

	* ======================================================================== */

	?>


	<?php

	class ERS {

		//true to Turn XML on 
		private $useXML=false;

		//change if your renamed the file
		private $xmlConfig="config/config.xml";

		public function getXMLConfig(){
			return $this->xmlConfig;
		}
		public function setXMLConfig($file){
			$this->xmlConfig = $file;
		}
		public function getConfig(){

			$config = new DomDocument;

			if ( (file_exists($this->xmlConfig)) && ($this->useXML) ) {
				$config->load($this->xmlConfig);
				if (!empty($config)){
					return $config;
				}else{
					return false;
					
				}
			} else {
				return false;
			}

			
		}
		public function getTagValue($tag){

			$config=$this->getConfig();
			if ($config != false){

				$eventName=$config->getElementsByTagName($tag)->item(0)->nodeValue;
				if (!empty($eventName)){

					return $eventName;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		public function getEventName(){

			return $this->getTagValue("eventname");
		}
		public function getEventLogo(){

			return $this->getTagValue("logo");
		}
		public function getFavIcon(){

			return $this->getTagValue("favicon");
		}

		public function setEventName($name){

		}

		public function showLandingPage(){
			?>
			<div class="jumbotron">


				<?php

				?><?php if ($this->getEventLogo() != false) {?> <h1>Welcome to <small><img src="<?php echo $this->getEventLogo(); ?>"/></small></h1> <?php }else{ echo "<h1>Welcome !</h1>";} ?>

				
				

				<p> 
					Welcome to the <?php if ($this->getEventName() != false) {echo $this->getEventName()."'s";}else{ echo "Modern";}  ?> Event Registration Management, This service will allow you to quickly manage visitors the day of the event, even in offline mode.</p>
					<p><a href="?p=em" class="btn btn-primary btn-lg" data-original-title="" title="">Easy Management <span class="zicon-right-open-5"></span></a></p>
				</div>

				<?php
			}

			public function setLastRefresh($time){
				mysql_query("UPDATE config SET last_refresh = $time");

				if ($this->getLastRefresh() == $time){
					return true;

				}
				else{
					return false;
				}
			}

			public function getLastRefresh(){
				$final= mysql_fetch_array(mysql_query("SELECT cid, last_refresh FROM config"));
				if ( (!empty($final[1])) && ($final[1] != 0) ){

					return $final[1];
				}
				else{

					return "NEVER";
				}

			}


			public function getGSID(){
				$final= mysql_fetch_array(mysql_query("SELECT cid, gs_id FROM config"));
				if (!empty($final[1])){

					return $final[1];
				}
				else{

					trigger_error("Error, there is no source configured !", E_USER_ERROR);
				}
			}


			public function getGSTimeStamp($gstime){
				$date = new DateTime($this->invertDate($gstime));
				return $date->getTimestamp();
			}

			public function getTimeZones(){

				$tz=array(
					"Europe/Amsterdam",
					"Europe/Andorra",
					"Europe/Athens",
					"Europe/Belfast",
					"Europe/Belgrade",
					"Europe/Berlin",
					"Europe/Bratislava",
					"Europe/Brussels",
					"Europe/Bucharest",
					"Europe/Budapest",
					"Europe/Busingen",
					"Europe/Chisinau",
					"Europe/Copenhagen",
					"Europe/Dublin",
					"Europe/Gibraltar",
			//must add other timezones here !
			//http://www.php.net/manual/fr/timezones.europe.php
			//"Europe/.......",
			//"Europe/.......",
			//"Europe/.......",
					"Europe/Paris"
					);


				foreach ($tz as $value) {

					?>
					<option value="<?php echo $value; ?>" <?php if ($value == "Europe/Paris") { echo "selected"; } ?>><?php echo $value; ?></option>

					<?php
				}

			}
			public function invertDate($tm){
				$tm=str_replace("/", "-", $tm);
				$date = new DateTime($tm);

				return date("Y-m-d H:i:s",$date->getTimestamp());
			}
			public function moveToBD($allVisitors=array(), $selectedVisitors=array()){


				foreach ($selectedVisitors as $k1 => $smail) {
					foreach ($allVisitors as $visitor_row) {
						if ($visitor_row[4] == $smail){
							echo "match!";
							var_dump($visitor_row);
							echo "<hr/>";
							$vals="'".$visitor_row[1]."','".$visitor_row[2]."','".$visitor_row[3]."','".$visitor_row[6]."','".$visitor_row[4]."','".$visitor_row[5]."','".$visitor_row[7]."','".$this->invertDate(str_replace("/", "-", $visitor_row[0]))."','".$visitor_row[8]."'";
							$query="INSERT INTO reg_member(firstname, lastname, organisation, address, email, c_number, gender, date, age) VALUES (".$vals.")";
							echo $query;

							date_default_timezone_set("Europe/Paris");

							$this->setLastRefresh(time('now'));
//echo $this->getLastRefresh();

//if (mysql_query($query)){
							if (true){
								$this->setLastRefresh(time("now"));
								?>
								<div class="alert alert-success">
									<p><?php echo $visitor_row[1]. " " . $visitor_row[2]; ?> is now included in the Event Registration System.</p>
								</div>
								<?php
							}
						}
					}
				}
			}

			public function isNewEntry($entry_time){
				if (($this->getGSTimeStamp($entry_time) >= $this->getLastRefresh()) && ($this->getLastRefresh() != "NEVER") ){
			/*echo "PING!";
						echo "<br/>PING! ".date("Y-m-d H:i:s",$this->getGSTimeStamp($entry_time))." >= ".date("Y-m-d H:i:s",$this->getLastRefresh());
						echo "<hr/>";
						$x = new DateTime(date("Y-m-d H:i:s",$this->getGSTimeStamp($entry_time)));
						$x->getTimezone();
*/

						return true;
					}
					else{
			//echo "NO!";
						return false;
					}

				}
				public function getSpreadsheetData($gsid){

					$spreadsheet_url='https://docs.google.com/spreadsheet/pub?key='.$gsid.'&single=true&output=csv';

					try {


						if(!ini_set('default_socket_timeout',    15)) echo "<!-- unable to change socket timeout -->";
						$i=0;
						if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
							while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
								if ($i==0){
									$i++; continue;
								}

					/*echo "Output ".$this->getGSTimeStamp($data[0])." >= ".$this->getLastRefresh();

					if (($this->getGSTimeStamp($data[0]) >= $this->getLastRefresh()) && ($this->getLastRefresh() != "NEVER") ){
						echo "PING! ".$this->getGSTimeStamp($data[0])." >= ".$this->getLastRefresh();
						echo "<hr/>";
					}

*/


					$spreadsheet_data[]=$data;
				}
			}
			fclose($handle);
		} catch (Exception $e) {
			echo "<strong>Critical Error: ".$e."</strong>";
		}
		//unset($spreadsheet_data[0]);
		//return array_values($spreadsheet_data);
		return $spreadsheet_data;

	}

	public function updateVisitorList(){


		$spreadsheet_data= $this->getSpreadsheetData($this->getGSID());
//var_dump($spreadsheet_data);
/*
    <div class="alert alert-success">
<p>Your visitors database is updated: <strong>80 users added</strong></p>
</div>
*/
?>
<form method="POST" name="syncForm">
	

	<input type="submit" name="sync" class="btn btn-success btn pull-right" value="Synchronize now !" />
	<h2><?php echo count($spreadsheet_data); ?> New user(s) found</h2>
	<?php// var_dump($spreadsheet_data); ?>
	<table class="table">
		<tr>
			<td></td>
			<td>Registration date</td>
			<td>First name</td>
			<td>Last name</td>
			<td>Organisation</td>
			<td>Email</td>
			<td>Contact Number</td>
			<td>Address</td>
			<td>Gender</td>
			<td>Age</td>

		</tr>

		<?php
		foreach ($spreadsheet_data as $row) {
//$this->isNewEntry($row[0]);
			//highligh new entries only
			?>
			<tr class="<?php if ($this->isNewEntry($row[0])){ echo "success"; }?>">
				<td> <input type="checkbox" name="visitor[]" value="<?php echo $row[4]; ?>" checked="true" />	</td>
				<td>
					<?php echo $this->invertDate($row[0]);//registration date ?></td>
					<td><?php echo $row[1];//name ?></td>
					<td><?php echo $row[2];//surname ?></td>
					<td><?php echo $row[3];//org ?></td>
					<td><?php echo $row[4];//email ?></td>
					<td><?php echo $row[5];//c number ?></td>
					<td><?php echo $row[6];//address ?></td>
					<td><?php echo $row[7];//gender ?></td>
					<td><?php echo $row[8];//age ?></td>

				</tr>

				<?php
			}


			?>
		</table>

	</form>
	<?php
}


public function isUniqueVisitor($email){


	$sql=mysql_query("SELECT * FROM reg_member WHERE email='$email'");


	if(mysql_num_rows($sql)>=1){
		return false;
	}else{

		return true;
	}
}


public function PrintVisitorBadge($email){

	echo "launch print command now!";
}

public function updateVisitor($userForm){
	$q="";
	$oldEntry= $this->getVisitorInfo($userForm["uid"]);
	$userForm=array_filter($userForm);
	if ( !( (isset($userForm["firstname"])) && (isset($userForm["lastname"])) && (isset($userForm["email"]))  && (!empty($userForm)) ) ){

		?>
		<div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p>Fill all the required fields before saving </p>

		</div>

		<?php
		return false;			
	}
	if ( ( isset($userForm["email"]) ) && (!empty($userForm["email"]))  && ( $oldEntry["email"]!= $userForm["email"]) ){
			//var_dump($this->isUniqueVisitor($userForm["email"]))
		if ( ( !($this->isUniqueVisitor($userForm["email"])) ) && ( $oldEntry["email"]!= $userForm["email"]) ) {
			?>
			<div class="alert alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>This mail is already used in our database. You can paste it in the "Already registred visitor" field to know more.</p>				
			</div>

			<?php

			return false;
		}

		$email=$this->securePostVar($userForm["email"]);
		$q.= "email = '$email',";
	}

	if ((isset($userForm["firstname"])) && ( !empty($userForm["firstname"]) ) && ( $oldEntry["firstname"]!= $userForm["firstname"]) ){
		
		$firstname=$this->securePostVar($userForm["firstname"]);
		$q.= "firstname= '$firstname',";
	}

	if ((isset($userForm["lastname"])) && (!empty($userForm["lastname"])) && ( $oldEntry["lastname"]!= $userForm["lastname"])){
		$lastname=$this->securePostVar($userForm["lastname"]);
		$q.= "lastname= '$lastname',";
	}

	if ((isset($userForm["age"])) && ($userForm["age"] != "") && ( $oldEntry["age"]!= $userForm["age"]) ){
		$age=$this->securePostVar($userForm["age"]);
		try {
			$age=intval($age);

		} catch (Exception $e) {

		}
		if (is_int($age)){
			$q.= "age= $age,";			
		}else{
			echo $age;
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>Please double-check the age's value before proceeding again.</p>				
			</div>

			<?php
			exit(0);
		}
	}

	if ((isset($userForm["gender"])) && ($userForm["gender"] != "") && ( $oldEntry["gender"]!= $userForm["gender"])){
		$gender=$this->securePostVar($userForm["gender"]);
		$q.= "gender= '$gender',";
	}


	if ((isset($userForm["address"])) && ($userForm["address"] != "") && ( $oldEntry["address"]!= $userForm["address"])){
		$address=$this->securePostVar($userForm["address"]);
		$q.= "address= '$address',";
	}


	if ((isset($userForm["c_number"])) && ($userForm["c_number"] != "") && ( $oldEntry["c_number"]!= $userForm["c_number"])){
		$c_number=$this->securePostVar($userForm["c_number"]);
		$q.= "c_number= '$c_number',";

	}

	if ((isset($userForm["organisation"])) && ($userForm["organisation"] != "") && ( $oldEntry["organisation"]!= $userForm["organisation"])){
		$organisation=$this->securePostVar($userForm["organisation"]);
		$q.= "organisation= '$organisation',";

	}
	$vid=$this->securePostVar($userForm["uid"]);
	if ($q!=""){

		$query="UPDATE reg_member SET ".substr($q, 0, -1)." WHERE member_id=$vid";
		//if (true){
		if (mysql_query($query)){

			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>The user was succesfully registred in the visitor's database.</p>				
			</div>
			<script type="text/javascript">

				$(document).ready( function() {
					$("#myModal").modal('hide');
					

				});
			</script>
			<?php
		}
	}else{
		?>
		<div class="alert alert-warning">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p>No new update occured.</p>				
		</div>

		<?php
	}

	

}
public function addNewVisitor($userForm){
		//var_dump($userForm);
	$col="";
	$vals="";

	$userForm=array_filter($userForm);

//var_dump($userForm);
//echo "<hr/>";

	if ( !( (isset($userForm["firstname"])) && (isset($userForm["lastname"])) && (isset($userForm["email"]))  && (!empty($userForm)) ) ){

		?>
		<div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p>Fill all the required fields before saving </p>

		</div>

		<?php
		return false;			
	}



	//var_dump( !empty($userForm["email"]) );


	if ( ( isset($userForm["email"]) ) and (!empty($userForm["email"])) ){
			//var_dump($this->isUniqueVisitor($userForm["email"]));
		if ( !($this->isUniqueVisitor($userForm["email"])) ) {
			?>
			<div class="alert alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>This mail is already used in our database. You can paste it in the "Already registred visitor" field to know more.</p>				
			</div>

			<?php

			return false;
		}

		$email=$this->securePostVar($userForm["email"]);
		$col.= "email,";
		$vals.= "'".$email."',";

	}


	if ((isset($userForm["firstname"])) && ( !empty($userForm["firstname"]) ) ){
		
		$firstname=$this->securePostVar($userForm["firstname"]);
		$col.= "firstname,";
		$vals.= "'".$firstname."',";
	}

	if ((isset($userForm["lastname"])) && (!empty($userForm["lastname"]))){
		$lastname=$this->securePostVar($userForm["lastname"]);
		$col.= "lastname,";
		$vals.= "'".$lastname."',";
	}

	if ((isset($userForm["age"])) && ($userForm["age"] != "")){
		$age=$this->securePostVar($userForm["age"]);
		if (is_int($age)){
			$col.= "age,";			
			$vals.= $age.",";
		}else{
			?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>Please double-check the age's value before proceeding again.</p>				
			</div>

			<?php
			exit(0);
		}
	}

	if ((isset($userForm["gender"])) && ($userForm["gender"] != "")){
		$gender=$this->securePostVar($userForm["gender"]);
		$col.= "gender,";
		$vals.= "'".$gender."',";
	}


	if ((isset($userForm["address"])) && ($userForm["address"] != "")){
		$address=$this->securePostVar($userForm["address"]);
		$col.= "address,";
		$vals.= "'".$address."',";
	}


	if ((isset($userForm["c_number"])) && ($userForm["c_number"] != "")){
		$c_number=$this->securePostVar($userForm["c_number"]);
		$col.= "c_number,";
		$vals.= "'".$c_number."',";

	}

	if ((isset($userForm["organisation"])) && ($userForm["organisation"] != "")){
		$organisation=$this->securePostVar($userForm["organisation"]);
		$col.= "organisation,";
		$vals.= "'".$organisation."',";

	}
	$query="INSERT INTO reg_member(".substr($col, 0, -1).") VALUES (".substr($vals, 0, -1).")";
	echo $query;
		//if (true){
	if (mysql_query($query)){

		?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p>The user was succesfully registred in the visitor's database.</p>				
		</div>

		<?php
	}


}


public function getVisitorInfo($id){
	$query=mysql_query("select * from reg_member WHERE (member_id = $id)")or die(mysql_error());

	if (mysql_num_rows($query) == 1){


		return mysql_fetch_assoc($query);

	}else{
		return false;
	}
}
public function previewProfile($email){

	if ($email==""){

		?>
		<div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p>Fill the fields before trying to check the visitor's profile. </p>
		</div>

		<?php
		exit();
	}


	$query=mysql_query("select * from reg_member WHERE (email = '$email')")or die(mysql_error());

	if (mysql_num_rows($query) == 1){


		$row=mysql_fetch_assoc($query);
//var_dump($row);
		?>
		<h3><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></h3>

		<table class="table table-striped">
			<tr>
				<td>First Name</td>
				<td><?php echo $row['firstname']; ?></td>
			</tr>


			<tr>
				<td>Last Name</td>
				<td><?php echo $row['lastname']; ?></td>
			</tr>

			<tr>
				<td>Gender</td>
				<td><?php echo $row['gender']; ?></td>
			</tr>

			<tr>
				<td>Address</td>
				<td><?php echo $row['address']; ?></td>
			</tr>

			<tr>
				<td>Email</td>
				<td><?php echo $row['email']; ?></td>
			</tr>

		</table>

		<?php
	}else{
		?>
		<div class="alert alert-danger fade in">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<p>This visitor is not included in our database. We suggest to proceed to 1 of these 3 Options: </p>
			<ol>
				<li>Check the spelling of the name/surname or just type the email used for registration.</li>
				<li>Go to <a href="refresh.php" target="_blank">refresh visitor's list</a> to add the latest registation.</li>
				<li>If the visitor still unavailable, just fill the form at your right.</li>
			</ol>
		</div>

		<?php
	}

}
public function securePostVar($var){
	return  mysql_real_escape_string(trim($var));
//return htmlentities($var);

}
public function typeheadQuery($q,$type="email"){
	$q="%".$q."%";

	switch ($type) {

		case 'name':
		$query=mysql_query("SELECT * FROM reg_member WHERE ((firstname LIKE '$q') OR (lastname LIKE '$q')) ")or die(mysql_error());

		break;

		case 'email':
		default:
		$query=mysql_query("SELECT * FROM reg_member WHERE (email LIKE '$q')")or die(mysql_error());
		break;
	}



	$numResults = mysql_num_rows($query);
	$counter = 0;
	echo "[";
	while($row=mysql_fetch_array($query)){
		?>

		{
		"name": "<?php echo $row['firstname']." ".$row['lastname']; ?>",
		"description": "<?php echo $row['address']; ?>",
		"language": "<?php echo $row['email']; ?>",
		"value": "<?php echo $row['email']; ?>",
		"tokens": [
		"<?php echo $row['firstname']; ?>",
		"<?php echo $row['email']; ?>"
		]
	}
	<?php
	if (++$counter != $numResults) {echo ",";}
}


echo "]";




/*
echo ',{
"name": "typeahead.js",
"description": "A fast and fully-featured autocomplete library",
"language": "JavaScript",
"value": "typeahead.js",
"tokens": [
  "typeahead.js",
  "JavaScript"
]
}';

*/
}

}


?>