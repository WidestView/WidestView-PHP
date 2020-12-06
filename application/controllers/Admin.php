<?php

class Admin extends CI_Controller
{
    public function __construct(){
        parent::__construct(); 
		$this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->helper('url');
    }

    // FULL PAGE
    public function selector()
    {
        if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
        }

		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
        }
        
		$this->load->view('templates/page-start.html');

		$this->load->view($_SESSION['logged_in'] ? 'templates/nav-logado1' : 'templates/nav-deslogado');
        
        $this->load->view('pages/admin/selector');

        $this->load->view('templates/page-end.html');
    }

    // FULL PAGE
    public function calendar(){
        if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
        }

		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
        }
        
		$this->load->view('templates/page-start.html');

        $this->load->view($_SESSION['logged_in'] ? 'templates/nav-logado1' : 'templates/nav-deslogado');
        
        $data['events'] = $this->admin_model->calendarEvents();

        $this->load->view("pages/admin/default-calendar", $data);
        
        $this->load->view('templates/page-end.html');
    }

    //FULL PAGE
    public function dashboard(){
        if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
        }

		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
        }
        
		$this->load->view('templates/page-start.html');

        $this->load->view($_SESSION['logged_in'] ? 'templates/nav-logado1' : 'templates/nav-deslogado');

        $data['dashboardData'] = $this->admin_model->dashboardData();

        $this->load->view("pages/admin/dashboard", $data);
        
        $this->load->view('templates/page-end.html');
    }

    //PARTIAL PAGE
    public function form(string $name)
    {
        if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
        }
        
		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
		}

        $this->load->view("pages/admin/forms/$name");
    }

    //PARTIAL PAGE
    public function tableQuery(string $type = ''){
        if(!isset($_SESSION['codigo'])){
            $this->user_model->sendSession();
        }
        
		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
		}

        $data['queryData'] = $this->admin_model->query($type);

        if($data['queryData'] == null){
            $data['title'] = 'Error!';
            $data['text'] = 'Essa tabela não é valida';
            $data['icon'] = 'error';
            $this->load->view("templates/swal",$data);
        }

		$this->load->view("pages/admin/consulta",$data);
    }
    
    //PARTIAL PAGE
    private function not_access(){
        $data['heading'] = 'ACESS DENIED';
        $data['message'] = 'you must be admin';
        $this->load->view("errors/cli/error_general.php", $data);
    }
}
