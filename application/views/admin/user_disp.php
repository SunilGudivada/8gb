<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
		<div class="col s12">
			<div class="flow-text center"> User Details</div>
			<div class="divider"></div>
			<div class="card-content">
				<table id="datatable-buttons" class="table striped table-bordered ultra-small">
	                <thead >
		                <tr>
		                    <th class="center">Sl.No</th>
		                    <th class="center">Username</th>
		                    <th class="center">Full Name</th>  
		                    <th class="center">Email</th>
		                    <th class="center">Phone</th>   
		                    <th class="center">Account Status</th>  
		                    <th class="center">Action</th>   

		                </tr>
	                </thead>
	                <tbody>
                    <?php $i=0; foreach ($user->result() as $row):;?>
	                	<tr>
		                    <td class="center"><?php $i++ ; echo $i;?></td>
		                    <td class="center"><?php echo $row->username;?></td>
		                    <td class="center"><?php echo $row->firstname.' '.$row->middlename.' '.$row->lastname;?></td>
		                    <td class="center"><?php echo $row->email;?></td>
		                    <td class="center"><?php echo $row->phone;?></td>
		                    <td class="center">

		                    	<?php if($row->e_status ==1):?>
		                    	<a class="blue" style="color:white;padding:5px;border-radius:3px;" href="#!">Not verified <i class="mdi-av-not-interested"></i></a>
		                    	<?php endif; ?>
		                    	<?php if($row->e_status ==0):?>
		                    	<a class="amber darken-3" style="color:white;padding:5px;border-radius:3px;" href="#!">Verified <i class="mdi-action-verified-user"></i></a>
		                    	<?php endif; ?>

		                    	</td>
		                    	
		                    	<td class="center">

		                    	<?php if($row->status ==1):?>
		                    	<a class="green" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/user/block/').$row->id;?>">Block <i class="mdi-av-not-interested"></i></a>
		                    	<?php endif; ?>
		                    	<?php if($row->status == 2):?>
		                    	<a class="red" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/user/unblock/').$row->id;?>">Unblock <i class="mdi-av-replay"></i></a>
		                    	<?php endif; ?>
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