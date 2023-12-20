<?php
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      	<div class="x_panel">
        	<div class="x_title">
          		<h2>Add </h2>
          		<div class="clearfix"></div>
        	</div>
        	<div class="x_content">
          	<div class="col-md-12 col-sm-12 col-xs-12">

         <!--<button data-target=".cinema" data-toggle="modal" class="btn btn-primary" type="button">Add New</button>-->
         <!--<div aria-hidden="true" role="dialog" tabindex="-1" class="modal fade cinema bs-example-modal-lg " style="display: none;">-->
                        <div class="modal-body">
                        
						<form role="form" action="" method="post" data-parsley-validate="" class="validate" enctype="multipart/form-data">  
 
							
					  <div class="item form-group">
                          <label for="first-name" class="control-label col-md-3 col-sm-3 col-xs-12">Promocode <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" class="form-control col-md-7 col-xs-12 " required="required" name="title" 
							  ng-model="title" placeholder="Promocode" />
                          </div>
                          <span class="alert">This field is required</span>
                      </div>  
					  
					  <div class="form-group col-md-12">
							   <label>Logo</label>
							   <input name="image" type="file" accept="image/*" class="required">
                      </div>
					  
					  <div class="form-group col-md-12">
							   <label>Favicon</label>
							   <input name="image" type="file" accept="image/*" class="required">
                      </div>
				
                      </div>
					  
                       <div class="box-footer">
                           <button type="submit" class="btn btn-primary">Submit</button>
                       </div>  


				
      		</div>
  		</div>
  	</div>
</div>
</div>