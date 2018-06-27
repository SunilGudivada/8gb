<section id="content">

	<div class="container">
	<div class="row">

		<?php $count = $images->num_rows();if($count !=0):?>
		<div class="col s10 offset-s1">
		<div class="card">
	<?php $id=0; foreach ($advertisements->result() as $row):$id = $row->ad_id;?>	
		<div class="col s12 m6 l6"><br>
			<div class="card-image waves-effect waves-light">
				<?php $j=0;

				foreach ($images->result() as $image):$j++;?> 
				<img src="<?php echo base_url('assets/images/upload/'.$image->img_value);?>" id="<?php echo $j;?>_img" class="multiple-images <?php if($j>1):echo 'hide';endif;?>">
				<?php endforeach;?>
			</div><br><br>
			
			<div class="row">
				<div class="masonry-gallery-wrapper">                
                <div class="popup-gallery">
				<?php $j=0;foreach ($images->result() as $image):$j++;?> 
				<div class="col s2 small-image" data-image="<?php echo $j;?>">
					
					

					<div class="waves-effect waves-light">
					<img src="<?php echo base_url('assets/images/upload/'.$image->img_value);?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign multiple-images-mock" data-image="<?php echo $j;?>"></div>
				</div>	
				<?php endforeach;?>
				
			</div>
		</div>
				
			</div><br>
			<script>
				$(document).ready(function(){
					setTimeout(function(){
					$('.multiple-images-mock').css('cursor','pointer');
					
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

					<?php if($row->ad_type == 'free'):?>
		    		<a class="blue" style="color:white;padding:5px;border-radius:3px;" href="#!">Free  </a>  
					<?php endif;?>

					<?php if($row->ad_type == 'professional'):?>
		    		<a class="amber darken-4" style="color:white;padding:5px;border-radius:3px;" href="#!">Professional <i class="mdi-image-hdr-strong"></i> </a>  
					<?php endif;?>

					<?php if($row->ad_type == 'premium'):?>
		    		<a class="green" style="color:white;padding:5px;border-radius:3px;" href="#!">Premium <i class="mdi-social-mood"></i> </a>  
					<?php endif;


					if($this->session->id == $row->user_id):?>


					 &nbsp | &nbsp
					<a class="color" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/edit/').$row->ad_id;?>">Edit <i class="mdi-content-create"></i> </a>  
				<?php endif;?>
		    	</div>
		    	<br>
		    	
			<h4 class="flow-text grey-text text-darken-4"><a href="#" class="grey-text text-darken-4"><?php echo ucfirst($row->ad_name);?></b></a>
            </h4>
              
            <p class="row"><br>

              <span class="left"><a href=""><b>Category: <?php echo ucfirst($row->ad_cat);?></b></a></span><br>
              <span class="left"><a href=""><b>Sub Category: <?php echo ucfirst($row->ad_subcat);?></b></a></span>
            </p>
            <br>
            <p class="blog-post-content"><?php echo ucfirst($row->ad_desc);?></p>
            <h4>        ₹   <?php echo $row->ad_price;?> /-</h4>           
			<br>
            <div class="row">
              <div class="col s2">
                <img src="http://localhost/deepak/classyad/assets/images/icon.png" alt="" class="circle responsive-img valign profile-image">
              </div>
              <div class="col s6">By <a href="#">John Doe</a><br><span class="left"><?php if($row->ad_starttime>0):echo date('d M,y',$row->ad_starttime);endif;?></span></div>
            </div>
        </div>
		</div>
<?php endforeach;?>
		</div>

	</div>


	<?php endif; ?>



	<?php ?>

<?php if($count ==0): ?>

	<div class="col s6 offset-s3">
		<div class="card">
			<?php $id=0; foreach ($advertisements->result() as $row):$id = $row->ad_id;?>
			<div class="col s12">
			<div class="card-content">
				<div class=" col s11">

					<?php if($row->ad_type == 'free'):?>
		    		<a class="blue" style="color:white;padding:5px;border-radius:3px;" href="#!">Free  </a>  
					<?php endif;?>

					<?php if($row->ad_type == 'professional'):?>
		    		<a class="amber darken-4" style="color:white;padding:5px;border-radius:3px;" href="#!">Professional <i class="mdi-image-hdr-strong"></i> </a>  
					<?php endif;?>

					<?php if($row->ad_type == 'premium'):?>
		    		<a class="green" style="color:white;padding:5px;border-radius:3px;" href="#!">Premium <i class="mdi-social-mood"></i> </a>  
					<?php endif;


					if($this->session->id == $row->user_id):?>


					 &nbsp | &nbsp
					<a class="color" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/edit/').$row->ad_id;?>">Edit <i class="mdi-content-create"></i> </a>  
				<?php endif;?>
		    	</div>
		    	<br>
		    	
			<h4 class="flow-text grey-text text-darken-4"><a href="#" class="grey-text text-darken-4"><?php echo ucfirst($row->ad_name);?></b></a>
            </h4>
              
            <p class="row"><br>

              <span class="left"><a href=""><b>Category: <?php echo ucfirst($row->ad_cat);?></b></a></span><br>
              <span class="left"><a href=""><b>Sub Category: <?php echo ucfirst($row->ad_subcat);?></b></a></span>
            </p>
            <br>
            <p class="blog-post-content"><?php echo ucfirst($row->ad_desc);?></p>
            <h4>        ₹   <?php echo $row->ad_price;?> /-</h4>           
			<br>
            <div class="row">
              <div class="col s2">
                <img src="http://localhost/deepak/classyad/assets/images/icon.png" alt="" class="circle responsive-img valign profile-image">
              </div>
              <div class="col s6">By <a href="#">John Doe</a><br><span class="left"><?php if($row->ad_starttime>0):echo date('d M,y',$row->ad_starttime);endif;?></span></div>
            </div>
        </div>
		</div>
<?php endforeach;?>
		</div>

	</div>
</div>
</div>
<?php endif;?>


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