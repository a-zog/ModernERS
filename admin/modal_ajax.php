
<?php
include('../dbcon.php');
require_once("../lib.php");
if (isset($_GET["load"])){
	$load=$_GET["load"];
	$lib= new ERS;
	switch ($load) {
		case 'logout':
		?>
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					Logout
				</div>
				<div class="modal-body">
					<p>Are you sure you want to Logout?</p>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="zicon-remove"></i>&nbsp;Close</button>
					<a href="logout.php" class="btn btn-danger"><i class="zicon-signout"></i>&nbsp;Logout</a>
				</div>

			</div>
		</div>
		<?php
		break;

		case 'edit':
		if (isset($_GET["id"])){
			$uid=$_GET["id"];
			?>
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<span class="zicon-edit-1"></span>	Edit visitor's details
					</div>

					<?php
					$userInfo= $lib->getVisitorInfo($uid);
					if ( $userInfo ){
						?>
						<div id="callback"></div>

						<form class="form-horizontal" action="../page/ajax.php" id="modifyVisitorForm" role="form" method="POST">
							<div class="modal-body">
								<h3><?php echo $userInfo['firstname']." ".$userInfo['lastname']; ?> <small>Edit <span class="zicon-right-open-3"></span></small></h3>
								<div class="form-group">
									<label class="control-label col-sm-4" for="firstname">First Name <span class="label label-danger">required</span></label>
									<div class="controls col-md-8">
										<input type="text" class="form-control" name="firstname" value="<?php echo $userInfo['firstname']; ?>" id="firstname" placeholder="First Name" required="">
									</div>
								</div>


								<div class="form-group">
									<label class="control-label col-sm-4" for="lastname">Last Name  <span class="label label-danger">required</span></label>
									<div class="controls col-md-8">
										<input type="text" class=" form-control" value="<?php echo $userInfo['lastname']; ?>" name="lastname" id="lastname" placeholder="Last Name" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="organisation">Organization</label>
									<div class="controls col-md-8">
										<input type="text" value="<?php echo $userInfo['organisation']; ?>" class=" form-control" name="organisation" id="organisation" placeholder="Organization">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="age">Age</label>
									<div class="controls col-md-8">
										<input type="text" class=" form-control" value="<?php echo $userInfo['age']; ?>" name="age" id="age" placeholder="Age">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-4" for="gender">Gender</label>
									<div class="col-md-8 controls">
										<select class="form-control" name="gender">
											<option></option>
											<option <?php if ($userInfo['gender']=="Male"){echo "selected";} ?> >Male</option>
											<option <?php if ($userInfo['gender']=="Female"){echo "selected";} ?> >Female</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-4" for="address">Address</label>
									<div class="controls col-md-8">
										<input type="text" name="address" value="<?php echo $userInfo['address']; ?>" class=" form-control" id="address" placeholder="Address">
									</div>
								</div>  


								<div class="form-group">
									<label class="control-label col-sm-4" for="inputEmail">Email Adress  <span class="label label-danger">required</span></label>
									<div class="controls col-md-8">
										<input type="text" name="email" value="<?php echo $userInfo['email']; ?>" class=" form-control" id="inputEmail" placeholder="Email Address">
									</div>
								</div>


								<div class="form-group">
									<label class="control-label col-sm-4" for="c_number">Contact Number</label>
									<div class="controls col-md-8">
										<input type="text" class=" form-control" value="<?php echo $userInfo['c_number']; ?>" name="c_number" id="c_number" placeholder="Contact Number" required="">
									</div>
								</div>

								<div class="form-group">

									<div class="controls  text-center">
										<input type="hidden" name="uid" value="<?php echo $userInfo['member_id']; ?>">
										<input type="hidden" name="updateVisitor" value="true">
									</div>

								</div>


							</div>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="zicon-remove"></i>&nbsp;Close</button>
								<button type="submit" name="modifyVisitorSubmitted" id="modifyVisitorSubmitted" class="btn btn-success">Save</button>
								
							</div>
						</form>
						<?php }
						else{
							?>
							<div class="modal-body">
								<p>Unable to retreive the user.</p>
							</div>
							<div class="modal-footer">
								<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="zicon-remove"></i>&nbsp;Close</button>
							</div>
							<?php
						} ?>

					</div>
				</div>
				<script type="text/javascript">
					$(document).ready( function() {
						$('.modal-dialog form').on('submit', function(event) {
							event.preventDefault()
							$.post( $(this).attr('action'), $(this).serialize(), function(data) {
								$("#callback").html(data);
							})
						})
					});
				</script>
				<?php
			}
			else{
				?>	 
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							Edit visitor's details
						</div>
						<div class="modal-body">
							<p>Unable to retreive the user.</p>
						</div>
						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="zicon-remove"></i>&nbsp;Close</button>
						</div>

					</div>
				</div>
				<?php
			}
			break;
			default:

			?>
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						Unknown action
					</div>
					<div class="modal-body">
						<p>Unknown action, just close this box.</p>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="zicon-remove"></i>&nbsp;Close</button>
					</div>

				</div>
			</div>

			<?php
			break;
		}
	}
