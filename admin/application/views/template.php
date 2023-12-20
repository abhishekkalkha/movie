<?php
  $this->load->view('templates/header-script');
  $this->load->view('templates/header');
	$this->load->view('templates/left-menu');
	$this->load->view($page);
  $this->load->view('templates/footer');
  $this->load->view('templates/footer-script');
  ?>


