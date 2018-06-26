<section id="content">

	<div class="container">
	<div class="row">
		<div class="card">
		<div class="col s12">
			<div class="flow-text center"> Transaction Details</div>
			<div class="divider"></div>
			<div class="card-content">
				<table id="datatable-buttons" class="table striped table-bordered ">
	                <thead >
		                <tr class="color white-text" >
		                    <th class="center" style="border-radius:0;">Sl.No</th>  
		                    <th class="center" style="border-radius:0;">Item Id</th> 
		                    <th class="center" style="border-radius:0;">Item Title</th>
		                    <th class="center" style="border-radius:0;">Payment Id</th> 
		                    <th class="center" style="border-radius:0;">AmountPaid <br>( in INR )</th>
		                    <th class="center" style="border-radius:0;">Payment Url</th>   
		                    <th class="center" style="border-radius:0;">Status</th>  
		                    <th class="center" style="border-radius:0;">Action</th>   

		                </tr>
	                </thead>
	                <tbody>
                    <?php $i=0; foreach ($transactions->result() as $row):;?>
	                	<tr class="<?php if($row->ad_type== 'free'):echo 'blue lighten-4'; elseif($row->ad_type== 'professional'):echo 'amber lighten-3'; elseif($row->ad_type== 'premium'):echo 'green lighten-3'; endif;?>" style="border-bottom:1px white solid; -moz-box-shadow: inset 0 0 5px white;
		-webkit-box-shadow: inset 0 0 5px white;
		box-shadow: inset 0 0 5px white;">



		                    <td class="center"><?php $i++ ; echo $i;?></td>
		                    <td class="center <?php if($row->ad_type== 'free'):echo 'blue'; elseif($row->ad_type== 'professional'):echo 'amber darken-3'; elseif($row->ad_type== 'premium'):echo 'green'; endif;?>" style="color:white;padding:5px;border-radius:0px">



		                    	<?php echo ucfirst($row->ad_id);?>
		                    		
		                    	</td>
		                    <td class="center" style="text-align:justify;"><?php echo $row->ad_name;?></td>
		                    <td class="center" style="text-align:justify;"><?php echo $row->t_payment_id;?></td>
		                    <td class="center" style="text-align:justify;"><?php echo $row->t_amt;?></td>
		                    <td class="center"><b><?php if(!$row->t_payment_id):echo $row->t_url;else: echo '<span class="red-text">Link Not Active</span>';endif;?></b></td>
		                    <td class="center"><?php if($row->status == 0):?>
						    		<a class="red" style="color:white;padding:5px;border-radius:3px;" >Yet to confirm <i class="mdi-action-visibility-off"></i> </a>  
									<?php endif;?>

									<?php if($row->status == 1):?>
						    		<a class="green darken-2" style="color:white;padding:5px;border-radius:3px;">Payment Verified <i class="mdi-editor-insert-emoticon"></i> </a>  
									
								<?php endif;?></td>
								<td class="center"><?php if($row->status == 0):?>
						    		<div class="color btn-cnf waves-effect waves-light" data-id="<?php echo $row->t_id;?>" style="color:white;padding:5px;border-radius:3px;cursor:pointer;">Confirm <i class="mdi-content-send"></i> </div>  
									<?php endif;?>

									<?php if($row->status == 1):?>
						    		<div class="grey disabled" style="color:white;padding:5px;border-radius:3px;">Confirm <i class="mdi-content-send"></i></div>  
									
								<?php endif;?></td>
		                    
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

	$('.btn-cnf').click(function(){
		var id = $(this).data('id');
		var data = 'id='+id;
		$.post("<?php echo base_url('index.php/transaction/cnfTrans/');?>",data,function(msg){
			if(msg.status == 'success'){
				 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
				 location.reload();
			}else{
				 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
			}
		})

	})
});
</script>