<div class="row">
	<div class="container">

		<?php foreach($userDetails->result() as $user):?>
		<div class="col s12 m6 l3">
			<div class="card userdetails"><br>
				<div class="card-title center color white-text">
					<div class="col s10">
						&nbsp  &nbsp  &nbsp &nbsp  &nbsp User Details 
					</div>
					<div class="s2 btn-editUser">
						<span class="waves-effect waves-light"> &nbsp <i class="mdi-editor-mode-edit white-text"> </i> &nbsp </span>
					</div>

				</div>
				<div class="card-content center ">
					
					<i class="mdi-action-face-unlock red-text flow-text"></i>
					<p class="red-text"><b>  User Name </b></p>
					<p> <?= $user->username?></p>

					<br>

					<i class="mdi-action-perm-identity red-text flow-text"></i>
					<p class="red-text"><b>  Full Name </b></p>
					<p> <?= $user->firstname.' '.$user->middlename.' '.$user->lastname?> </p>

					<br>

					<i class="mdi-communication-email red-text flow-text"></i>
					<p class="red-text"><b>  Email Id</b></p>
					<p> <?= $user->email?> </p>

					<br>

					<i class="mdi-communication-phone red-text flow-text"></i>
					<p class="red-text"><b>  Phone Number</b></p>
					<p> <?= $user->phone?> </p>


				</div>

			</div>


			<div class="card edituserdetails"><br>
				<div class="card-title center color white-text">
					<div class="col s10">
						&nbsp  &nbsp  &nbsp &nbsp  &nbsp Edit Details 
					</div>
					<div class="s2 btn-viewUserDetails">
						<span class="waves-effect waves-light"> &nbsp <i class="mdi-action-visibility white-text"> </i> &nbsp </span>
					</div>

				</div>
				<div class="card-content center">
					<form id="editDetailsform">
					<i class="mdi-action-face-unlock red-text flow-text"></i>
					<p class="red-text center"><b>  User Name </b></p>
					<div class="input-field">
                      <input id="username"  type="text" class="validate center grey-text" value="<?= $user->username?>" disabled>
                    </div>

					<i class="mdi-action-perm-identity red-text flow-text"></i>
					<p class="red-text center"><b>  First Name </b></p>
					<div class="input-field">
                        <input id="firstname" name="firstname" type="text" class="validate center" value="<?= $user->firstname?>">
                    </div>

                    <i class="mdi-action-perm-identity red-text flow-text"></i>
					<p class="red-text center"><b>  Middle Name </b></p>
					<div class="input-field">
                        <input id="middlename" name="middlename" type="text" class="center" value="<?= $user->middlename?>">
                    </div>

                    <i class="mdi-action-perm-identity red-text flow-text"></i>
					<p class="red-text center"><b>  Last Name </b></p>
					<div class="input-field">
                        <input id="lastname" name="lastname" type="text" class="validate center" value="<?= $user->lastname?>">
                    </div>


					<i class="mdi-communication-email red-text flow-text"></i>
					<p class="red-text center"><b>  Email Id</b></p>
					<div class="input-field">
                        <input id="email" name="email" type="email" class="validate center" value="<?= $user->email?>">
                    </div>


					<i class="mdi-communication-phone red-text flow-text"></i>
					<p class="red-text center"><b>  Phone Number</b></p>
					<div class="input-field">
                        <input id="phone" name="phone" type="number" class="validate center" value="<?= $user->phone?>">
                    </div>

                    <br>
                    <div class="btn btn-editDetails color waves-effect waves-light btn-editDetailsform">
                    	update 
                    	<i class="mdi-content-send white-text"></i>
                    </div>

                    <div class="preloader-wrapper small active subu_loader hide center">
                    <div class="spinner-layer spinner-red-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                	</div>
                    

                	</form>

				</div>

			</div>


				<script>
					$(document).ready(function(){
						
						setTimeout(function(){
							$('.edituserdetails').hide();
						},1000);						

						$('.btn-editUser').click(function(){
							$('.userdetails').hide();
							$('.edituserdetails').show();
						});

						$('.btn-viewUserDetails').click(function(){
							$('.userdetails').show();
							$('.edituserdetails').hide();
						});
						
						var processing =0;

						$('.btn-editDetailsform').click(function(){
							
							if(!processing){
								processing =1;
								
								$('.btn-editDetailsform').hide();
								$('.subu_loader').removeClass('hide');
								
								var data = $('#editDetailsform').serialize();
								
								$.post("<?php echo base_url('index.php/profile/update/');?>",data,function(msg){

									if(msg.status == 'success'){
										
										Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
										processing =0;
										$('.btn-editDetailsform').show();
										$('.subu_loader').addClass('hide');

									}else{
										
										Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
										processing =0;
										$('.btn-editDetailsform').show();
										$('.subu_loader').addClass('hide');

									}
								})
							}else{
								Materialize.toast('<span class="white-text">Your request under progress, <br>Please Wait</span>', 5e3, "amber darken-4");

							}
						});
					});
				</script>
		</div>

		<?php endforeach;?>

		<div class="col s12 m6 l9">
			<div class="card"><br>
				<div class="card-title center color white-text">
					Advertisement Details
				</div>
			</div>
				<div id="classyad-posts" class="row">
                <div class="blog-sizer"></div>


