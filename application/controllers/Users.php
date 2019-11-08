<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->helper('form');

	}

	public function index(){
		$data['users'] = $this->users_model->getAllUsers();
		$this->load->view('user_list.php', $data);
		//print_r($this->load->view);die("sc");

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('hobby', 'Hobby', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		
		/* if($this->form_validation->run()==true) {
			print_r($this->input->post());
		} else {
			$this->load->view('users');
		}
		*/

	}

	public function addnew(){
		$this->load->view('addform.php');
	}

	public function insert(){
		$user['name'] 		= $this->input->post('name');
		$user['email'] 		= $this->input->post('email');
		$user['password'] 	= $this->input->post('password');
		$user['gender'] 	= $this->input->post('gender');
		$hob 				= $this->input->post('hobby');
		$user['hobby'] 		= implode("," , $hob);
		$user['country'] 	= $this->input->post('country');	
		$user['image']   	= 
		$config['upload_path']   = './uploads/'; 
	    $config['allowed_types'] = 'gif|jpg|png'; 
	    $config['max_size']      = 100; 
	    $config['max_width']     = 1024; 
	    $config['max_height']    = 768;  
	     $this->load->library('upload', $config);

		if ($this->upload->do_upload('user')) {
			$error = array('error' => $this->upload->display_errors()); 
			
			$this->load->view('upload_form', $error); 
		}
		else{

			$data = array('upload_data' => $this->upload->data()); 
			$result = $this->load->view('upload_success', $data); 
			
			$query = $this->users_model->insertuser($user, $data);
			//echo "<pre>";print_r($query);exit;
			if($query){
				header('location:'.base_url().$this->index());
			}
			else{ echo "error";}
		}

	}
	public function edit($id){
		$data['user'] = $this->users_model->getUser($id);
		$this->load->view('editform', $data);
	}

	public function update($id){
		$user['name'] 		= $this->input->post('name');
		$user['email'] 		= $this->input->post('email');
		$user['password'] 	= $this->input->post('password');
		$user['gender']		= $this->input->post('gender');
		$hob 		= $this->input->post('hobby');
		$user['hobby'] 		= implode("," , $hob);
		$user['country'] 	= $this->input->post('country');

		$query = $this->users_model->updateuser($user, $id);


		if($query){
			header('location:'.base_url().$this->index());
		}
	}

	public function delete($id){
		$query = $this->users_model->deleteuser($id);

		if($query){
			header('location:'.base_url().$this->index());
		}
	}
}


?>