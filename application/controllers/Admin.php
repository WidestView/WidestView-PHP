<?php


class Admin extends CI_Controller
{
    public function index()
    {
        $logged = true;

        $this->load->view('templates/page-start.html');
        $this->load->view($logged ? 'templates/nav-logado1' : 'templates/nav-deslogado');
        $this->load->view('pages/parts/admin-body');
    }

    public function form(string $name)
    {
        $this->load->view("forms/$name");
    }
}
