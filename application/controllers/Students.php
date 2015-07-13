<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout', 'layout_main');

		if (!$this->tank_auth->is_logged_in()) {
			redirect('/');
		}
	}
	
	public function index()
	{
		if($this->tank_auth->get_user_group() != 'teacher') {
			redirect('');
		}

		$config['base_url'] = '/students/index/';
		$config['total_rows'] = $this->Students_model->record_count();
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

		$students = $this->Students_model->get($config['per_page'],$this->uri->segment(4)/*, ['group' => 'student']*/);

		$data = ['students' => $students, 'links' => $links, 'title' => 'Перелік студентів'];
		$this->layout->view('/students/index', $data);	
	}

	public function search()
	{
		if($this->tank_auth->get_user_group() != 'teacher') {
			redirect('');
		}

		$value = $this->input->get('value');
		if(!empty($value)) {			
			$query = $this->db->query("SELECT * FROM `user_profiles` WHERE `firstname` OR `lastname` LIKE '%$value%'");
			$results = $query->result();

			$data = ['title' => 'Пошук студента', 'results' => $results, 'value' => $value];
			$this->layout->view('/students/search', $data);		
		} else {
			redirect('');
		}	
	}

	public function view($id)
	{
		if($this->tank_auth->get_user_group() != 'teacher') {
			redirect('');
		}

		$profile = $this->Students_model->get_one($id);
		if(empty($profile)) redirect('/students');
		$activities = $this->Students_model->get_activity($id);
		$progress = $this->Students_model->get_progress($id);

		$data = ['profile' => $profile, 'activities' => $activities, 'progress' => $progress, 'title' => 'Перелік активності студента'];
		$this->layout->view('/students/view', $data);	
	}	

	public function edit($id = null)
	{
		if($this->tank_auth->get_user_group() != 'teacher') {
			redirect('');
		}

		$this->form_validation->set_rules('firstname', 'Ім\'я', 'required');		
		$this->form_validation->set_rules('lastname', 'Прізвище', 'required');
		$this->form_validation->set_rules('groupnum', 'Номер групи', 'required');
		
		if ($this->form_validation->run() == false) {			
			$profile = $this->Students_model->get_one($id);
			if(empty($profile)) redirect('/students');
			$groups = $this->Lectures_model->get_groups_all();

			$data = ['id' => $id, 'profile' => $profile, 'groups' => $groups, 'title' => 'Редагувати студента'];
			$this->layout->view('/students/edit', $data);			
		}
		else {
			
			$this->Lectures_model->update('user_profiles', $this->input->post(), $id);

			redirect('/students');
		}
	}

	public function delete($id)
	{
		if($this->tank_auth->get_user_group() != 'teacher') {
			redirect('');
		}

		$this->Students_model->delete($id);
	}

	public function lecture($id = null)
	{
		if($this->tank_auth->get_user_group() != 'student') {
			redirect('');
		}

		if(!$this->Lectures_model->check_visible($id)) redirect('/');
		$lectures = $this->Lectures_model->get_one($id);
		if(empty($lectures)) redirect('');

		$data = ['lectures' => $lectures, 'title' => $lectures[0]->title];
		$this->layout->view('/studpanel/lecture', $data);	
	}

	public function update()
	{
		if($this->tank_auth->get_user_group() != 'student') {
			redirect('');
		}

		$profile = $this->Students_model->get_one($this->tank_auth->get_user_id());

		$data = ['title' => 'Редагувати профіль', 'profile' => $profile];
		$this->layout->view('/studpanel/update', $data);
	}

	public function testing($id)
	{
		if($this->tank_auth->get_user_group() != 'student') {
			redirect('');
		}

		if(!$this->Lectures_model->check_visible($id)) redirect('/');

		$data = ['title' => 'Проходження тесту', 'id' => $id];
		$this->layout->view('/studpanel/tests', $data);
	}

	public function get_test($id = null, $quest = null)
	{
		if($this->tank_auth->get_user_group() != 'student') {
			redirect('');
		}

		$lecture = $this->Tests_model->get_name($id);
		$question_list = $this->Tests_model->get_questions($id);

		$correct = [];
		
		foreach($question_list as $question) {		
			$correct[] = $this->Tests_model->get_correct_answers($question->id);	
			$quest[] = [
				'question' => $question->question,
				'options' => $this->Tests_model->get_answers($question->id),
			];			
		}

		header('Content-Type: application/json;charset=utf-8');
        echo json_encode([
        	'id' => $id,        	
        	'title' => $lecture[0]->title,
        	'question_list' => $quest,        	
        	'correct_answ' => $correct,
        	]);
	}

	public function send_result()
	{
		if($this->tank_auth->get_user_group() != 'student') {
			redirect('');
		}

		if($_POST['bal'] > 3) {
			$data = [			
				'user_id' => $this->tank_auth->get_user_id(),
				'lecture_id' => $_POST['id'],
				'mark' => $_POST['bal']
			];

			$this->Tests_model->insert('progress', $data);
		}
	}
	
}
