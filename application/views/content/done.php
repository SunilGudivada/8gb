<?php
	// var_dump($user_profile);
// echo '<pre>';print_r($user_profile);echo '</pre>';
$email = '';
$phone = '';
$firstname = '';
$lastname = '';
$username = '';
$oauth = '';
$pass = '';
$status = '';
$e_status = '';

foreach ($user_profile as $key => $value) {
	if($key == 'emailVerified'){
		$email = $value;
	}
	if($key == 'phone'){
		$phone = $value;
	}
	if($key == 'firstName'){
		$firstname = $value;
	}
	if($key == 'lastName'){
		$lastname = $value;
	}
	if($key == 'identifier'){
		$username = $value;
	}
}

if($this->Auth_model->check_email($email) && $this->Auth_model->check_username($username) ){
	$status = 1;
	$e_status = 1;
	$this->Auth_model->addHauthData($username,$firstname,$lastname,$email,$phone,$pass,$status,$e_status,$provider);?>
	<div class="row">
		<div class="container">
			<div class="card col s12 green lighten-4 green-text center">
				<i class="mdi-social-public large"></i>
				<div class="flow-text"> Account Successfully created.</div>
				<p><b><a href="<?= base_url('index.php/auth/'); ?>">Click here</a></b> to SignIn</p><br>
				<div class="row">
					<div class="color-text">
	                <p class="ultra-small center"><b>
	                    <a href="#!" class="color-text">Conditions of Use</a>&ensp; | &ensp;
	                    <a href="#!" class="color-text"> Privacy Policy</a>&ensp; | &ensp;
	                    <a href="#!" class="color-text">  Help</a> </b>
	                </p>
	                <p class="ultra-small center">
	                <b> © 2016 - <?php echo date("Y");?> , DSPL - 8GB : ClassyAd</b>
	                </p>
            	</div>
            </div>
			</div>
		</div>
	</div>
<?php }else{?><br>
	<div class="row">
		<div class="container">
			<div class="card col s12 red lighten-4 red-text center">
				<i class="mdi-social-public large"></i>
				<div class="flow-text"> Account Already exist with this Provider. </div>
				<p><b><a href="<?= base_url('index.php/auth/'); ?>">Click here</a></b> to SignIn</p><br>
				<div class="row">
					<div class="color-text">
	                <p class="ultra-small center"><b>
	                    <a href="#!" class="color-text">Conditions of Use</a>&ensp; | &ensp;
	                    <a href="#!" class="color-text"> Privacy Policy</a>&ensp; | &ensp;
	                    <a href="#!" class="color-text">  Help</a> </b>
	                </p>
	                <p class="ultra-small center">
	                <b> © 2016 - <?php echo date("Y");?> , DSPL - 8GB : ClassyAd</b>
	                </p>
            	</div>
            </div>
			</div>
		</div>
	</div>
<?php } ?>

