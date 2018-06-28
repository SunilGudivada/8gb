<section id="content">

	<div class="container">
	<div class="row">
		<div class="col s10 offset-s1">
		<div class="card">
	<?php $id=0; foreach ($advertisements->result() as $row):$id = $row->ad_id;$status =$row->ad_status;
	if($this->session->id == $row->user_id):
if($status==2):
?>
		<div class="col s12 m6 l6"><br>
			<div class="card-image waves-effect waves-light">
				<?php $j=0;foreach ($images->result() as $image):$j++;?> 
				<img src="<?php echo base_url('assets/images/upload/'.$image->img_value);?>" id="<?php echo $j;?>_img" class="multiple-images <?php if($j>1):echo 'hide';endif;?>">
				<?php endforeach;?>
				<?php if($j==0):?>
					<img src="<?php echo base_url('assets/images/default.png');?>">
					<p class="red-text center"><b>This is the default image.This will be removed automatically when you upload an image.</b></p>
				<?php endif;?>
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
					<?php if($j<$countMaxImages):?>
					<a href="<?php echo base_url('index.php/advts/upload/').$id;?>"> <div class="waves-effect waves-light">
					<img src="<?php echo base_url('assets/images/add.png');?>" style="width:10vh;height:10vh;" alt="" class="circle responsive-img valign"></div></a>
				<?php  endif;?>
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

		    		<?php endif;?>

		    		<?php if($row->ad_action == 1):?>
		    		<a class="red" style="color:white;padding:5px;border-radius:3px;" href="#!" >Archived<i class="mdi-notification-dnd-forwardslash"></i> </a>
		    		<?php endif;?>

		    	</div>
		    	<br>
     
<a class="green right update" style="color:white;padding:5px;border-radius:3px;" href="#!">Update <i class="mdi-content-send"></i> </a><div class="preloader-wrapper small active right loader">
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
                </div><br>

            <div id="step1" class="col s12 color-text">


            			<div class="row">
                        <div class="col s12 red-text"> <b> Please Select your category</b></div>
                        <div class="input-field col s8">
                         
                        <select id="adcategory">
	                      <option value="" disabled>Category</option>
	                      <option value="motor" <?php if($row->ad_cat == 'motor'): echo 'selected';endif;?>>Motor</option>
	                      <option value="classifieds" <?php if($row->ad_cat == 'classifieds'): echo 'selected';endif;?>>Classifieds</option>
	                      <option value="rent" <?php if($row->ad_cat == 'rent'): echo 'selected';endif;?>>Property For Rent</option>
	                      <option value="sale" <?php if($row->ad_cat == 'sale'): echo 'selected';endif;?>>Property for Sale</option>
	                      <option value="jobs" <?php if($row->ad_cat == 'jobs'): echo 'selected';endif;?>>Jobs</option>
	                      <option value="community" <?php if($row->ad_status == 'community'): echo 'selected';endif;?>>Community</option>
	                    </select>

                        </div>
                      </div>

                      <div class="row">
                        <div class="col s12 red-text"> <b> Please select your sub category</b></div>
                        <div class="input-field col s8">
                         
                        <select id="adsubcategory" class="motor <?php if($row->ad_cat != 'motor'): echo 'hide';endif;?> adsubcategory">
	                       <option value="" disabled>Please select your sub category</option>
	                      <?php foreach($subcat->result() as $scat):

	                      	if($scat->cat_name == 'motor'):
	                      	?>

	                      <option value="<?= $scat->cat_name ?>"<?php if($row->ad_subcat == $scat->subcat_name): echo 'selected';endif;?>><?= $scat->subcat_name ?></option>
	                  	<?php endif; endforeach;?>
	                    </select>

	                    <select id="adsubcategory" class="classifieds <?php if($row->ad_cat != 'classifieds'): echo 'hide';endif;?> adsubcategory">
	                       <option value="" disabled>Please select your sub category</option>
	                      <?php foreach($subcat->result() as $scat):

	                      	if($scat->cat_name == 'classifieds'):
	                      	?>

	                      <option value="<?= $scat->cat_name ?>"<?php if($row->ad_subcat == $scat->subcat_name): echo 'selected';endif;?>><?= $scat->subcat_name ?></option>
	                  	<?php endif; endforeach;?>
	                    </select>

	                    <select id="adsubcategory" class="rent <?php if($row->ad_cat != 'rent'): echo 'hide';endif;?> adsubcategory">
	                       <option value="" disabled>Please select your sub category</option>
	                      <?php foreach($subcat->result() as $scat):

	                      	if($scat->cat_name == 'rent'):
	                      	?>

	                      <option value="<?= $scat->cat_name ?>" <?php if($row->ad_subcat == $scat->subcat_name): echo 'selected';endif;?>><?= $scat->subcat_name ?></option>
	                  	<?php endif; endforeach;?>
	                    </select>


	                    <select id="adsubcategory" class="sale <?php if($row->ad_cat != 'sale'): echo 'hide';endif;?> adsubcategory">
	                       <option value="" disabled>Please select your sub category</option>
	                      <?php foreach($subcat->result() as $scat):

	                      	if($scat->cat_name == 'sale'):
	                      	?>

	                      <option value="<?= $scat->cat_name ?>" <?php if($row->ad_subcat == $scat->subcat_name): echo 'selected';endif;?>><?= $scat->subcat_name ?></option>
	                  	<?php endif; endforeach;?>
	                    </select>

	                    <select id="adsubcategory" class="jobs <?php if($row->ad_cat != 'jobs'): echo 'hide';endif;?> adsubcategory">
	                       <option value="" disabled>Please select your sub category</option>
	                      <?php foreach($subcat->result() as $scat):

	                      	if($scat->cat_name == 'jobs'):
	                      	?>

	                      <option value="<?= $scat->cat_name ?>" <?php if($row->ad_subcat == $scat->subcat_name): echo 'selected';endif;?>><?= $scat->subcat_name ?></option>
	                  	<?php endif; endforeach;?>
	                    </select>

	                     <select id="adsubcategory" class="community <?php if($row->ad_status != 'community'): echo 'hide';endif;?> adsubcategory">
	                       <option value="" disabled>Please select your sub category</option>
	                      <?php foreach($subcat->result() as $scat):

	                      	if($scat->cat_name == 'community'):
	                      	?>

	                      <option value="<?= $scat->cat_name ?>" <?php if($row->ad_subcat == $scat->subcat_name): echo 'selected';endif;?>><?= $scat->subcat_name ?></option>
	                  	<?php endif; endforeach;?>
	                    </select>

                        </div>
                      </div>

                      <script>
                      	
                      	$(function() {
						    $("#adcategory").on('change', function() {
						    	$('.adsubcategory').addClass('hide');
						    	var id = $(this).val();

						    	$('.'+id).removeClass('hide');
						        $('#adsubcategory').val(id);

						        // re-initialize material-select
						        $('#adsubcategory').material_select();
						    });
						});
                      </script>


                      <div class="row">
                        <div class="col s12 red-text"><b> What are you advertising? </b></div>
                        <div class="input-field col s8">
                            <input id="adname" name="adname" class="placeholder_color" type="text" data-error=".errorTxt1" placeholder="House for rent" value="<?= $row->ad_name?>">
                            <div class="errorTxt1"></div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col s12 red-text"> <b> Price </b> </div>
                        <div class="input-field col s8">
                            <input id="price" name="price" class="placeholder_color" type="number" data-error=".errorTxt1" placeholder="200"value="<?= $row->ad_price?>">
                            <div class="errorTxt1"></div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col s12 red-text"> <b> Describe your Advertisement </b></div>
                        <div class="input-field col s8">
                          <textarea id="desc" class="materialize-textarea placeholder_color" placeholder="Write Something about your advertisement."><?= $row->ad_desc?></textarea>
                        </div>
                      </div>

        	</div>
		</div>
		<?php else: ?>
			<div class="card-content red lighten-4 red-text flow-text center"><i class="mdi-av-not-interested" ></i> <br>Permission Denied.<br>Advertisement not approved yet. <br> <span class="ultra-small" ><b><a href="<?php echo base_url('index.php/profile');?>">Click here.</a> to view your profile.</b></span></div>


