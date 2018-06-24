<section id="content">

	<div class="container">
	<div class="row">
		<div class="card card-gra">
		<div class="col s12 m8 l8">
			<div class="flow-text center"> Membership Plan Details</div>
			<div class="divider"></div>
			<div class="card-content">
				<table id="datatable-buttons" class="table striped table-bordered">
	                <thead >
		                <tr class="color white-text" >
		                    <th class="center" style="border-radius:0;">Sl.No</th>  
		                    <th class="center" style="border-radius:0;">Plan</th> 
		                    <th class="center" style="border-radius:0;">value</th>
		                    <th class="center" style="border-radius:0;">Description</th> 
		                    <th class="center" style="border-radius:0;">Action</th>   

		                </tr>
	                </thead>
	                <tbody>
                    <?php $i=0; foreach ($memplan->result() as $row):;?>
	                	<tr class="<?php if($row->type== 'free'):echo 'blue lighten-4'; elseif($row->type== 'professional'):echo 'amber lighten-3'; elseif($row->type== 'premium'):echo 'green lighten-3'; endif;?> color-text" style="border-bottom:1px white solid; -moz-box-shadow: inset 0 0 5px white;
		-webkit-box-shadow: inset 0 0 5px white;
		box-shadow: inset 0 0 5px white;">



		                    <td class="center" style="border-radius:0px;width:10% "><?php $i++ ; echo $i;?></td>
		                    <td class="center <?php if($row->type== 'free'):echo 'blue'; elseif($row->type== 'professional'):echo 'amber darken-3'; elseif($row->type== 'premium'):echo 'green'; endif;?>" style="color:white;border-radius:0px;width:10% ">



		                    	<?php echo ucfirst($row->type);?>
		                    		
		                    	</td>
		                    <td class="center" style="width:15%;text-align:justify;"><?php echo $row->value;?></td>
		                    <td class="center" style="width:38%;text-align:justify;"><?php echo $row->desp;?></td>
		                    <td class="center">
		                    	<a class="<?php if($row->type== 'free'):echo 'blue'; elseif($row->type== 'professional'):echo 'amber darken-3'; elseif($row->type== 'premium'):echo 'green'; endif;?> darken-4 white-text" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/memplan/edit/').$row->id;?>"> <i class="mdi-image-edit"></i></a>
		                    	<a class="red darken-4 white-text" style="color:white;padding:5px;border-radius:3px;" href="<?php echo base_url('index.php/memplan/delete/').$row->id;?>"> <i class="mdi-action-delete"></i></a>


		                    </td>
		                </tr>
                	<?php endforeach; ?>
	                </tbody>
	            </table>
			</div>
		</div>

		<div class="col s12 m4 l4">
			
				<div class="flow-text center"> Add Membership Plan</div>
				<div class="divider"></div>

				<div class="input-field col s12">
            	<div class="grey-text ultra-small">Membership Plan</div>
                    <select id="memplan">
                      <option value="" disabled>Membership Plan</option>
                      <option value="free" selected>Free</option>
                      <option value="professional">Professional</option>
                      <option value="premium">Premium</option>
                    </select>
                  </div>
                  <div class="card-content">
                	<div class="grey-text ultra-small">Description</div>

                  <div class="input-field">
						<input id="desc" class="placeholder_color" type="text"  placeholder="Write Something about your Membership Plan." value="">
					</div>

					<div class="btn center waves-effect waves-light color memPlanAdd-btn">submit</div>
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

	$('.memPlanAdd-btn').click(function(){
		var membershipPlan = $('select#memplan option:selected').val();
		var desc = $("#desc").val();
		console.log(membershipPlan);
		$.post("<?php echo base_url('index.php/memplan/add/');?>",'memplan='+membershipPlan+'&desc='+desc,function(msg){
			console.log(msg);
				if(msg.status == 'success'){
					 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
					 location.reload();
				}else{
					 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
				}
		});
	});
});
</script>