<?php

  Class Lecturer_Authentification extends CI_Controller {
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
      $this->load->view('lecturer_login');
    }

    public function lecturer_register() {
      $this->load->view('lecturer_registration');
    }

    public function lecturer_register_action() {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
      $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

      if($this->form_validation->run() == FALSE) {
        $this->lecturer_register();
      } else {
        // post values
        $pn = $this->input->post('pn');
        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $phonenumber = $this->input->post('phonenumber');
        $password = $this->input->post('password');
        $birthdate = $this->input->post('birthdate');
        $profession = $this->input->post('profession');
        $title = $this->input->post('title');
        // set post values
        $this->user->setPN($pn);
        $this->user->setName($fullname);
        $this->user->setEmail($email);
        $this->user->setPhonenumber($phonenumber);
        $this->user->setPassword(MD5($password));
        $this->user->setBirthdate($birthdate);
        $this->user->setProfession($profession);
        $this->user->setTitle($title);
        // insert values in database
        $result = $this->user->createUser();
        if ($result == TRUE) {
          redirect('lecturer_authentification/index');
        } else {
          $data['message_display'] = 'User already exists';
          $this->load->view('lecturer_registration', $data);
        }
      }
    }

    public function lecturer_login_process() {
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');

      if ($this->form_validation->run() == FALSE) {
        if(isset($this->session->userdata['logged_in'])){
          $this->load->view('lecturer_profile');
        } else {
          $this->load->view('lecturer_login');
        }
      } else {
        $data = array(
          'pn' => $this->input->post('pn'),
          'password' => MD5($this->input->post('password'))
        );
        $result = $this->lecturer_model->login($data);
        if ($result == TRUE) {
          $pn = $this->input->post('pn');
          $result = $this->lecturer_model->read_user_information($pn);
          if ($result != false) {
            $session_data = array(
              'who' => "lecturer",
              'pn' => $result[0]->PN,
              'foreign_pn' => $result[0]->PN
            );
            $this->session->set_userdata('logged_in', $session_data);
            $this->load->view('lecturer_profile');
          }
        } else {
          $data['message_display'] = 'Invalid Username or Password';
          $this->load->view('lecturer_login', $data);
        }
      }
    }

    public function add_lecturer_comment() {
      $this->load->library('form_validation');
      $ID = $this->input->post('lecturer_id');
      $comment = $this->input->post('lecturer_comment');
      $date = new DateTime('now');
      $date = ''.$date->format('D M d, Y G:i');
      $data = array(
         'LecturerID' => $ID,
         'Comment' => $comment,
         'date' => $date
      );
      $this->db->insert("comments", $data);
      $userdata = $_SESSION['logged_in'];
      $who = $userdata['who'];
      if ($who == "lecturer") {
        redirect('lecturer_authentification/lecturer_login_process');
      } else {
        redirect('student_authentification/student_login_process');
      }
    }

    public function logout() {
      $sess_array = array(
      'pn' => ''
      );
      $this->session->unset_userdata('logged_in', $sess_array);
      $data['message_display'] = 'Successfully Logout';
      $this->load->view('lecturer_login', $data);
    }

    public function open_profile() {
      $this->load->library('form_validation');
      $lect_id = $this->input->post('lecturer_id');
      $condition = "ID =" . "'" . $lect_id . "'";
      $this->db->select('*');
      $this->db->from('lecturers');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      $result = $query->result();
      $lect_pn = $result[0]->PN;
      $this_pn = $this->input->post('this_pn');
      $who = $this->input->post('who');
      $newdata = array(
        'who'  => $who,
        'pn'     => $this_pn,
        'foreign_pn' => $lect_pn
      );
      $this->session->set_userdata('logged_in', $newdata);
      $this->load->view('lecturer_profile');
    }

    public function profile() {
      $this->load->view('lecturer_profile');
    }

    public function add_rating() {
      $star_value = $this->input->post('submit_star');
      $userdata = $_SESSION['logged_in'];
      $foreign_pn = $userdata['foreign_pn'];
      $condition = "PN =" . "'" . $foreign_pn . "'";
      $this->db->select('*');
      $this->db->from('lecturers');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      $result = $query->result();
      $SumRating = $result->SumRating;
      $CountRating = $result->CountRating;
      $data = array(
         'SumRating' => $SumRating+$star_value,
         'CountRating' => $CountRating+1
      );
      $this->db->insert("lecturers", $data);
      $this->load->view('lecturer_profile');
    }
  }
?>
