<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
	<?php $id=0; foreach ($advertisements->result() as $row):$id = $row->ad_id;?>	
		<div class="col s6"><br>
			<div class="card-image">
				<img src="<?php echo base_url('assets/images/gallary/4.jpg');?>" id="1_img" class="multiple-images">
				<img src="<?php echo base_url('assets/images/gallary/5.jpg');?>" id="2_img" class="hide multiple-images">
				<img src="<?php echo base_url('assets/images/gallary/6.jpg');?>" id="3_img" class="hide multiple-images">
				<img src="<?php echo base_url('assets/images/gallary/7.jpg');?>" id="4_img" class="hide multiple-images">
				<img src="<?php echo base_url('assets/images/gallary/8.jpg');?>" id="5_img" class="hide multiple-images">
			</div><br>
			
			<div class="row">
				<div class="col s2">
					<img src="<?php echo base_url('assets/images/gallary/4.jpg');?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign multiple-images-mock" data-image="1">
				</div>	
				<div class="col s2">
					<img src="<?php echo base_url('assets/images/gallary/5.jpg');?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign multiple-images-mock" data-image="2">
				</div>	
				<div class="col s2">
					<img src="<?php echo base_url('assets/images/gallary/6.jpg');?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign multiple-images-mock" data-image="3">
				</div>	
				<div class="col s2">
					<img src="<?php echo base_url('assets/images/gallary/7.jpg');?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign multiple-images-mock" data-image="4">
				</div>	
				<div class="col s2">
					<img src="<?php echo base_url('assets/images/gallary/8.jpg');?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign multiple-images-mock" data-image="5">
				</div>	
			</div><br>
			<script>
				$(document).ready(function(){
					$('.multiple-images-mock').css('cursor','pointer');
					
					$('.multiple-images-mock').click(function(){

						var imgsrc = $(this).data('image');
						$('.multiple-images').addClass('hide');
						$('#'+imgsrc+'_img').removeClass('hide');
					});

				});
			</script>
			<div class="divider"></div><br>
			
		</div>

		<div class="col s6">
			<div class="card-content">
				<div class=" col s11">
					<?php if($row->ad_action == 0):?>
					<?php if($row->ad_status == 0):?>
		    		<a class="green" style="color:white;padding:5px;border-radius:3px;" href="#!">Approve <i class="mdi-navigation-arrow-forward"></i> </a>  
					<?php endif;?>

					<?php if($row->ad_status == 1):?>
		    		<a class="amber darken-4" style="color:white;padding:5px;border-radius:3px;" href="#!">Inprogress <i class="mdi-image-hdr-strong"></i> </a>  
					<?php endif;?>

					<?php if($row->ad_status == 2):?>
		    		<a class="blue" style="color:white;padding:5px;border-radius:3px;" href="#!">Live <i class="mdi-social-mood"></i> </a>  
					<?php endif;?>

		    		&nbsp | 

		    		<a class="indigo drken-4" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/archive/').$row->ad_id;?>">Archive <i class="mdi-notification-dnd-forwardslash"></i> </a>
		    		<?php endif;?>

		    		<?php if($row->ad_action == 1):?>
		    		<a class="red" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/unarchive/').$row->ad_id;?>">UnArchive <i class="mdi-notification-dnd-forwardslash"></i> </a>
		    		<?php endif;?>

		    	</div>
		    	<br>
		    	
			<h4 class="flow-text grey-text text-darken-4"><a href="#" class="grey-text text-darken-4"><?php echo ucfirst($row->ad_name);?></a>
            </h4>
            <div class="row">
            <div class="input-field col s6">
                    <select id="memplan">
                      <option value="" disabled>Membership Plan</option>
                      <option value="free" <?php if($row->ad_type == 'free'): echo 'selected';endif;?>>Free</option>
                      <option value="professional" <?php if($row->ad_type == 'professional'): echo 'selected';endif;?>>Professional</option>
                      <option value="premium" <?php if($row->ad_type == 'premium'): echo 'selected';endif;?>>Premium</option>
                    </select>
                  </div>
              </div>
              <div class="row">
              	<div class="col s6">
              		<label>Start Data</label>
              		<input type="date" data-value="<?php echo $row->ad_starttime;?>" class="datepicker startdate">
              	</div>
              	
              	<div class="col s6">
              		<label>End Date</label>
              		<input type="date" data-value="<?php echo $row->ad_endtime;?>" class="datepicker enddate">
              	</div>
              	<?php if($row->ad_starttime!='' && $row->ad_endtime!=''):?>
              	
              <?php else: echo '<span class="red-text"><b>Please set Start Time or End Time.</b></span>'; endif;?>
              </div>
            <p class="row">

            	<a class="green right updateadd" style="color:white;padding:5px;border-radius:3px;" href="#!">Update <i class="mdi-content-send"></i> </a><br>

              <span class="left"><a href=""><b>Category: <?php echo ucfirst($row->ad_cat);?></b></a></span>
              <span class="left"><a href=""><b>Sub Category: <?php echo ucfirst($row->ad_subcat);?></b></a></span>
            </p>
            <br>
            <p class="blog-post-content"><?php echo ucfirst($row->ad_desc);?></p>
            <h4>        ₹   <?php echo $row->ad_price;?> /-</h4>           
			<br>
            <div class="row">
              <div class="col s2">
                <img src="http://localhost/deepak/classyad/assets/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
              </div>
              <div class="col s6">By <a href="#">John Doe</a><br><span class="left">18th June, 2015</span></div>
            </div>
        </div>
		</div>
<?php endforeach;?>
		</div>
	</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
		$(".picker__weekday-display").addClass('red amber-4');
	},1000);

		$(".updateadd").click(function(){
			var startdate = $('.startdate').val();
			var enddate = $('.enddate').val();
			var membershipPlan = $('select#memplan option:selected').val();
			$.post("<?php echo base_url('index.php/advts/update/').$id;?>",'startdate='+startdate+'&enddate='+enddate + '&memplan='+membershipPlan,function(msg){
				console.log(msg);
				if(msg.status == 'success'){
					 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
					 
				}else{
					 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
				}
			})
		});
	});
</script>