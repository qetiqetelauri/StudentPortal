<?php

  Class Student_Authentification extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('student_model');
      $this->load->model('student_model', 'user');
      $this->load->model('university_model');
    }

    public function index() {
      $this->load->view('student_login');
    }

    public function student_register() {
      $query = $this->university_model->getUniversities();
      $data['UNIVERSITIES'] = null;
      if($query){
       $data['UNIVERSITIES'] =  $query;
      }
      $this->load->view('student_registration', $data);
    }

    public function student_register_action() {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
      $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

      if($this->form_validation->run() == FALSE) {
        $this->student_register();
      } else {
        // post values
        $pn = $this->input->post('pn');
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $phonenumber = $this->input->post('phonenumber');
        $password = $this->input->post('password');
        $birthdate = $this->input->post('birthdate');
        $university = $this->input->post('university');
        $faculty = $this->input->post('faculty');
        $degree = $this->input->post('degree');
        $course = $this->input->post('course');
        // set post values
        $this->user->setPN($pn);
        $this->user->setName($fullname);
        $this->user->setEmail($email);
        $this->user->setPhonenumber($phonenumber);
        $this->user->setPassword(MD5($password));
        $this->user->setBirthdate($birthdate);
        $this->user->setUniversity($university);
        $this->user->setFaculty($faculty);
        $this->user->setDegree($degree);
        $this->user->setCourse($course);
        // insert values in database
        $result = $this->user->createUser();
        if ($result == TRUE) {
          redirect('student_authentification/index');
        } else {
          $data['message_display'] = 'User already exists';
          $this->load->view('student_registration', $data);
        }
      }
    }

    public function student_login_process() {
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');

      if ($this->form_validation->run() == FALSE) {
        if(isset($this->session->userdata['logged_in'])){
          $this->load->view('student_profile');
        } else {
          $this->load->view('student_login');
        }
      } else {
        $data = array(
          'pn' => $this->input->post('pn'),
          'password' => MD5($this->input->post('password'))
        );
        $result = $this->student_model->login($data);
        if ($result == TRUE) {
          $pn = $this->input->post('pn');
          $result = $this->student_model->read_user_information($pn);
          if ($result != false) {
            $session_data = array(
            'who' => "student",
            'pn' => $result[0]->PN,
            'foreign_pn' => $result[0]->PN
            );
            $this->session->set_userdata('logged_in', $session_data);
            $this->load->view('student_profile');
          }
        } else {
          $data['message_display'] = 'Invalid Username or Password';
          $this->load->view('student_login', $data);
        }
      }
    }
    public function profile() {
      $this->load->view('student_profile');
    }
    public function logout() {
      $sess_array = array(
      'pn' => ''
      );
      $this->session->unset_userdata('logged_in', $sess_array);
      $data['message_display'] = 'Successfully Logout';
      $this->load->view('student_login', $data);
    }
  }
?>
