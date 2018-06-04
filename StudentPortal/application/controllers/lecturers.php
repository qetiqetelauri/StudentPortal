<?php
  Class Lecturers extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('lecturer_model');
      $this->load->model('lecturer_model', 'user');
    }

    public function index() {
      $this->load->view('lecturers');
    }
  }
?>
