<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('user_model');
	}
		
	public function index($swal = '')
	{
		if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
		}

		$this->load->view('templates/page-start.html');

		$this->load->view($_SESSION['logged_in'] ? 'templates/nav-logado1' : 'templates/nav-deslogado');
		
		$this->load->view('pages/parts/main-body.html');
		
		switch ($swal){
			case 'login-success':
				$this->load->view('swals/login-success');
			break;
			case 'login-error':
				$this->load->view('swals/login-error');
			break;	
		}
	}

	public function login()
	{
		if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
		}

        $username = $this->input->post('email');
		$password = $this->input->post('password');
		
		$this->index($this->user_model->login($username, $password)? 'login-success':'login-error');
	}

	public function logout()
	{
		$this->user_model->logout();
		$this->index();
	}

}
