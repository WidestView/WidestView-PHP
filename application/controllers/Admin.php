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
        
        $this->load->view('pages/admin/admin');

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
                $this->load->view('templates/page-start.html');
                $this->load->view($_SESSION['logged_in'] ? 'templates/nav-logado1' : 'templates/nav-deslogado');
                $this->load->view('pages/admin/admin');
				$data['title'] = 'Error!';
                $data['message'] = 'Essa tabela não é valida "'.$type.'"';
                $this->load->view("swals/error",$data);
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
        
        $data['events'] = ['beserrinha-gostos', 'tamax-horrivel-gay'];

		$this->load->view("pages/admin/default-calendar",$data);
    }
    
    private function not_access(){
        $data['heading'] = 'ACESS DENIED';
        $data['message'] = 'you must be admin';
        $this->load->view("errors/cli/error_general.php",$data);
    }
}
