<section id="content">

	<div class="container">
	<div class="row">
		<div class="card card-gra">
			<div class="col s8 offset-s2">
				<div class="flow-text center"> Membership Plan Edit</div>
				<div class="divider"></div>

				<div class="col s6 offset-s3" style="margin-bottom:10px;">
				<?php foreach($memplan->result() as $row):$id=$row->id;?>
					<br>
					<?php echo $row->value;?>
					<div class="input-field">
						<input id="desc" class="placeholder_color" type="text" value="<?php echo $row->desp;?>" placeholder="Write Something about your Membership Plan.">
					</div>
					<div class="btn waves-effect waves-light color memplan-btn">submit</div>
				<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>

<script>
	$(document).ready(function(){
		$('.memplan-btn').click(function(){
			var data = $('#desc').val();
			$.post("<?php echo base_url('index.php/memplan/update/').$id;?>",'value='+data,function(msg){
				if(msg.status == 'success'){
					 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "green");
					 location.href= "<?php echo base_url('index.php/dashboard/memplan');?>";
				}else{
					 Materialize.toast('<span class="white-text">'+msg.desc+'</span>', 5e3, "red");
				}
			})
		});
	});
</script>