<?php

class Admin extends CI_Controller
{
    public function __construct(){
        parent::__construct(); 
        $this->load->database();
		$this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper('url');
    }

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

    public function tableQuery(string $type = ''){
        if(!isset($_SESSION['codigo'])){
            $this->user_model->sendSession();
        }
        
		if($_SESSION['access'] == 0){
            $this->not_access();
            return;
		}

        switch ($type){
            case 'funcionario':
                $data['queryData'] = [
                    ['Codigo', 'Nome','Nome Social','Sexo', 'RG', 'CPF', 'Nascimento', 'Telefone', 'Celular', 'Email', 'Acesso', 'Senha', 'Ativo'],
                ];

                $sql = "SELECT * FROM funcionario";
                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    array_push($data['queryData'],$row);
                }

                for($i = 0;$i<25;$i++){
                    array_push($data['queryData'], ['gay','gay','gay','gay','gay','gay','gay','gay','gay','gay','gay','gay','gay']);
                }
            break;
            default:
                $data['title'] = 'Error!';
                $data['text'] = 'Essa tabela não é valida';
                $data['icon'] = 'error';
                $this->load->view("templates/swal",$data);
                return;
            break;
        }

		$this->load->view("pages/admin/consulta",$data);
    }

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
        
        $data['events'] = ['beserrinha-gostos', 'tamax-horrivel-gay'];

        $this->load->view("pages/admin/default-calendar", $data);
        
        $this->load->view('templates/page-end.html');
    }

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
        
        $data['events'] = ['beserrinha-gostos', 'tamax-horrivel-gay'];

        $this->load->view("pages/admin/dashboard", $data);
        
        $this->load->view('templates/page-end.html');
    }
    
    private function not_access(){
        $data['heading'] = 'ACESS DENIED';
        $data['message'] = 'you must be admin';
        $this->load->view("errors/cli/error_general.php",$data);
    }
}
