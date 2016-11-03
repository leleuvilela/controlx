<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Dashboard extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
    
        if(!$this->session->userdata('logged'))
            redirect('login');

        $this->load->model("dashboard_model");
    }
 
    public function index()
    {
        $data['page_title']  = "Dashboard";

        // Load View
        $this->template->show('dashboard', $data);
    }

    public function get() {
 
       $res = $this->dashboard_model->get();
 
       echo json_encode($res);
 
   }
 
   public function post() {
 
       $data = json_decode(file_get_contents("php://input"));
 
       $res = $this->dashboard_model->post($data);
 
       echo json_encode($res);
 
   }

   public function delete(){

        $data = json_decode(file_get_contents("php://input"));

        $res = $this->dashboard_model->delete($data->{'id'});

        echo json_encode($res);

   }

   public function edit($id){

        $res = $this->dashboard_model->edit($id);

        echo json_encode($res);
   }
 
}