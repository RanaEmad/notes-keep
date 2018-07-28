<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Notes_model");
    }
    public function index()
    {
        $notes=  $this->Notes_model->get_notes();
        $data['notes']=$notes;
        $this->load->view('notes',$data);
    }

    public function insert_note(){
        $data=array(
            "title"=>  $this->input->post("title"),
            "text"=>$this->input->post("text")
        );
        $data["date_created"]=date("Y-m-d H:i:s");
        $id=$this->Crud_model->insert("notes",$data);
        $response['result']="success";
        $response['id']=$id;
        echo json_encode($response);
    }

    public function get_notes(){
      $notes=  $this->Notes_model->get_notes();
      $response['result']="success";
      $response['notes']=$notes;
      echo json_encode($response);
    }

}
