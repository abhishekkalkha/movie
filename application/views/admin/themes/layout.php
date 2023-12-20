 <?php
 // echo '<pre>';
 // print_r($this->config);die();
    $this->load->view($this->config->item('ci_my_admin_template_dir_admin') . 'header');
    $this->load->view($this->config->item('ci_my_admin_template_dir_admin') . 'content');
    $this->load->view($this->config->item('ci_my_admin_template_dir_admin') . 'footer');