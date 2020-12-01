<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->helper('url');
	}
		
	public function index()
	{
		if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
		}

		$this->load->view('templates/page-start.html');

		$this->load->view($_SESSION['logged_in'] ? 'templates/nav-logado1' : 'templates/nav-deslogado');
		
		$this->load->view('pages/index/index.html');
		
		$swal = $this->session->flashdata('swal');
		
		switch ($swal){
			case 'login-success':
				$data['title'] = 'Bem vindo!';
                $data['message'] = 'Você entrou com sucesso';
                $this->load->view("swals/success",$data);
			break;
			case 'login-error':
				$data['title'] = 'Credenciais Invalidas!';
                $data['message'] = 'Login ou Senha incorretos';
				$this->load->view("swals/error",$data);
			break;
			case 'logout':
				$data['title'] = 'Tchau Tchau!';
                $data['message'] = 'Você se deslogou com sucesso';
                $this->load->view("swals/success",$data);
			break;	
			default:
			break;
		}

		$this->load->view('templates/page-end.html');
	}

	// POST
	public function login()
	{
		if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
		}

        $username = $this->input->post('email');
		$password = $this->input->post('password');

		if($this->user_model->login($username, $password)){
			$this->session->set_flashdata('swal', 'login-success');
		}else{
			$this->session->set_flashdata('swal', 'login-error');
		}

		redirect(base_url()."home/index");
	}

	public function logout()
	{
		$this->user_model->logout();
		$this->session->set_flashdata('swal','logout');
		redirect(base_url()."home/index");
	}

}
