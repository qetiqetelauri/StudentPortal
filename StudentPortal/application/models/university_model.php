<?php
  class University_Model extends CI_Model {
     public function __construct(){
      parent::__construct();
     }

     public function getUniversities(){
      $this->db->select('*');
      $this->db->from('universities');
      $query = $this->db->get();
      return $query->result();
     }
  }
?>
