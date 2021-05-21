<?php

/**
 * 
 */
class User extends CI_controller
{
	function index()
	{
		//fetch all user data
		$this->load->model('User_model');
		$users=$this->User_model->all();
		$data=array();
		$data['users']=$users;
		//Reload view folder in file name list.php means list
		$this->load->view('list',$data);
	}

	function create()
	{
		$this->load->model('User_model');//model load

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');

		if ($this->form_validation->run()==false) 
		{
			$this->load->view('create');
		}
		else
		{
			//Save user form to database
			$formArray=array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$formArray['created_at']=date('Y-m-d');

			//model method use
			$this->User_model->create($formArray);

			//session message create
			$this->session->set_flashdata('success','Your record is a successfully');
			redirect(base_url().'index.php/user/index');
		}
	}

	function edit($userId)
	{
		$this->load->model('User_model');
		$user=$this->User_model->getUser($userId);
		$data=array();
		$data['user']=$user;

		//Update validation
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		if ($this->form_validation->run()==false) 
		{
			$this->load->view('edit',$data);
		}
		else
		{
			//update user record
			$formArray=array();
			$formArray['name']=$this->input->post('name');
			$formArray['email']=$this->input->post('email');
			$this->User_model->updateUser($userId,$formArray);
			$this->session->set_flashdata('success','Your record successfully');
			redirect(base_url().'index.php/user/index');
		}		
	}

	function delete($userId)
	{
		$this->load->model('User_model');
		$user=$this->User_model->getUser($userId);
		if (empty($user)) 
		{
			$this->session->set_flashdata('failure','Your record not found');
			redirect(base_url().'index.php/user/index');
		}
		$this->User_model->deleteUser($userId);
		$this->session->set_flashdata('success','Your record delete successfully');
		redirect(base_url().'index.php/user/index');
	}
}

?>