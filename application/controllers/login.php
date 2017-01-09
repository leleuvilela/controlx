<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
    public function index(){
    	$this->load->model('user_model');

    	if($this->session->userdata('logged'))
    		redirect('main');

        // Load View
        $data['page_title']  = "Login";
 
        $data['email'] = '';
        $data['password'] = '';

        $geter = $this->db->get('user');
        $data['geting'] = $geter->num_rows();
 
        $this->template->show('login', $data);
    }

    public function validate(){
	    $this->load->model('user_model');
	    $result = $this->user_model->validate($this->input->post('email'),$this->input->post('password'));
	 
	    if($result) {
	        $this->session->set_userdata(array(
	            'logged' => true,
	            'user'  => $result['id'],
	            'level' => $result['level']
	        ));
	 
	        redirect('main');
	    } else {
	        // Load View
	        $data['page_title']  = "Login";
	 
	        $data['email'] = $this->input->post('email');
	        $data['password'] = $this->input->post('password');
	 
	        $data['error'] = true;
	 
	        $this->template->show('login', $data);
	    }
	}
 	public function logout(){
	    $this->session->unset_userdata('logged');
	 
	    redirect('login');
	}
}