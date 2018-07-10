<?php 

$email = '';
$username = '';

foreach ($user_profile as $key => $value) {
	if($key == 'emailVerified'){
		$email = $value;
	}
	if($key == 'identifier'){
		$username = $value;
	}
}

if(!$this->Auth_model->check_email($email) && !$this->Auth_model->check_username($username) ){ 

$this->Auth_model->HauthSignin($username);
header('location:'.base_url('index.php/profile'));


}else{ ?>
<div class="row">
		<div class="container">
			<div class="card col s12 red lighten-4 red-text center">
				<i class="mdi-social-public large"></i>
				<div class="flow-text"> Account doesn't exist. </div>
				<p><b><a href="<?= base_url('index.php/auth/'); ?>">Click here</a></b> to SignUp</p><br>
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