<?php 
$ad = $ads->result();
$count = $ads->num_rows();
$i=0;
if($count>0):
foreach($ads->result() as $row):
  $i++;?>
  <div class="blog">

    <div class="card 
    			<?php 

    				if($row->ad_action == 0):
						if($row->ad_status == 0):
			    			echo 'red';
						endif; 

						if($row->ad_status == 1):
			    			echo 'amber'; 
			    		endif; 

			    		if($row->ad_status == 2):
			    			echo  'green';
			    		endif;

		    		endif;

		    		if($row->ad_action == 1):
		    			echo 'red';
		    		endif;



		    		?> lighten-4">
      
        <div class="card-image waves-effect waves-block waves-light">
           <?php $data = $this->Advertise_model->getImageData($row->ad_id);?>
            <a href="#!"><?php if($data != ''){ ?><img src="<?php echo base_url('assets/images/upload/'.$data);?>" alt="<?= $row->ad_name?>" onerror="this.src='<?php echo base_url('assets/images/default2.png');?>'"><?php }else{ ?><img src="<?php echo base_url('assets/images/default2.png');?>"><?php } ?>
            </a>
        </div>
		<div href="#" data-position="right" data-delay="50"

			data-tooltip="<?php if($row->ad_type == 'free'):
			    			echo 'Free Advertisement';
						endif; 

						if($row->ad_type == 'professional'):
			    			echo 'Professional Advertisement'; 
			    		endif; 

			    		if($row->ad_type == 'premium'):
			    			echo  'Premium Advertisement';
			    		endif;?>"


			class="btn-floating btn-small tooltipped flow-text but_type_list left 

			    		<?php if($row->ad_type == 'free'):
			    			echo 'blue';
						endif; 

						if($row->ad_type == 'professional'):
			    			echo 'amber'; 
			    		endif; 

			    		if($row->ad_type == 'premium'):
			    			echo  'green';
			    		endif;?> darken-3 waves-effect waves-light ">
		        <i class="mdi-action-stars"></i></div>


        <ul class="card-action-buttons">
            <li><a class="btn-floating waves-effect waves-light color activator"><i class="mdi-social-share"></i></a>
            </li>                            
            <li><a class="btn-floating btn-large waves-effect waves-light red accent-4"><b>₹ <?php echo $row->ad_price;?></b></a>
            </li>
        </ul>

        <div class="card-content">
            <p class="row">
            	<?php if($row->ad_action == 0):?>
					<?php if($row->ad_status == 0):?>
		    		<a class="red" style="color:white;padding:5px;border-radius:3px;" href="#!">Yet to approve <i class="mdi-social-mood"></i> </a> 
					<?php endif;?>

					<?php if($row->ad_status == 1):?>
		    		<a class="amber darken-4" style="color:white;padding:5px;border-radius:3px;" href="#!">Inprogress <i class="mdi-image-hdr-strong"></i> </a> 
					<?php endif;?>

					<?php if($row->ad_status == 2):?>
		    		<a class="green" style="color:white;padding:5px;border-radius:3px;" href="#!">Live <i class="mdi-social-mood"></i> </a> 
					<?php endif;
					endif;
					if($row->ad_action == 1):?>
						<a class="red" style="color:white;padding:5px;border-radius:3px;" href="#!">Archived <i class="mdi-content-block"></i> </a> 
					<?php endif;
					?>

					&nbsp|&nbsp
					<a class="color" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/edit/').$row->ad_id;?>">Edit <i class="mdi-content-create"></i> </a>
					<br>
					<br>

              <span class="left"><a href="#!" class="color-text"><b><?php echo ucfirst($row->ad_cat);?></b></a></span><br>

              <span class="right"><b></b><?php if($row->ad_starttime>0):echo date('d M,y',$row->ad_starttime);endif;?></span>
            </p>
            <h4 class="card-title grey-text text-darken-4"><a href="<?php echo base_url('index.php/advts/view/').$row->ad_id.'/'.str_replace(';','',str_replace('.','',str_replace(' ', '-', $row->ad_name)));?>" class="grey-text text-darken-4"><?php echo ucfirst($row->ad_name);?></a>
            </h4>
            <p class="blog-post-content"><?php echo $row->ad_desc;?></p>

            
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i><?php echo $row->ad_name;?></span>
            <p><?php echo $row->ad_desc;?></p>
            <span class="left"><b>Category: </b><a href="" class="color-text"><?php echo ucfirst($row->ad_cat);?></a></span><br>
              <span class="left"><b>Sub-category: </b><a href="" class="color-text"><?php echo ucfirst($row->ad_subcat);?></a></span><br>
              <span class="left"><b>Start Date: </b><?php if($row->ad_starttime>0):echo date('d M,y',$row->ad_starttime);endif;?></span><br>
              <span class="left"><b>End Date: </b><?php if($row->ad_endtime>0):echo date('d M,y',$row->ad_endtime);endif;?></span>

            

        </div>
    </div></div>

<?php endforeach;?>  
<?php endif;if($count ==0): ?>

<div class="">
	<div class="card-content flow-text center">
		You have no Advertisements. <a href="<?php echo base_url('index.php/advts/');?>">Click  here</a> to add.
	</div>
	</div>

<?php endif;?>
  <div class="append_ad">

  </div>
</div>
			</div>
		</div>
	</div>