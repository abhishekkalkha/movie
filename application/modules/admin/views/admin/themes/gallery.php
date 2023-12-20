<?php

?>
<style>
.gallery{width:100%;padding:0px;}
.gallery li{width:20%;list-style:none;float:left;}
.tb-show-div ul li span{
    float: left;
    width: 25%;
}
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      	<div class="x_panel">
        	<div class="x_title">
          		<h2></h2>
          		<div class="clearfix"></div>
        	</div>
        	<div class="x_content">
          		<div class="col-md-12 col-sm-12 col-xs-12">
                         
				 <div class="row" ng-show="chnimas">
                  <table id="datatable-responsive"  class="table table-striped responsive-utilities jambo_table bulk_action" >
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Movie Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					    <?php 
                        foreach ($contentss as $key => $valuess) {?>
                        <tr style="text-align:center">
                          <td><?php echo $valuess->id;?></td>
                          <td><?php echo $valuess->movie_name;?></td>                         
                          <td>
		
		  <a href="javascript:void(0);" data-target=".cinema" data-toggle="modal" ng-click="get_screen_gallery(<?php echo $valuess->id;?>); chnimas=false;" class="btn btn-primary" type="button">View Gallery</button></a>
		
		
			   
                 
                          </td>
                        </tr>
                        <?php }
                        ?>
                    </tbody>
                  </table>
                </div>
				
				  <div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade cinema bs-example-modal-lg " style="display: none;">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                          </button>
                          <h4 id="myModalLabel2" class="modal-title">Gallery images</h4>
                        </div>
                        <div class="modal-body">
						
						
                   <form name="edit_form" ng-init="form_edit_table='<?php //echo $table;?>'">

					<ul class="gallery">
                      <li ng-repeat="playlistes in cinemagallery">
                        <div class="thumbnail">
                        <div class="image view view-first">
				 <img style="width: 100%; display: block;" src="<?php echo base_url();?>{{playlistes.image}}"  alt="image" ng-model="img"/>
                          <div class="mask">
                            <p>{{playlistes.movie_name}}</p>
                            <div class="tools tools-bottom">
                              <a href="<?php echo base_url();?>admin/view_gallery"><i class="fa fa-times" ng-click="galleryremove(playlistes.id);"></i></a>
                            </div>
                          </div>
                        </div>
                        <button ng-click="save_movie('<?php echo base_url();?>assets/public/images/img.png')" style="margin-top: 20px;margin-left: 60px;">Save</button>
                      </div>
					    <div class="clearfix"></div>
					  </li>
					</ul>
					  
                             </div>
							 
                          </div>
                        </form>
                      </div>
                    </div>
					
           </div>
            
        </div>
      </div>
      <!-- /page content -->
    </div>
  </div>

 