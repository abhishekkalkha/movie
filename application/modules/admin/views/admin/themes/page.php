<?php
function parseString($str) {
    $result=str_replace('"','&quot;',$str);
    $result=str_replace("'","&#39;",$result);
    return $result;
} 

?>
<div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><?php echo $title; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php if($title=='View All' && $table_key==null) {?>
                    <table id="datatable-responsive"  class="table table-striped responsive-utilities jambo_table bulk_action" >
                      <thead>
                        <tr>
                          <?php 
                          foreach ($fields as $key => $value) {
                            echo '<th style="text-align:justify">'.$value.'</th>';
                            $field[]=$value;
                          }
                          ?>
                          <th><i class="fa fa-cogs"></i></th>

						  <th><i class="fa fa-trash-o" aria-hidden="true"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        
                          <?php 
                          if($datas !='No result'){
                          foreach ($datas as $keys => $value ) {
                            echo '<tr>';
                            foreach ($fields as $key => $fi_value) {
                              echo '<td >'.$value->$fi_value.'</td>';
                            }
                            echo '<td><a href="'.base_url().'admin/edit/'.$table.'/'.$value->id.'">edit</a></td>';
							
                            echo '<td><a ng-click="delete_action('.$value->id.','.'\''.parseString($table).'\''.')" ng-init="id='.$value->id.';table='.$table.'">Delete</a></td>';
						   
						   //echo '<td><a ng-click="delete_action('.'\''.$value->id.','.'\''.','.'\''.parseString($table).'\''.')" ng-init="id='.$value->id.';table='.$table.'">Delete</a></td>';
							
                            echo '</td>';
                          }
                          }else{
                            $col_count =count($fields) + 1;
                            echo '<tr style="text-align:center"><td colspan="'.$col_count.'"> No Result </td></tr>';
                          }
                          ?>				 
						 
                      </tbody>
                    </table>
                    <?php } ?>
                    <?php if($title=='Edit' && $table_key==null || $title=='Edit' && $table_key!=null) {?>
                      <form name="edit_form" ng-submit="edit_form_submitted && check()" ng-init="form_edit_table='<?php echo $table;?>'">
                        <?php 
                        foreach (json_decode($datas,true) as $key => $value) {
                          
                          if($value['tag_type']=='input') { ?>
                          <div class="col-md-6 col-sm-12 col-xs-12 my-row"  >
                            <?php if(empty($value['field_available_value'])) {?>
                              <label><?php echo $key;?></label>
                              <input class="form-control <?php echo $value['class_name']; ?> col-md-6 col-sm-12 col-xs-12" type="<?php echo $value['input_type']; ?>" <?php if($value['input_type']=='number') echo 'string-to-number';?> ng-required="<?php echo $value['required']; ?>" ng-readonly="<?php echo $value['readonly']; ?>" ng-init="form_data.<?php echo $key;?>='<?php echo $value['value']; ?>'" ng-model="form_data.<?php echo $key;?>" name="<?php echo $key;?>" ng-value="<?php echo $value['value']; ?>" >

                              <!-- validation block-->
                              <span class="error_block" ng-show="edit_form_submitted && edit_form.<?php echo $key;?>.$error.required">This field is required</span>
                            <?php } else { ?>
                              <label><?php echo $key;?></label>
                              <input class="form-control col-md-6 col-sm-12 col-xs-12" type="hidden" ng-required="<?php echo $value['required']; ?>" ng-readonly="<?php echo $value['readonly']; ?>" ng-init="form_data.<?php echo $key;?>='<?php echo $value['value']; ?>'" ng-model="form_data.<?php echo $key;?>" ng-value="<?php echo $value['value']; ?>" >
                              <input class="form-control col-md-6 col-sm-12 col-xs-12" type="<?php echo $value['input_type']; ?>" ng-required="<?php echo $value['required']; ?>" ng-readonly="<?php echo !empty($value['field_available_value']['value']); ?>" value="<?php echo $value['field_available_value']['value']; ?>" >
                              <span class="error_block" ng-show="edit_form_submitted && edit_form.<?php echo $key;?>.$error.required">This field is required</span>
                            <?php } ?>
                          </div>
                          <?php } if($value['tag_type']=='select'){
							  
							//  print_r($value['field_available_value']);
							?>
                          <div class="col-md-6 col-sm-12 col-xs-12 my-row"  >
                            <label><?php echo $key;?></label>
                            <select class="form-control col-md-6 col-sm-12 col-xs-12" ng-required="<?php echo $value['required']; ?>" ng-readonly="<?php echo $value['readonly']; ?>" ng-init="form_data.<?php echo $key;?>='<?php echo $value['value']; ?>'" >
                              <?php foreach ($value['field_available_value'] as $av_key => $av_value) { 
                                $op_val = (is_numeric($av_key)) ? $av_key : $av_value;
                                if(is_array($av_value)){
                                $op_val =   (is_numeric($av_key)) ? $op_val+1 :$op_val;
                                ?>
                                <option value="<?php echo $av_value['id'];?>" ng-model="form_data.<?php echo $key;?>" ng-selected="<?php echo $op_val;?>==<?php echo $value['value'];?>" ng-click="form_data.<?php echo $key;?>='<?php echo $av_value['id'];?>'"><?php echo  $av_value['name'];?></option>
                              <?php }else{ ?>
                                <option value="<?php echo $op_val;?>" ng-model="form_data.<?php echo $key;?>" ng-selected="<?php echo $op_val;?>==<?php echo $value['value'];?>" ng-click="form_data.<?php echo $key;?>='<?php echo $op_val;?>'"><?php echo  $av_value;?></option>
                              <?php } }?>
                            </select>
                            <span class="error_block" ng-show="edit_form_submitted && edit_form.<?php echo $key;?>.$error.required">This field is required</span>
                          </div>
                          <?php }}?>
                          <div class="col-md-12 col-sm-12 col-xs-12 my-row"  >
                            <input class="btn btn-success col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" type="submit" ng-click="edit_form_submitted=true" value="submit">
                          </div>
                      </form>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>