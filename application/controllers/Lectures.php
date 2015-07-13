<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectures extends CI_Controller {

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
	
	public function index()
	{	
		$config['base_url'] = '/lectures/index/page/';
		$config['total_rows'] = $this->Lectures_model->record_count();
		$config['per_page'] = 10;		
		$config['full_tag_open'] = "<ul class='pagination pagination-sm'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		$this->pagination->initialize($config);

		if($this->uri->segment(4)){
			$page = ($this->uri->segment(4)) ;
		}
		else{
			$page = 1;
		}

		$links = $this->pagination->create_links();

		$lectures = $this->Lectures_model->get($config['per_page'],$this->uri->segment(4));

		$data = ['lectures' => $lectures, 'links' => $links, 'title' => 'Перелік лекцій'];
		
		if ($message = $this->session->flashdata('message')) {
			$data['message'] = $message;
		}

		$this->layout->view('/lectures/index', $data);		
	}

	public function delete($id = null)
	{
		$this->Lectures_model->delete($id);
	}

	public function search()
	{
		$value = $this->input->get('value');
		if(!empty($value)) {			
			$query = $this->db->query("SELECT * FROM `lectures` WHERE `title` LIKE '%$value%'");
			$results = $query->result();

			$data = ['title' => 'Пошук матеріалу', 'results' => $results, 'value' => $value];
			$this->layout->view('/lectures/search', $data);		
		} else {
			redirect('');
		}		
	}

	public function create()
	{
		$this->form_validation->set_rules('title', 'Заголовок', 'required');		
		$this->form_validation->set_rules('text', 'Лекція', 'required');
		
		if ($this->form_validation->run() == false) {			

			$categories = ['title' => 'Додати лекцію'];
			$this->layout->view('/lectures/create', $categories);			
		}
		else {
			$data = [
				'title' => $this->input->post('title'),				
				'title' => $this->input->post('title'),				
				'text' => $this->input->post('text'),
				'date_create' => time(),
			];

			$this->Lectures_model->insert('lectures', $data);

			$this->session->set_flashdata('message', '<b>Вітаємо!</b> Матеріал успішно доданий...');
			redirect('/lectures');
		}	
	}

	public function visible($id) {
		$this->Lectures_model->update('lectures', ['visible' => '1'], $id);
		redirect('/lectures');
	}

	public function unvisible($id) {
		$this->Lectures_model->update('lectures', ['visible' => '0'], $id);
		redirect('/lectures');
	}

	public function edit($id = null)
	{
		$this->form_validation->set_rules('title', 'Заголовок', 'required');		
		$this->form_validation->set_rules('text', 'Лекція', 'required');
		
		if ($this->form_validation->run() == false) {			
			$lecture = $this->Lectures_model->get_one($id);
			if(empty($lecture)) redirect('/lectures');

			$data = ['id' => $id, 'lecture' => $lecture, 'title' => 'Редагувати лекцію'];
			$this->layout->view('/lectures/edit', $data);			
		}
		else {
			$data = [
				'title' => $this->input->post('title'),				
				'title' => $this->input->post('title'),				
				'text' => $this->input->post('text'),
				'date_create' => time(),
			];

			$this->Lectures_model->update('lectures', $data, $id);
			$this->session->set_flashdata('message', '<b>Вітаємо!</b> Матеріал успішно оновлений...');
			redirect('/lectures');
		}	
	}

	public function view($id = null)
	{		
		$lectures = $this->Lectures_model->get_one($id);
		if(empty($lectures)) redirect('/lectures');

		$test = $this->Lectures_model->check_test($id);

		$data = ['lectures' => $lectures, 'test' => $test, 'title' => $lectures[0]->title];
		$this->layout->view('/lectures/view', $data);	
	}
}
