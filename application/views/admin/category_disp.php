<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
		<div class="col s7">
			<div class="flow-text center"> Category Details</div>
			<div class="divider"></div>
			<div class="card-content">
				<table id="datatable-buttons" class="table striped table-bordered">
	                <thead >
		                <tr>
		                    <th class="center">Sl.No</th>
		                    <th class="center">Name</th>
		                    <th class="center">Action</th>   

		                </tr>
	                </thead>
	                <tbody>
                    <?php $i=0; foreach ($cat->result() as $row):;?>
	                	<tr>
		                    <td class="center"><?php $i++ ; echo $i;?></td>
		                    <td class="center"><?php echo $row->cat_name;?></td>
		                    <td class="center"><a class="blue" style="color:white;padding:8px;border-radius:3px;" href="<?php echo base_url('index.php/category/edit/').$row->id;?>">Edit <i class="mdi-content-create"></i></a> | <a class="red" style="color:white;padding:8px;border-radius:3px;" href="<?php echo base_url('index.php/category/delete/').$row->id;?>">Delete <i class="mdi-action-delete"></i></a></td>
		                </tr>
                	<?php endforeach; ?>
	                </tbody>
	            </table>
			</div>
		</div>
		<!-- <div class="col s5"><br><br><br><br><br><br>
			<div class="flow-text center"> Add Category </div>
			<div class="divider"></div>
			<form id="addcategoryform">
			<div class="input-field col s12 p-row">
	            <label for="catname">Category Name *</label>
	            <input id="catname" name="catname" type="text" data-error=".errorTxt1" required="" aria-required="true">
	            <div class="errorTxt1 ultra-small red-text text-accent-4"></div>
	        </div>
	        <div class="input-field col s12 p-row">
	            <label for="catid">Category Id *</label>
	            <input id="catid" type="text" name="catid" data-error=".errorTxt2" required="" aria-required="true">
	            <div class="errorTxt2 ultra-small red-text text-accent-4"></div>
	        </div>
	    	<div class="preloader-wrapper small active right" id="cat_loader">
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
	        <div class="btn waves-effect waves-light color right" id="catadd">Add Category
                    <i class="mdi-content-send right"></i>
                </div>

	    	</form>
		</div> -->
	</div>
	</div>
</div>

</section>

<script tyep="text/javascript">
	$(document).ready(function(){
	            $("#cat_loader").hide();

	$("#catadd").click(function(){
            var data = $("#addcategoryform").serialize();
            console.log(data);
            $("#catadd").hide();
            $("#cat_loader").show();
            
            $.post("<?php echo base_url('index.php/category/add');?>",data,function(msg){
                    if(msg.status == 'success'){
                        Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
                        location.reload();
                    }else if(msg.status == 'failure'){
                         Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
                        $("#catadd").show();
                        $("#cat_loader").hide();
                    }
            });
        });

});
</script>