<?php

class Admin extends CI_Controller
{
    public function __construct(){
        parent::__construct(); 
		$this->load->library('session');
        $this->load->model('user_model');
        $this->load->model('admin_model');
        $this->load->helper('url');
        $this->load->helper('form');
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

        $this->load->view("pages/admin/calendar", $data);
        
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
    public function form(string $form_name)
    {
        if(!isset($_SESSION['codigo'])){
			$this->user_model->sendSession();
        }
        
		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
        }
        
        $this->load->view("pages/admin/forms/$form_name");

    }

    //KINDA API
    public function form_send(string $form_name)
    {    
        $this->load->library('form_validation');

        if (count($_POST)>0) {

            $this->form_validation->set_data($_POST);
    
            switch($form_name){
                case 'form-cad-cliente':
                    $this->form_validation->set_rules('nome', 'nome', 'required');
                    $this->form_validation->set_rules('cnpj', 'cnpj', 'required');
                    $this->form_validation->set_rules('rep_nome', 'rep_nome', 'required');
                    $this->form_validation->set_rules('rep_nome_social', 'rep_nome_social', 'required');
                    $this->form_validation->set_rules('rep_email', 'rep_email', 'required');
                    $this->form_validation->set_rules('rep_cpf', 'rep_cpf', 'required');
                    $this->form_validation->set_rules('rep_sexo', 'rep_sexo', 'required');
                    $this->form_validation->set_rules('rep_tel', 'rep_tel', 'required');
                    $this->form_validation->set_rules('rep_cel', 'rep_cel', 'required');
                break;
                case 'form-cad-consultor':
                    $this->form_validation->set_rules('nome', 'nome', 'required');
                    $this->form_validation->set_rules('nome_social', 'nome_social', 'required');
                    $this->form_validation->set_rules('data_nascimento', 'data_nascimento', 'required');
                    $this->form_validation->set_rules('email', 'email', 'required');
                    $this->form_validation->set_rules('senha', 'senha', 'required');
                    $this->form_validation->set_rules('cpf', 'cpf', 'required');
                    $this->form_validation->set_rules('sexo', 'sexo', 'required');
                    $this->form_validation->set_rules('rg', 'rg', 'required');
                    $this->form_validation->set_rules('nivel_acesso', 'nivel_acesso', 'required');
                    $this->form_validation->set_rules('telefone', 'telefone', 'required');
                    $this->form_validation->set_rules('celular', 'celular', 'required');
                    $this->form_validation->set_rules('cargo', 'cargo', 'required');
                break;
                case 'form-cad-demanda':
                    $this->form_validation->set_rules('nome', 'nome', 'required');
                    $this->form_validation->set_rules('cliente', 'cliente', 'required');
                    $this->form_validation->set_rules('prazo', 'prazo', 'required');
                    $this->form_validation->set_rules('descricao', 'descricao', 'required');
                break;
                case 'form-cad-servico':
                    $this->form_validation->set_rules('nome', 'nome', 'required');
                    $this->form_validation->set_rules('descricao', 'descricao', 'required');
                break;
                default:
                    echo 'bad_url';
                break;
            }
    
            if ($this->form_validation->run() == TRUE) {
                if($this->admin_model->form($form_name, $_POST)){
                    echo 'success';
                }else{
                    echo 'failure';
                }

            } else {
                $error_associative_array = $this->form_validation->error_array();

                if(count($error_associative_array)>0){
                    foreach($error_associative_array as $error){
                        echo $error.'<br>';
                    }
                }else{
                    if($this->admin_model->form($form_name, $_POST)){
                        echo 'success';
                    }else{
                        echo 'failure';
                    }
                    
                }
            }
    
        } else {
            echo 'no-data';
        }
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
