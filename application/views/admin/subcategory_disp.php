<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
		<div class="col s6">
			<div class="flow-text center"> Sub Category Details</div>
			<div class="divider"></div>
			<div class="card-content">
				<table id="datatable-buttons" class="table striped table-bordered">
	                <thead >
		                <tr>
		                    <th class="center">Sl.No</th>
		                    <th class="center">Name</th>
		                    <th class="center">Category</th>
		                    <th class="center">Action</th>   

		                </tr>
	                </thead>
	                <tbody>
                    <?php $i=0; foreach ($subcat->result() as $row):;?>
	                	<tr>
		                    <td class="center"><?php $i++ ; echo $i;?></td>
		                    <td class="center"><?php echo $row->subcat_name;?></td>
		                    <td class="center"><?php echo $row->cat_name;?></td>
		                    <td class="center"><a class="blue" style="color:white;padding:8px;border-radius:3px;" href="<?php echo base_url('index.php/subcategory/edit/').$row->subcat_id;?>">Edit <i class="mdi-content-create"></i></a> | <a class="red" style="color:white;padding:8px;border-radius:3px;" href="<?php echo base_url('index.php/subcategory/delete/').$row->subcat_id;?>">Delete <i class="mdi-action-delete"></i></a></td>
		                </tr>
                	<?php endforeach; ?>
	                </tbody>
	            </table>
			</div>
		</div>
		<div class="col s6"><br><br><br><br><br><br>
			<div class="flow-text center"> Add Sub Category </div>
			<div class="divider"></div>
			<form id="addsubcategoryform">
			<div class="input-field col s12 p-row">
	            <label for="subcatname">Sub Category Name *</label>
	            <input id="subcatname" name="subcatname" type="text" data-error=".errorTxt1" required="" aria-required="true">
	            <div class="errorTxt1 ultra-small red-text text-accent-4"></div>
	        </div>

	        <div class="input-field col s8">
                         
                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="motor">
                                <img src="<?php echo base_url('assets/images/icons/motor_big.PNG');?>" style="width:100%;height:100%;">
                              </div>
                            </div>
                         
                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="classifieds">
                                <img src="<?php echo base_url('assets/images/icons/classifieds_big.PNG');?>" style="width:100%;height:100%;">
                              </div>
                            </div>
                          
                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="p_rent">
                                <img src="<?php echo base_url('assets/images/icons/p_rent_big.PNG');?>" style="width:100%;height:100%;">
                              </div>
                            </div>

                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="p_sale">
                                <img src="<?php echo base_url('assets/images/icons/p_sale_big.PNG');?>" style="width:100%;height:100%;">
                              </div>
                            </div>

                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="jobs">
                                <img src="<?php echo base_url('assets/images/icons/jobs_big.PNG');?>" style="width:100%;height:100%;">
                              </div>
                            </div>
                          
                            <div class="col s2">
                              <div class="card card-gra red accent-4 waves-effect waves-light input-category" data-category="community">
                                <img src="<?php echo base_url('assets/images/icons/community_big.PNG');?>" style="width:100%;height:100%;">
                              </div>
                            </div>

                        </div>
                        <br>
	    	<div class="preloader-wrapper small active right" id="loader">
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
	        <div class="btn waves-effect waves-light color right" id="subcatadd">Submit
                    <i class="mdi-content-send right"></i>
                </div>

	    	</form>
		</div>
	</div>
	</div>
</div>

</section>

<script tyep="text/javascript">
	$(document).ready(function(){
	
	$("#loader").hide();

	$(".input-category").click(function(){

	  //getting data of the category on Click
	   category_input = $(this).data('category');

	  //All categories reinitiation
	  $(".input-category").css('border','0px white solid');
	  
	  //Adding CSS to the selected category
	  $(this).css('border','3px #d50000 solid');


	});

	$("#subcatadd").click(function(){
            var data = $("#addsubcategoryform").serialize();
            data = data + "&catId=" + category_input;
            console.log(data);
            $("#catadd").hide();
            $("#loader").show();
            
            $.post("<?php echo base_url('index.php/subcategory/add');?>",data,function(msg){
            	console.log(msg);
                    if(msg.status == 'success'){
                        Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
                        location.reload();
                    }else if(msg.status == 'failure'){
                         Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
                        $("#catadd").show();
                        $("#loader").hide();
                    }
            });
        });



});
</script>