<?php
  $id = $this->uri->segment(3);
?>
<div class="tb-main-content-wrap"  ng-controller="singlemovieCtrl" ng-init="actors_details(<?php echo $id;?>)">
	<div class="actor_background">
		<div class="tb-search-box-wrap actors">
			<div class="actor_details">
				<div class="actor_pic">
					<img ng-src="{{go_image_path(actors.image)}}"> 
				</div>
				<div class="actor_name">{{actors.actors_name}}</div>
				<div class="actor_type">{{actors.role_name}}</div>
			</div>
		</div>
	</div>
	<div class="free_height"></div>
	<div class="container">
		<div class="tb-search-box-wrap">
			<div class="actor_descript">
				<p>{{actors.description}}</p>
				
			</div>
		</div>
	</div>

</div>