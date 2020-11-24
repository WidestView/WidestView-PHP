<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$this->load->view('templates/page-start.html');

		$logged = true;

        $this->load->view($logged ? 'templates/nav-logado1' : 'templates/nav-deslogado');


        $this->load->view('pages/parts/main-body.html');
	}

}
