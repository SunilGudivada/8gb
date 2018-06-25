<section id="content">

	<div class="container">
	<div class="row">
		<div class="center">
			<span class="flow-text">Preview your advertisement</span>
		</div>
	<?php $id=0; foreach ($advertisement->result() as $row):$id = $row->ad_id;$type=$row->ad_type;?>	
		<div class="card col s10 offset-s1">
		<div class="col s5"><br>
			<div class="card-image waves-effect waves-light"> 
				<img src="<?php echo base_url('assets/images/gallary/4.jpg');?>" class="multiple-images">
			</div><br><br>			
		</div>

		<div class="col s5">
			<div class="card-content">
				
		    	
			<h4 class="flow-text grey-text text-darken-4"><a href="#" class="grey-text text-darken-4"><?php echo ucfirst($row->ad_name);?> | <b><?php echo ucfirst($row->ad_type); ?></b></a>
            </h4>
              
            <p class="row">

              <span class="left"><a href=""><b>Category: <?php echo ucfirst($row->ad_cat);?></b></a></span><br>
              <span class="left"><a href=""><b>Sub Category: <?php echo ucfirst($row->ad_subcat);?></b></a></span>
            </p>
            <br>
            <p class="blog-post-content"><?php echo ucfirst($row->ad_desc);?></p>
            <h4>        ₹   <?php echo $row->ad_price;?> /-</h4>           
			<br>
        </div>
		</div>
		</div>
<?php endforeach;?>
	</div>
<div class="center">
<div class="btn btn-large color flow-text waves-effect waves-light btn-cnf">COnfirm & Pay <i class="mdi-content-send"></i></div>
</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
		$(".picker__weekday-display").addClass('red amber-4');
	},1000);

		$(".btn-cnf").click(function(){
			location.href="<?php echo base_url('index.php/advts/payRequest/').$id.'/'.$type;?>";
		});
	});
</script>