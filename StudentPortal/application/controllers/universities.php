<?php
  Class Universities extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('university_model');
      $this->load->model('university_model', 'uni');
    }

    public function index() {
      $this->load->view('universities');
    }

    public function open_profile() {
      $this->load->view('university_profile');
    }

    public function add_uni() {
      $fullname = $this->input->post('fullname');
      $email = $this->input->post('email');
      $phonenumber = $this->input->post('phonenumber');
      $address = $this->input->post('address');
      $data = array(
          'FullName' => $fullname,
          'Email' => $email,
          'Adress' => $address,
          'PhoneNumber' => $phonenumber,
      );
      $this->db->insert('universities', $data);
      $this->load->view('add_universities');
    }
  }
?>
