<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
    
        if(!$this->session->userdata('logged'))
            redirect('login');

        $this->load->model("main_model");
    }
 
    public function index()
    {
        $data['page_title']  = "Main";

        // Load View
        $this->template->show('main', $data);
    }

    public function get() {
 
       $res = $this->main_model->get();
 
       echo json_encode($res);
 
   }
 
   public function post() {
 
       $data = json_decode(file_get_contents("php://input"));
 
       $res = $this->main_model->post($data);
 
       echo json_encode($res);
 
   }

   public function delete(){

        $data = json_decode(file_get_contents("php://input"));

        $res = $this->main_model->delete($data->{'id'});

        echo json_encode($res);

   }

   public function edit($id){

        $res = $this->main_model->edit($id);

        echo json_encode($res);
   }
 
}