<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Lecturer_model extends CI_Model {
    private $_userID;
    private $_PN;
    private $_name;
    private $_email;
    private $_phonenumber;
    private $_password;
    private $_birthday;
    private $_profession;
    private $_title;

    public function setUserID($userID) {
      $this->_userID = $userID;
    }
    public function setPN($PN) {
      $this->_PN = $PN;
    }
    public function setName($name) {
      $this->_name = $name;
    }
    public function setEmail($email) {
      $this->_email = $email;
    }
    public function setPhonenumber($phonenumber) {
      $this->_phonenumber = $phonenumber;
    }
    public function setPassword($password) {
      $this->_password = $password;
    }
    public function setBirthdate($birthday) {
      $this->_birthday = $birthday;
    }
    public function setProfession($profession) {
      $this->_profession = $profession;
    }
    public function setTitle($title) {
      $this->_title = $title;
    }

    public function createUser() {
      $data = array(
          'PN' => $this->_PN,
          'FullName' => $this->_name,
          'Email' => $this->_email,
          'Password' => $this->_password,
          'BirthDate' => $this->_birthday,
          'PhoneNumber' => $this->_phonenumber,
          'Title' => $this->_title,
          'Profession' => $this->_profession,
      );
      $condition = "PN =" . "'" . $this->_PN . "'";
      $this->db->select('*');
      $this->db->from('lecturers');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 0) {
        $condition = "PN =" . "'" . $this->_PN . "'";
        $this->db->select('*');
        $this->db->from('students');
        $this->db->where($condition);
        $this->db->limit(1);
        if ($query->num_rows() == 0) {
          $this->db->insert('lecturers', $data);
          return true;
        } else {
          return false;
        }
      } else {
        return false;
      }
      //return $this->db->insert_id();
    }

    public function login($data) {
      $condition = "pn =" . "'" . $data['pn'] . "' AND " . "password =" . "'" . $data['password'] . "'";
      $this->db->select('*');
      $this->db->from('lecturers');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();

      if ($query->num_rows() == 1) {
        return true;
      } else {
        return false;
      }
    }

    public function read_user_information($pn) {
      $condition = "pn =" . "'" . $pn . "'";
      $this->db->select('*');
      $this->db->from('lecturers');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 1) {
        return $query->result();
      } else {
        return false;
      }
    }
  }
?>
