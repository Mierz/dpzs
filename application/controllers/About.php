<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout', 'layout_main');

		if($this->tank_auth->is_logged_in()) {
			redirect('/');
		}
	}

	public function index()
	{		
		$data = ['title' => 'Про проект'];
		$this->layout->view('/main/about', $data);	
	}

}