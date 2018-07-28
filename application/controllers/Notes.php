<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Notes_model");
    }
    public function index()
    {
        $notes= $this->Crud_model->get_all("notes");
        $data['notes']=$notes;
        $this->load->view('notes',$data);
    }

}
