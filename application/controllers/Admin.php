<?php


class Admin extends CI_Controller
{
    public function __construct(){
        parent::__construct(); 
        $this->load->database();
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('templates/page-start.html');
        $this->load->view($logged ? 'templates/nav-logado1' : 'templates/nav-deslogado');
        $this->load->view('pages/parts/admin-body');
    }

    public function form(string $name)
    {
        $this->load->view("forms/$name");
    }

    public function tableQuery(string $type = ''){
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
}
