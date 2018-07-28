<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes_model extends CI_Model {
    function get_notes(){
        $this->db->order_by("date_created","desc");
        $this->db->from("notes");
        $query=$this->db->get();
        return $query->result();
    }
}