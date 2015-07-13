<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tests extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout', 'layout_main');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/');
		} elseif($this->tank_auth->get_user_group() != 'teacher') {
			redirect('/');
		} 
	}
	
	public function view($id = null) {
		$tests = $this->Lectures_model->get_tests($id);
		$lecture = $this->Lectures_model->get_one($id);
		//print_r($lecture);

		$data = ['tests' => $tests, 'id' => $id, 'title' => 'Перелік питань', 'lecture_title' => $lecture[0]->title, 'lecture_href' => $lecture[0]->id];
		$this->layout->view('/tests/view', $data);			
	}

	public function edit($id = null) {
		$this->form_validation->set_rules('text', 'Відповідь', 'required');		
				
		if ($this->form_validation->run() == false) {			
			$answers = $this->Lectures_model->get_answers($id);
			$data = ['id' => $id, 'answers' => $answers, 'title' => 'Редагування тесту'];
			$this->layout->view('/tests/edit', $data);			
		}
		else {
			$data = [
				'test_id' => $id,				
				'text' => $this->input->post('text'),	
				'true' => $this->input->post('true'),	
			];

			$this->Lectures_model->insert('questions', $data);

			redirect('/tests/edit/' . $id);
		}
	}

	public function create($id = null) {
		$this->form_validation->set_rules('question', 'Питання', 'required');		
				
		if ($this->form_validation->run() == false) {			

			$data = ['id' => $id, 'title' => 'Додати питання'];
			$this->layout->view('/tests/create', $data);			
		}
		else {
			$data = [
				'lecture_id' => $id,				
				'question' => $this->input->post('question'),	
			];

			$this->Lectures_model->insert('tests', $data);

			redirect('/tests/edit/' . $this->db->insert_id());
		}	
	}

	public function delete($id, $value) {
		$params = [
			'id' => $id
		];

		if($value == 'question') {
			$this->Tests_model->delete('tests', $params);

			$params = [
				'test_id' => $id
			];
			$this->Tests_model->delete('questions', $params);
		}

		if($value == 'answer') {
			$this->Tests_model->delete('questions', $params);
		}
	}
	
	
}
