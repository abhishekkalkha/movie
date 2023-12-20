 <?php
 //echo '<pre>';
 //print_r($this->config);die();
    $this->load->view($this->config->item('ci_my_admin_template_dir_auth') . 'header');
    $this->load->view($this->config->item('ci_my_admin_template_dir_auth') . 'content');
    $this->load->view($this->config->item('ci_my_admin_template_dir_auth') . 'footer');