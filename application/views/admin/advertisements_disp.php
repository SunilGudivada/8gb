<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
		<div class="col s12">
			<div class="flow-text center"> Advertisement Details</div>
			<div class="divider"></div>
			<div class="card-content">
				<table id="datatable-buttons" class="table striped table-bordered ultra-small">
	                <thead >
		                <tr>
		                    <th class="center">Sl.No</th>
		                    <th class="center">Title</th>
		                    <th class="center">Description</th>  
		                    <th class="center">Price</th>
		                    <th class="center">Category</th>   
		                    <th class="center">Sub Category</th>  
		                    <th class="center">Plan</th> 
		                    <th class="center">Status</th>   
		                    <th class="center">Action</th>   

		                </tr>
	                </thead>
	                <tbody>
                    <?php $i=0; foreach ($advertisements->result() as $row):;?>
	                	<tr>
		                    <td class="center"><?php $i++ ; echo $i;?></td>
		                    <td class="center" style="width:15%;text-align:justify;"><?php echo $row->ad_name;?></td>
		                    <td class="center" style="width:28%;text-align:justify;"><?php echo $row->ad_desc;?></td>
		                    <td class="center"><?php echo $row->ad_price;?></td>
		                    <td class="center"><?php echo $row->ad_cat;?></td>
		                    <td class="center" style="width:10%;"><?php echo $row->ad_subcat;?></td>
		                    <td class="center"><?php echo $row->ad_type;?></td>
		                    <td class="center">

		                    	<?php if($row->ad_status == 0):?>
						    		<a class="red" style="color:white;padding:5px;border-radius:3px;" href="#!">Yet to Approve <i class="mdi-action-visibility-off"></i> </a>  
									<?php endif;?>

									<?php if($row->ad_status == 1):?>
						    		<a class="amber darken-4" style="color:white;padding:5px;border-radius:3px;" href="#!">Inprogress <i class="mdi-image-hdr-strong"></i> </a>  
									<?php endif;?>

									<?php if($row->ad_status == 2):?>
						    		<a class="green" style="color:white;padding:5px;border-radius:3px;" href="#!">Live <i class="mdi-social-mood"></i> </a>  
									<?php endif;?>

									</td>
		                    <td class="center">
		                    	<a class="green white-text" style="color:white;padding:5px;border-radius:3px;margin-bottom:5px;" href="<?php echo base_url('index.php/advts/view/').$row->ad_id;?>"><i class="mdi-image-remove-red-eye"></i></a>

		                    	<a class="blue darken-4 white-text" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/edit/').$row->ad_id;?>"> <i class="mdi-image-edit"></i></a>


		                    	<?php if($row->ad_action == 0):?>
		                    	<a class="red white-text" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/archive/').$row->ad_id;?>"><i class="mdi-notification-dnd-forwardslash"></i></a>

		                    <?php endif; ?>

		                    <?php if($row->ad_action == 1):?>
		                    	<a class="amber darken-4 white-text" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/advts/unarchive/').$row->ad_id;?>"><i class="mdi-notification-dnd-forwardslash"></i></a>

		                    <?php endif; ?>


		                    </td>
		                </tr>
                	<?php endforeach; ?>
	                </tbody>
	            </table>
			</div>
		</div>
		
	</div>
	</div>
</div>

</section>

<script tyep="text/javascript">
$(document).ready(function(){
	setTimeout(function(){
	     $('.dataTables_filter').css('float','right');       
	     $('#datatable-buttons_paginate').css('float','right');
	     $('.dataTables_filter').addClass('ultra-small');       
	     $('#datatable-buttons_paginate').addClass('ultra-small');      
	},1000);
});
</script>