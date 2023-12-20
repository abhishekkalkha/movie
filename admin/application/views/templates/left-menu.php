<?php
          if($this->session->userdata('super_admin') == 1 ||$this->session->userdata('super_admin') == 0 )
   
{
  $display_image=$this->session->userdata['backend_logged_in']['image'];
  $name=$this->session->userdata['backend_logged_in']['name'];
  ?>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $display_image?>" class="img-circle img_circle" >
        </div>
        <div class="pull-left info">
          <p><?php echo $name;?></p>
          <a href="<?php echo base_url();?>welcome"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
      <?php
      $user2 = $this->session->userdata('permission');

         $page_name = array();

      $page_name = explode(',', $user2);
      ?>
       <!--  <li class="header">MAIN NAVIGATION</li> -->
          <li>
          <a href="<?php echo base_url();?>welcome">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php
         if( in_array('17',$page_name))
          {
          ?> 
          <li>
          <a href="<?php echo base_url();?>customer/customer_list">
            <i class="fa fa-user"></i> <span>Customers</span>
          </a>
        </li>
        <?php } 
if( in_array('6',$page_name) || in_array('7',$page_name) || in_array('8',$page_name)|| in_array('9',$page_name))
   {
        ?>
             <li class="treeview">
          <a href="#">
             <i class="fa fa-user-plus"></i>
            <span>Admin users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if( in_array('6',$page_name))
   { ?>
            <li><a href="<?php echo base_url();?>adminuser/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php } 
            if(in_array('7',$page_name) || in_array('8',$page_name)|| in_array('9',$page_name))
   {?>
            <li><a href="<?php echo base_url();?>adminuser"><i class="fa fa-table"></i> View</a></li>
           <?php } ?>
          </ul>
        </li>
        <?php } 

         if( in_array('18',$page_name) || in_array('19',$page_name) || in_array('20',$page_name)|| in_array('21',$page_name))
   {?>
         <li class="treeview">
          <a href="#">
             <i class="fa fa-info"></i>
            <span>Languages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php  if( in_array('18',$page_name))
   {?>
            <li><a href="<?php echo base_url();?>language/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php }
 if(in_array('19',$page_name) || in_array('20',$page_name)|| in_array('21',$page_name))
   {
            ?>
            <li><a href="<?php echo base_url();?>language"><i class="fa fa-table"></i> View</a></li>
           <?php } ?>
          </ul>
        </li>
        <?php } 
 if( in_array('36',$page_name) || in_array('37',$page_name) || in_array('38',$page_name)|| in_array('39',$page_name))
   {
        ?>
         <li class="treeview">
          <a href="#">
             <i class="fa fa-tags"></i>
            <span>Tags</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php   if( in_array('36',$page_name))
   {?>
            <li><a href="<?php echo base_url();?>tag/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php }
 if(in_array('37',$page_name) || in_array('38',$page_name)|| in_array('39',$page_name))
   {
            ?>
            <li><a href="<?php echo base_url();?>tag"><i class="fa fa-table"></i> View</a></li>
           <?php }?>
          </ul>
        </li>
        <?php } 
 if( in_array('13',$page_name) || in_array('14',$page_name) || in_array('15',$page_name)|| in_array('16',$page_name))
   {
        ?>
         <li class="treeview">
          <a href="#">
             <i class="fa fa-th"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if( in_array('13',$page_name))
   { ?>
            <li><a href="<?php echo base_url();?>category/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php }
if(in_array('14',$page_name) || in_array('15',$page_name)|| in_array('16',$page_name))
   {
            ?>
            <li><a href="<?php echo base_url();?>category"><i class="fa fa-table"></i> View</a></li><?php } ?>
           
          </ul>
        </li>
        <?php }
 if( in_array('31',$page_name) || in_array('32',$page_name) || in_array('33',$page_name)|| in_array('34',$page_name))
   {
        ?>
           <li class="treeview">
          <a href="#">
             <i class="fa fa-male"></i>
            <span>Actors Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if( in_array('31',$page_name))
   {?>
            <li><a href="<?php echo base_url();?>role/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php } 
if(in_array('32',$page_name) || in_array('33',$page_name)|| in_array('34',$page_name))
   {
            ?>
            <li><a href="<?php echo base_url();?>role"><i class="fa fa-table"></i> View</a></li><?php } ?>
           
          </ul>
        </li>
        <?php } 
if( in_array('1',$page_name) || in_array('2',$page_name) || in_array('3',$page_name)|| in_array('4',$page_name))
   {
        ?>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-group"></i>
            <span>Actors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if( in_array('1',$page_name))
   { ?>
            <li><a href="<?php echo base_url();?>actors/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php } 
if(in_array('2',$page_name) || in_array('3',$page_name)|| in_array('4',$page_name))
   {
            ?>
            <li><a href="<?php echo base_url();?>actors"><i class="fa fa-table"></i> View</a></li><?php } ?>
           
          </ul>
        </li>
        <?php } 
if( in_array('22',$page_name) || in_array('23',$page_name) || in_array('24',$page_name)|| in_array('25',$page_name))
   {
        ?>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-film"></i>
            <span>Movies</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if( in_array('22',$page_name))
   {?>
            <li><a href="<?php echo base_url();?>movie/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php }
if(in_array('23',$page_name) || in_array('24',$page_name)|| in_array('25',$page_name))
   {
            ?>
            <li><a href="<?php echo base_url();?>movie"><i class="fa fa-table"></i> View</a></li><?php }?>
          
           
          </ul>
        </li>
<?php } 
if(in_array('57',$page_name) || in_array('58',$page_name)|| in_array('59',$page_name)||in_array('60',$page_name)){
       ?>
      <li class="treeview">
          <a href="#">
             <i class="fa fa-user-plus"></i>
            <span>Usertypes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if(in_array('57',$page_name)) {?>
            <li><a href="<?php echo base_url();?>usertypes/create"><i class="fa fa-plus-square-o"></i>Addrole</a></li><?php } 
if(in_array('58',$page_name)|| in_array('59',$page_name)||in_array('60',$page_name)){
            ?>
            <li><a href="<?php echo base_url();?>usertypes"><i class="fa fa-table"></i> View</a></li><?php } ?>
           
          </ul>
        </li>
        <?php }
if( in_array('26',$page_name) || in_array('27',$page_name) || in_array('28',$page_name)|| in_array('29',$page_name))
   {
?>
            <li class="treeview">
          <a href="#">
             <i class="fa fa-th"></i>
            <span>Promocode</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if( in_array('26',$page_name))
   { ?>
            <li><a href="<?php echo base_url();?>promocode/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php }
if(in_array('27',$page_name) || in_array('28',$page_name)|| in_array('29',$page_name))
   {
            ?>
            <li><a href="<?php echo base_url();?>promocode"><i class="fa fa-table"></i> View</a></li><?php } ?>
           
          </ul>
        </li>
        <?php }
if( in_array('40',$page_name) || in_array('41',$page_name) || in_array('42',$page_name)|| in_array('43',$page_name)||in_array('44',$page_name) || in_array('45',$page_name) || in_array('46',$page_name)|| in_array('47',$page_name)||in_array('48',$page_name) || in_array('49',$page_name) || in_array('50',$page_name)|| in_array('51',$page_name))
   {
         ?>

           <li class="treeview">
          <a href="#">
             <i class="fa fa-tv"></i>
            <span>Theatres</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if( in_array('40',$page_name)) { ?>
            <li><a href="<?php echo base_url();?>theatre/create"><i class="fa fa-plus-square-o"></i>Create</a></li>
            <?php } 
         if(in_array('41',$page_name) || in_array('42',$page_name)|| in_array('43',$page_name)){
            ?>
            <li><a href="<?php echo base_url();?>theatre"><i class="fa fa-table"></i> View</a></li>
           <?php } 
        if(in_array('44',$page_name) || in_array('45',$page_name)|| in_array('46',$page_name)|| in_array('47',$page_name)){
           ?>
                <li>
              <a href="#"><i class="fa fa-plus-square-o"></i> Addmovie
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php if(in_array('44',$page_name)){ ?>
                <li><a href="<?php echo base_url();?>theatre/addmovie"><i class="fa fa-plus-square-o"></i>Create</a></li><?php } 
          if(in_array('45',$page_name)|| in_array('46',$page_name)|| in_array('47',$page_name)){
                ?>
                <li>
                  <a href="<?php echo base_url();?>theatre/viewmovie"><i class="fa fa-table"></i> View
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                 
                </li>
                <?php } ?>
              </ul>
            </li>
            <?php } 
if(in_array('48',$page_name) || in_array('49',$page_name)|| in_array('50',$page_name)|| in_array('51',$page_name)){
            ?>

               <li>
              <a href="#"><i class="fa fa-plus-square-o"></i>Show
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php if(in_array('48',$page_name)){ ?>
                <li><a href="<?php echo base_url();?>theatre/addshow"><i class="fa fa-plus-square-o"></i>Create</a></li><?php } 
if(in_array('49',$page_name)|| in_array('50',$page_name)|| in_array('51',$page_name)){
                ?>
                <li><a href="<?php echo base_url();?>theatre/viewshow"><i class="fa fa-table"></i> View
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                 
                </li><?php } ?>
              </ul>
            </li>
<?php } 
if(in_array('65',$page_name) || in_array('66',$page_name)|| in_array('67',$page_name)|| in_array('68',$page_name)|| in_array('69',$page_name)){
?>
               <li>
              <a href="#"><i class="fa fa-plus-square-o"></i>Add Screen
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
            <?php if(in_array('65',$page_name)) { ?>
                <li><a href="<?php echo base_url();?>theatre/addscreen"><i class="fa fa-plus-square-o"></i>Create</a></li>
                <?php } 
              if( in_array('66',$page_name)|| in_array('67',$page_name)|| in_array('68',$page_name)|| in_array('69',$page_name)){
                ?>
                <li><a href="<?php echo base_url();?>theatre/viewscreen"><i class="fa fa-table"></i> View
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                 
                </li>
                <?php } ?>
              </ul>
            </li>
           <?php } ?>
          
          </ul>
        </li>
<?php }
if(in_array('52',$page_name) || in_array('53',$page_name)|| in_array('54',$page_name)|| in_array('55',$page_name)){
 ?>
           <li class="treeview">
          <a href="#">
             <i class="fa fa-map-marker"></i>
            <span>Theatre Locations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php if(in_array('52',$page_name)){?>
            <li><a href="<?php echo base_url();?>theatrelocations/create"><i class="fa fa-plus-square-o"></i>Create</a></li><?php } 
if(in_array('53',$page_name)|| in_array('54',$page_name)|| in_array('55',$page_name)){
            ?>
            <li><a href="<?php echo base_url();?>theatrelocations"><i class="fa fa-table"></i> View</a></li><?php } ?>
           
          </ul>
        </li>
        <?php }
if(in_array('10',$page_name) || in_array('11',$page_name)|| in_array('12',$page_name)){
        ?>
              <li>
          <a href="<?php echo base_url();?>bookingdetails">
            <i class="fa fa-cube"></i> <span>Booking Details</span>
          </a>
        </li>
     <?php } 
     if(in_array('30',$page_name)){ ?>
        <li>
          <a href="<?php echo base_url();?>reviews">
            <i class="fa fa-comments-o"></i> <span>Reviews</span>
          </a>
        </li>
        <?php } 
if(in_array('35',$page_name)){
        ?>
          <li>
          <a href="<?php echo base_url();?>settings">
            <i class="fa fa-gear"></i> <span>Settings</span>
          </a>
        </li>
        <?php } 
if(in_array('70',$page_name)|| in_array('71',$page_name)|| in_array('72',$page_name)){
        ?>
                <li class="treeview">
          <a href="#">
             <i class="fa fa-user-plus"></i>
            <span>Banners</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
            if(in_array('70',$page_name)){ ?>
            <li><a href="<?php echo base_url();?>banners/create"><i class="fa fa-plus-square-o"></i>create</a></li>
            <?php }
        if(in_array('71',$page_name)|| in_array('72',$page_name)){
            ?>
            <li><a href="<?php echo base_url();?>banners/index"><i class="fa fa-table"></i> View</a></li>
           <?php } ?>
          </ul>
        </li>
        <?php
      }
if(in_array('56',$page_name) || in_array('61',$page_name)|| in_array('62',$page_name)){
        ?>
            <li>
          <a href="<?php echo base_url();?>rolemanagement">
            <i class="fa fa-male"></i> <span>Role Management</span>
          </a>
        </li>
       <?php } 
 ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <?php } ?>