<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Groups extends CI_Controller {

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
		$config['base_url'] = '/groups/index/page/';
		$config['total_rows'] = $this->Lectures_model->record_count_groups();
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

		$groups = $this->Lectures_model->get_groups($config['per_page'],$this->uri->segment(4));

		$data = ['groups' => $groups, 'links' => $links, 'title' => 'Перелік груп'];
		$this->layout->view('/groups/index', $data);		
	}

	public function search()
	{

	}

	public function view($id = null)
	{
		$group = $this->Groups_model->get_name($id);
		if(empty($group)) redirect('/groups');
		$students = $this->Students_model->get_all(['groupnum' => $group[0]->num]);
		
		$data = ['title' => 'Успішність групи', 'num' => $group[0]->num, 'students' => $students];
		$this->layout->view('/groups/view', $data);
	}

	public function create()
	{		
		$this->form_validation->set_rules('num', 'Номер групи', 'required');
		
		if ($this->form_validation->run() == false) {	
			$data = ['title' => 'Додавання нової групи'];					
			$this->layout->view('/groups/create', $data);			
		}
		else {
			$this->Lectures_model->insert('groups', $this->input->post());
			redirect('/groups');
		}	
	}

	public function delete($id = null, $num = null)
	{
		$params = [
			'id' => $id,
		];

		$this->Groups_model->delete('groups', $params);

		$data = [
			'groupnum' => '',
		];

		$params = [
			'groupnum' => $num,
		];

		$this->Groups_model->update('user_profiles', $params, $data);
	}
}
