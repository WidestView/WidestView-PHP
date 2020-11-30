<?php


class Admin extends CI_Controller
{
    public function __construct(){
        parent::__construct(); 
        $this->load->database();
		$this->load->library('session');
		$this->load->model('user_model');
    }

    public function index()
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
        $this->load->view('pages/parts/admin-body');
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

        $this->load->view("forms/$name");
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
                    ['Codigo', 'Nome']
                ];

                $sql = "SELECT * FROM funcionario";
                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    array_push($data['queryData'],$row);
                }
            break;
            default:
                $data['heading'] = 'Invalid type in tableQuery';
                $data['message'] = $type.' is not a valid type';
                $this->load->view("errors/cli/error_general.php",$data);
                return;
            break;
        }

		$this->load->view("query/consulta.php",$data);
    }
    
    private function not_access(){
        $data['heading'] = 'ACESS DENIED';
        $data['message'] = 'you must be admin';
        $this->load->view("errors/cli/error_general.php",$data);
    }
}
