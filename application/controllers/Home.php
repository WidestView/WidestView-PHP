<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
        parent::__construct(); 
		$this->load->library('session');
	}
		
	public function index()
	{
		$this->load->view('templates/page-start.html');

		$this->load->view($_SESSION['logged_in'] ? 'templates/nav-logado1' : 'templates/nav-deslogado');
		
        $this->load->view('pages/parts/main-body.html');
	}

	public function auth(){
		$newdata = array(
			'username'  => 'Alemão',
			'codigo'     => 1,
			'logged_in' => TRUE
		);
		$this->session->unset_userdata(array('username', 'codigo', 'logged_in'));
		$this->session->set_userdata($newdata);

		$this->index();
	}

	private function login(){

	}

	public function logout(){
		$this->session->unset_userdata(array('username', 'codigo', 'logged_in'));
	}

}
