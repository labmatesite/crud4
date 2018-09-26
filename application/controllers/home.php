<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('crudmodel');
		$this->load->library('session');
	}

	function index()
	{
		$data['data'] = $this->crudmodel->get();
		$this->load->view('index', $data);
		return true;
	}

	function insert(){
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'city' => $this->input->post('city'),
			'age' => $this->input->post('age')
		);
		$this->crudmodel->insertdata($data);
		$this->session->set_flashdata('success', 'successfully inserted data');
		redirect();
	}

	function update(){
		$id = $this->uri->segment(2);
		$data = $this->crudmodel->getbyid($id);
		foreach ($data as $value) {
			$newdata['update'] = $value;
		}
		$this->load->view('index', $newdata);
	}

	function updatedata(){
		$id = $this->input->post('id');
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'city'  => $this->input->post('city'),
			'age' => $this->input->post('age')
		);
		$this->crudmodel->editdata($data, $id);
		$this->session->set_flashdata('success', 'Successfully updated');
		redirect();
	}

	function deletedata(){
		$id = $this->uri->segment(2);
		$this->crudmodel->deletedata($id);
		$this->session->set_flashdata('danger','Record Deleted Successfully');
		redirect();
	}

	}