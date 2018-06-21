<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
		<div class="col s12">
			<div class="flow-text center"> Contact Form Details</div>
			<div class="divider"></div>
			<div class="card-content">
				<table id="datatable-buttons" class="table striped table-bordered">
	                <thead >
		                <tr>
		                    <th class="center">Sl.No</th>
		                    <th class="center">Name</th>
		                    <th class="center">Email</th>  
		                    <th class="center">Description</th>
		                    <th class="center">Time</th>   

		                </tr>
	                </thead>
	                <tbody>
                    <?php $i=0; foreach ($contact->result() as $row):;?>
	                	<tr>
		                    <td class="center"><?php $i++ ; echo $i;?></td>
		                    <td class="center"><?php echo $row->Name;?></td>
		                    <td class="center"><?php echo $row->Email_id;?></td>
		                    <td class="center" style="width:50%"><?php echo $row->Description;?></td>
		                    <td class="center"><?php echo $row->time;?></td>
		                    
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
	},1000);
});
</script>