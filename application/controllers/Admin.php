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
        switch($form_name){
            case 'form-cad-demanda':

                $data['clientes'] = $this->admin_model->getCli();

                $this->load->view("pages/admin/forms/$form_name", $data);
            break;
            case 'form-relatorio':

                $data['demanda'] = $this->admin_model->getDem();

                $this->load->view("pages/admin/forms/$form_name", $data);
            break;
            default:
                $this->load->view("pages/admin/forms/$form_name");
            break;
        }



    }

    //KINDA API
    public function form_send(string $form_name)
    {    
        if(!isset($_SESSION['codigo'])){
            $this->user_model->sendSession();
        }
        
		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
        }
        
        $this->load->library('form_validation');

        if (count($_POST)>0) {

            $this->form_validation->set_data($_POST);
    
            switch($form_name){
                case 'form-cad-cliente':
                    $this->form_validation->set_rules('cli_nome', 'cli_nome', 'required');
                    $this->form_validation->set_rules('cli_cnpj', 'cli_cnpj', 'required');
                    $this->form_validation->set_rules('rep_nome', 'rep_nome', 'required');
                    $this->form_validation->set_rules('rep_nome_social', 'rep_nome_social', 'required');
                    $this->form_validation->set_rules('rep_email', 'rep_email', 'required');
                    $this->form_validation->set_rules('rep_cpf', 'rep_cpf', 'required');
                    $this->form_validation->set_rules('rep_sexo', 'rep_sexo', 'required');
                    $this->form_validation->set_rules('rep_telefone', 'rep_telefone', 'required');
                    $this->form_validation->set_rules('rep_cel', 'rep_cel', 'required');
                break;
                case 'form-cad-consultor':
                    $this->form_validation->set_rules('fun_nome', 'fun_nome', 'required');
                    $this->form_validation->set_rules('fun_nome_social', 'fun_nome_social', 'required');
                    $this->form_validation->set_rules('fun_nascimento', 'fun_nascimento', 'required');
                    $this->form_validation->set_rules('fun_email', 'fun_email', 'required');
                    $this->form_validation->set_rules('fun_senha', 'fun_senha', 'required');
                    $this->form_validation->set_rules('fun_cpf', 'fun_cpf', 'required');
                    $this->form_validation->set_rules('fun_sexo', 'fun_sexo', 'required');
                    $this->form_validation->set_rules('fun_rg', 'fun_rg', 'required');
                    $this->form_validation->set_rules('fun_nivelacesso', 'fun_nivelacesso', 'required');
                    $this->form_validation->set_rules('fun_telefone', 'fun_telefone', 'required');
                    $this->form_validation->set_rules('fun_cel', 'fun_cel', 'required');
                    $this->form_validation->set_rules('fun_cargo', 'fun_cargo', 'required');
                break;
                case 'form-cad-demanda':
                    $this->form_validation->set_rules('pro_nome', 'pro_nome', 'required');
                    $this->form_validation->set_rules('pro_descricao', 'pro_descricao', 'required');
                    $this->form_validation->set_rules('pro_codigo_cliente', 'pro_codigo_cliente', 'required');
                break;
                case 'form-cad-servico':
                    $this->form_validation->set_rules('ser_nome', 'ser_nome', 'required');
                    $this->form_validation->set_rules('ser_descricao', 'ser_descricao', 'required');
                break;
                case 'form-relatorio':
                    $this->form_validation->set_rules('dia', 'nome', 'required');
                    $this->form_validation->set_rules('descricao', 'descricao', 'required');
                    $this->form_validation->set_rules('codigo_projeto', 'codigo_projeto', 'required');
                break;
                default:
                    echo 'bad_url';
                    return;
                break;
            }
    
            if ($this->form_validation->run() == TRUE) {
                // echo $this->admin_model->form($form_name, $_POST); //DEBUG
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
    
    //Calendar API
    public function calendarAPI(){
        if(!isset($_SESSION['codigo'])){
            $this->user_model->sendSession();
        }
        
		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
        }
        
        echo json_encode($this->admin_model->calendarEvents());
    }

    //Dashboard API
    public function dashboardAPI(){
        if(!isset($_SESSION['codigo'])){
            $this->user_model->sendSession();
        }
        
        if($_SESSION['access'] == 0){
            $this->not_access();
            return;
        }
        
        echo json_encode($this->admin_model->dashboardData());
    }

    //PARTIAL PAGE
    private function not_access(){
        $data['heading'] = 'ACESS DENIED';
        $data['message'] = 'you must be admin';
        $this->load->view("errors/cli/error_general.php", $data);
    }
}
