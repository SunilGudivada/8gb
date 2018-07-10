<div class="container">
	<div class="row">
		<div class="col s12 m4 l4">
			<div class="card card-gra">
				<div class="center flow-text white-text color">
					Contact Form
				</div>
				<div class="divider"></div>
				<form id="contact-form">
				<div class="row">
				<div class="card-content center">
					<b class="white-text center">User Name</b><br>
					<div class="input-field col s8 offset-s2 center">
						<input type="text" name="username" class="center">
					</div>
				</div>
				</div>

				<div class="row">
				<div class="card-content center">
					<b class="white-text center">Email</b><br>
					<div class="input-field col s8 offset-s2 center">
						<input type="email" name="email" class="center">
					</div>
				</div></div>

				<div class="row">
				<div class="card-content center">
					<b class="white-text center">Describe your problem.</b>
					<div class="input-field col s8 offset-s2 center">
						<textarea name="description" class="center materialize-textarea"></textarea>
					</div>
				</div>
				</div>
				</form>
				<div class="center row">
				<div class="btn btn-submit color waves-effect waves-light">Submit</div>
			</div>
			</div>
		</div>

		<div class="col s12 m8 l8">
			<div class="card card-gra">
				<div class="center flow-text color white-text">
					Office Details 
				</div>
				<div class="divider"></div>
				<div class="">
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.btn-submit').click(function(){
			$.post('<?= base_url('index.php/contactus/submit/') ?>',$('#contact-form').serialize(),function(msg){
				if(msg.status == 'success'){
                  Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
                  location.reload();
                  }else{
                    Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
                  }
			});
		});

		// $('body').css('background-image',"url('<?= base_url('assets/images/background.PNG') ?>')");
	});
	</script>