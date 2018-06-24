<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
	<?php $id=0; foreach ($advertisements->result() as $row):$id = $row->ad_id;?>	
		<div class="col s12 m6 l6"><br>
			<div class="card-image waves-effect waves-light">
				<?php $j=0;foreach ($images->result() as $image):$j++;?> 
				<img src="<?php echo base_url('assets/images/upload/'.$image->img_value);?>" id="<?php echo $j;?>_img" class="multiple-images <?php if($j>1):echo 'hide';endif;?>">
				<?php endforeach;?>
			</div><br><br>
			
			<div class="row">
				<div class="masonry-gallery-wrapper">                
                <div class="popup-gallery">
				<?php $j=0;foreach ($images->result() as $image):$j++;?> 
				<div class="col s2 small-image" data-image="<?php echo $j;?>">
					
					<div class="right color white-text waves-effect waves-light tooltipped  <?php echo $j ?>_x remove" data-imgvalue="<?php echo $image->img_value;?>" data-position="right" data-delay="50" data-tooltip="Remove" style="border-radius:5px;cursor:pointer;position:relative;top:0px;opacity:0"><b>&nbsp x &nbsp</b></div>

					<div class="waves-effect waves-light">
					<img src="<?php echo base_url('assets/images/upload/'.$image->img_value);?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign multiple-images-mock" data-image="<?php echo $j;?>"></div>
				</div>	
				<?php endforeach;?>
				<div class="col s2 small-image tooltipped" data-position="bottom" data-delay="100" data-tooltip="Add Image">
					<div class="right color white-text waves-effect waves-light " style="border-radius:5px;cursor:pointer;position:relative;top:0px;opacity:0"><b>&nbsp x &nbsp</b></div>

					<a href="<?php echo base_url('index.php/dashboard/upload/').$id;?>"> <div class="waves-effect waves-light">
					<img src="<?php echo base_url('assets/images/add.png');?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign"></div></a>
				</div>	
			</div>
		</div>
				
			</div><br>
			<script>
				$(document).ready(function(){
					setTimeout(function(){
					$('.multiple-images-mock').css('cursor','pointer');
					
					$('.remove').click(function(){
						var data = $(this).data('imgvalue');

						$.post("<?php echo base_url('index.php/advts/removeImg');?>","imgval="+data,function(msg){
							if(msg.status == 'success'){
					 			Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
					 			location.reload();	 
							}else{
								Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
							}
						});
					});

					$('.small-image').hover(function(){
					   var imgsrc = $(this).data('image');
					   $('.'+imgsrc+'_x').css('opacity',1);
					},function(){
					   var imgsrc = $(this).data('image');
					   $('.'+imgsrc+'_x').css('opacity',0);
					});

					$('.multiple-images-mock').click(function(){

						var imgsrc = $(this).data('image');
						$('.multiple-images').addClass('hide');
						$('#'+imgsrc+'_img').removeClass('hide');
					});
				},1000);

				});
			</script>


			
		</div>

		<div class="col s12 m6 l6">
			<div class="card-content">
				<div class=" col s11">
					<?php if($row->ad_action == 0):?>
					<?php if($row->ad_status == 0):?>
		    		<a class="red" style="color:white;padding:5px;border-radius:3px;" href="#!">Yet to approve <i class="mdi-social-mood"></i> </a>  
					<?php endif;?>

					<?php if($row->ad_status == 1):?>
		    		<a class="amber darken-4" style="color:white;padding:5px;border-radius:3px;" href="#!">Inprogress <i class="mdi-image-hdr-strong"></i> </a>  
					<?php endif;?>

					<?php if($row->ad_status == 2):?>
		    		<a class="green" style="color:white;padding:5px;border-radius:3px;" href="#!">Live <i class="mdi-social-mood"></i> </a>  
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
            	<div class="grey-text ultra-small">Membership Plan</div>
                    <select id="memplan">
                      <option value="" disabled>Membership Plan</option>
                      <option value="free" <?php if($row->ad_type == 'free'): echo 'selected';endif;?>>Free</option>
                      <option value="professional" <?php if($row->ad_type == 'professional'): echo 'selected';endif;?>>Professional</option>
                      <option value="premium" <?php if($row->ad_type == 'premium'): echo 'selected';endif;?>>Premium</option>
                    </select>
                  </div>
            <div class="input-field col s6">
            	<div class="grey-text ultra-small">Advertisement Status</div>

                    <select id="adstatus">
                      <option value="" disabled>Advertisement Status</option>
                      <option value="0" <?php if($row->ad_status == 0): echo 'selected';endif;?>>Yet to Approve</option>
                      <option value="1" <?php if($row->ad_status == 1): echo 'selected';endif;?>>In progress</option>
                      <option value="2" <?php if($row->ad_status == 2): echo 'selected';endif;?>>Live</option>
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
              <div class="col s6">By <a href="#">John Doe</a><br><span class="left"><?php echo $row->ad_starttime;?></span></div>
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
			var adstatus = $('select#adstatus option:selected').val();
			$.post("<?php echo base_url('index.php/advts/update/').$id;?>",'startdate='+startdate+'&enddate='+enddate + '&memplan='+membershipPlan+'&adstatus='+adstatus,function(msg){
				console.log(msg);
				if(msg.status == 'success'){
					 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
					 location.reload();
				}else{
					 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
				}
			})
		});
	});
</script>