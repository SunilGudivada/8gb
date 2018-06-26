<section id="content">

	<div class="container">
		<div class="row">
			<div class="col s12 m6 l3 waves-effect waves-light">
	            <div class="card center ">
	                <div class="card-content green white-text">
	                	<i class="mdi-action-face-unlock flow-text"></i>
	                    <h4 class="card-stats-number"><?php foreach($totalUsers->result() as $row): $tcount = $row->count; echo $tcount; endforeach;?></h4>
	                    <p class="card-stats-title "> Total Users</p>
	                </div>
	            </div>
	        </div>
	        <div class="col s12 m6 l3 waves-effect waves-light">
	            <div class="card center">
	                <div class="card-content purple white-text">
	                	<i class="mdi-social-group-add flow-text"></i>
	                    <h4 class="card-stats-number"><?php foreach($newSignUps->result() as $row): echo ( $tcount) -$row->count;endforeach;?></h4>
	                    <p class="card-stats-title"> New Sign Ups</p>
	                </div>
	            </div>
	        </div>                            
	        <div class="col s12 m6 l3 waves-effect waves-light">
	            <div class="card center">
	                <div class="card-content blue-grey white-text">
	                	<i class="mdi-maps-layers flow-text"></i> 
	                    <h4 class="card-stats-number "><?php foreach($totalRevenue->result() as $row): $tcount = $row->count; echo $tcount; endforeach;?></h4>
	                    <p class="card-stats-title">Total Revenue</p>
	                </div>
	            </div>
	        </div>
	        <div class="col s12 m6 l3 waves-effect waves-light">
	            <div class="card center">
	                <div class="card-content indigo white-text">
	                	<i class="mdi-maps-layers flow-text"></i>
	                    <h4 class="card-stats-number"><?php foreach($todayRevenue->result() as $row): echo $tcount - $row->count; endforeach;?></h4> 
	                    <p class="card-stats-title">Today Revenue</p>
	                </div>
	            </div>
	        </div>           
		</div>

		<div class="row">

	        <div class="col s12 m6 l3 waves-effect waves-light">
	            <div class="card center">
	                <div class="card-content deep-purple white-text">
	                	<i class="mdi-editor-insert-drive-file flow-text"></i>
	                    <h4 class="card-stats-number"><?php foreach($totalAdvertisments->result() as $row): $tcount = $row->count; echo $tcount; endforeach;?></h4> 
	                    <p class="card-stats-title">Total Advertisements</p>
	                </div>
	            </div>
	        </div> 

			<div class="col s12 m6 l3 waves-effect waves-light">
	            <div class="card center">
	                <div class="card-content  blue white-text">
	                	<i class="mdi-editor-insert-drive-file flow-text"></i> 
	                    <h4 class="card-stats-number"><?php foreach($freeAdvertisements->result() as $row): $tcount = $row->count; echo $tcount; endforeach;?></h4>
	                    <p class="card-stats-title">Free Advertisements</p>
	                </div>
	            </div>
	        </div>
	        <div class="col s12 m6 l3 waves-effect waves-light">
	            <div class="card center">
	                <div class="card-content lime darken-3 white-text">
	                	<i class="mdi-editor-insert-drive-file flow-text"></i>
	                    <h4 class="card-stats-number"><?php foreach($professionalAdvertisments->result() as $row): $tcount = $row->count; echo $tcount; endforeach;?></h4>
	                    <p class="card-stats-title">Professional Advertisments</p>
	                </div>
	            </div>
	        </div>                            
	        <div class="col s12 m6 l3 waves-effect waves-light">
	            <div class="card center">
	                <div class="card-content green white-text">
	                	<i class="mdi-editor-insert-drive-file flow-text"></i>
	                    <h4 class="card-stats-number"><?php foreach($premiumAdvertisements->result() as $row): $tcount = $row->count; echo $tcount; endforeach;?></h4>
	                    <p class="card-stats-title"> Premium Advertisments</p>
	                </div>
	            </div>
	        </div>          
		</div>


	</div>
</section>