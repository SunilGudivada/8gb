<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
	<?php $i=0; foreach ($advertisements->result() as $row):;?>	
		<div class="col s6"><br>
			<div class="card-image">
				<img src="<?php echo base_url('assets/images/gallary/3.jpg');?>">
			</div><br>
			<div class="row">
              <div class="col s2">
                <img src="http://localhost/deepak/classyad/assets/images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
              </div>
              <div class="col s6">By <a href="#">John Doe</a><br><span class="left">18th June, 2015</span></div>
            </div>
		</div>

		<div class="col s6">
			<div class="card-content">
				<div class=" col s9">

					<?php if($row->ad_status == 0):?>
		    		<a class="green" style="color:white;padding:5px;border-radius:3px;" href="#!">Approve <i class="mdi-navigation-arrow-forward"></i> </a>  
					<?php endif;?>

					<?php if($row->ad_status == 1):?>
		    		<a class="amber darken-4" style="color:white;padding:5px;border-radius:3px;" href="#!">Inprogress <i class="mdi-image-hdr-strong"></i> </a>  
					<?php endif;?>

					<?php if($row->ad_status == 2):?>
		    		<a class="blue" style="color:white;padding:5px;border-radius:3px;" href="#!">Live <i class="mdi-social-mood"></i> </a>  
					<?php endif;?>



		    		&nbsp|

		    		<a class="green accent-4" style="color:white;padding:5px;border-radius:3px;" href="#!">Edit <i class="mdi-content-create"></i> </a> 

		    		&nbsp | 


		    		<?php if($row->ad_action == 0):?>
		    		<a class="indigo drken-4" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/archive/').$row->ad_id;?>">Archive <i class="mdi-notification-dnd-forwardslash"></i> </a>
		    		<?php endif;?>

		    		<?php if($row->ad_action == 1):?>
		    		<a class="red" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/unarchive/').$row->ad_id;?>">UnArchive <i class="mdi-notification-dnd-forwardslash"></i> </a>
		    		<?php endif;?>


		    	</div>
		    	<br>
			<h4 class="flow-text grey-text text-darken-4"><a href="#" class="grey-text text-darken-4"><?php echo ucfirst($row->ad_name);?></a>
            </h4>
            <p class="row">
              <span class="left"><a href=""><b>Category: <?php echo ucfirst($row->ad_cat);?></b></a></span>
              <span class="left"><a href=""><b>Sub Category: <?php echo ucfirst($row->ad_subcat);?></b></a></span>
            </p>
            <br>
            <p class="blog-post-content"><?php echo ucfirst($row->ad_desc);?></p>
            <h4>        ₹   <?php echo $row->ad_price;?> /-</h4>
			<span class="left"><a href=""><b>Membership Plan: <?php echo ucfirst($row->ad_type);?></b></a></span>            

            
        </div>
		</div>
<?php endforeach;?>
		</div>
	</div>
	</div>
</section>