<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class Admin_model extends CI_Model {

    public function login($data) {
      $condition = "pn =" . "'" . $data['pn'] . "' AND " . "password =" . "'" . $data['password'] . "'";
      $this->db->select('*');
      $this->db->from('admins');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();

      if ($query->num_rows() == 1) {
        return true;
      } else {
        return false;
      }
    }

    public function read_admin_information($pn) {
      $condition = "pn =" . "'" . $pn . "'";
      $this->db->select('*');
      $this->db->from('admins');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 1) {
        return $query->result();
      } else {
        return false;
      }
    }

    public function createAdmin($pn, $password) {
      $data = array(
          'PN' => $pn,
          'Password' => MD5($password),
      );
      $condition = "PN =" . "'" . $pn . "'";
      $this->db->select('*');
      $this->db->from('admins');
      $this->db->where($condition);
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 0) {
        $this->db->insert('admins', $data);
        return true;
      } else {
        return false;
      }
      //return $this->db->insert_id();
    }
  }
 ?>