<?php  endif; else:  ?>
<div class="card-content red lighten-4 red-text flow-text center"><i class="mdi-av-not-interested" ></i> <br>Permission Denied.<br> <span class="ultra-small" ><b><a href="<?php echo base_url('index.php/profile');?>">Click here.</a> to view your profile.</b></span></div>
<?php endif;endforeach;?>
		</div>
	</div>
</div>
	</div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$('.loader').addClass('hide');


		$(".updateadd").click(function(){
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


<script type="text/javascript">
            $(document).ready(function(){
                $(".sub-category").hide();
                var temp_id = '';
                var category_input = 'motor';
                $(".input-category").click(function(){

                  //Hide Please select your category first message
                  $('.select-category-first').hide();

                  //getting data of the category on Click
                   category_input = $(this).data('category');

                  //All Subcategories and categories reinitiation
                  $(".sub-category").hide();
                  $(".input-category").css('border','0px white solid');
                  
                  //Adding CSS to the selected category
                  $(this).css('border','3px white solid');

                  //Display subcategory of the selected Category
                  $("#"+category_input).show();

                });

                function validate_details(adName,adPrice,adDesc,adCat,adSubcat){

                  if(adName != '' && adPrice != '' && adDesc != '' && adCat != ''){
                    if(adSubcat)
                    {
                       $("#step2").removeClass("disabled"), $("ul.tabs").tabs(), $("ul.tabs").tabs("select_tab", "step2");
                       var str = "adname="+adName+"&desc="+adDesc + "&price=" + adPrice + "&cat=" + adCat + "&subcat="+adSubcat;
                       
                       $.post('<?php echo base_url("index.php/advts/update/").$id;?>',str,function(msg){
                        if(msg.status == 'success'){
                          temp_id = msg.tempid;
                          Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
                          		$('.loader').addClass('hide');
                          		$('.update').removeClass('hide');

                          }else{
                            Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
                            		$('.loader').addClass('hide'); 
                            		$('.update').removeClass('hide');


                          }
                       }

                        );
                    }
                    else
                    {
                      Materialize.toast('<span class="white-text">Something went wrong, Please try again.</span>', 5e3, "red");
                      		$('.loader').addClass('hide');
                      		$('.update').removeClass('hide');


                    }
                  }else{
                      Materialize.toast('<span class="white-text">Something went wrong, Please try again.</span>', 5e3, "red");
                      		$('.loader').addClass('hide');
                      		$('.update').removeClass('hide');



                  }

                }

                $('.update').click(function(){
                	
                  $('.loader').removeClass('hide');
                  $('.update').addClass('hide');

                  var adname = $("#adname").val();
                  var price = $("#price").val();
                  var desc = $("#desc").val();
                  var cat = $('select#adcategory option:selected').val();
                  var sub_cat = $('select.'+cat+' option:selected').text();
                   var str = "adname="+adname+"&desc="+desc + "&price=" + price + "&cat=" + cat + "&subcat="+sub_cat;
                      
                  validate_details(adname,price,desc,cat,sub_cat);
                });

              });
          </script>