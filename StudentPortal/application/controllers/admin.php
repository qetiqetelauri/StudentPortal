<?php
  class Admin extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('admin_model');
      $this->load->model('admin_model', 'adm');
    }

    public function index() {
      $this->load->view('admin_login');
    }

    public function admin_login_process() {
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');

      if ($this->form_validation->run() == FALSE) {
        if(isset($this->session->userdata['logged_in'])){
          $this->load->view('admin_profile');
        } else {
          $this->load->view('admin_login');
        }
      } else {
        $data = array(
          'pn' => $this->input->post('pn'),
          'password' => MD5($this->input->post('password'))
        );
        $result = $this->admin_model->login($data);
        if ($result == TRUE) {
          $pn = $this->input->post('pn');
          $condition = "pn =" . "'" . $pn . "'";
          $this->db->select('*');
          $this->db->from('admins');
          $this->db->where($condition);
          $this->db->limit(1);
          $query = $this->db->get();
          if ($query->num_rows() == 1) {
            $result = $query->result();
            $session_data = array(
              'who' => "admin",
              'pn' => $result[0]->PN
            );
            $this->session->set_userdata('logged_in', $session_data);
            $this->load->view('admin_profile');
          }
        } else {
          $data['message_display'] = 'Invalid Username or Password';
          $this->load->view('admin_login', $data);
        }
      }
    }

    public function logout() {
      $sess_array = array(
      'pn' => ''
      );
      $this->session->unset_userdata('logged_in', $sess_array);
      $data['message_display'] = 'Successfully Logout';
      $this->load->view('admin_login', $data);
    }

    public function add_admin() {
      $this->load->view('add_admin');
    }

    public function create_admin() {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
      if($this->form_validation->run() != FALSE) {
        $pn = $this->input->post('pn');
        $password = $this->input->post('password');
        $result = $this->adm->createAdmin($pn, $password);
        if ($result == TRUE) {
          $this->load->view('add_admin');
        } else {
          $data['message_display'] = 'User already exists';
          $this->load->view('add_admin', $data);
        }
      }
    }

    public function delete_admin() {
      $this->load->library('form_validation');
      $id = $this->input->post('id');
      $this->db->delete("admins", "ID = ".$id."");
      $this->load->view('add_admin');
    }

    public function unis() {
      $this->load->view('add_universities');
    }
  }
?>
