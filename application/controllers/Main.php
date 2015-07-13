<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout', 'layout_main');
	}
	
	public function index()
	{
		if($this->tank_auth->is_logged_in()) {
			if($this->tank_auth->get_user_group() == 'student') {
				$user = $this->tank_auth->get_user_id();
				if($this->Lectures_model->check_lectures()) {
					if($this->Lectures_model->check_progress($user)) {
						$first = $lectures = $this->Lectures_model->get_last_progress_lecture($this->tank_auth->get_user_id());
						
						$lectures = $this->Lectures_model->get_other_lectures($first[0]['lecture_id']);
					} else {				
						$lectures = $this->Lectures_model->get_first_lecture();											
					}
				} else {
					$lectures = null;
				}

				$progress = $this->Lectures_model->get_progress($this->tank_auth->get_user_id());
							
				$data = ['lectures' => $lectures, 'progress' => $progress, 'title' => 'Перелік доступних лекцій'];

				$this->layout->view('/studpanel/index', $data);			
			} else {
				redirect('/lectures');							
			}
		} else {
			$data = ['title' => 'Засіб для онлайн-навчання'];
			$this->layout->view('/studpanel/main', $data);
		}	
		

		
	}
}
