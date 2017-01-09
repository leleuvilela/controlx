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

    public function get($table) {
 
       $res = $this->main_model->get($table);
 
       echo json_encode($res);
 
   }
 
   public function post($table) {
 
       $data = json_decode(file_get_contents("php://input"));
 
       $res = $this->main_model->post($data, $table);
 
       echo json_encode($res);
 
   }

   public function delete($table){

        $data = json_decode(file_get_contents("php://input"));

        $res = $this->main_model->delete($data->{'id'}, $table);

        echo json_encode($res);

   }

   public function edit($id, $table){

        $res = $this->main_model->edit($id, $table);

        echo json_encode($res);
   }

   public function upload(){
        $target_dir = "./uploads/";
        $name = $_POST['name'];
        print_r($_FILES);
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

        $data = (object) array('name' => $name, 'filename' => basename($_FILES["file"]["name"]));

        $this->main_model->post($data, 'files');

   }
  
    public function lastId(){

      $res = array('id' => $this->main_model->lastId());

      echo json_encode($res);

    }
}