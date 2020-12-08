<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model  extends CI_Model {

    public function __construct(){
        parent::__construct(); 
        $this->load->database();
        $this->load->library('session');
    }

    public function query(string $type){

        $result = [];

        $sql = "";
        switch ($type){
            case 'cliente':

                $sql = "SELECT * FROM cliente as c INNER JOIN rep_cliente as r on c.CLI_CODIGO = r.REP_CODIGO";

            break;
            case 'funcionario':

                $sql = "SELECT * FROM funcionario";

            break;
            case 'demanda':

                $sql = "SELECT * FROM projeto p INNER JOIN cliente c on p.PRO_CODIGO = c.CLI_CODIGO INNER JOIN rep_cliente r ON r.REP_CODIGO = c.CLI_CODIGO";

            break;
            case 'servicos':

                $sql = "SELECT * FROM servico";

            break;
            default:
                return null;
            break;
        }

        $query = $this->db->query($sql);

        $i = true;
        foreach ($query->result_array() as $row)
        {
            if($i){ array_push($result,array_keys($row)); $i=false; }
            array_push($result,$row);
        }

        return $result;
    }

    public function form($form_name, $data){
        switch ($form_name){
            case 'form-cad-cliente':
                return false;

                //SPLIT INTO REPRESENTANTE AND CLIENTE

                return $this->db->insert('cliente', $data);  
            break;
            case 'form-cad-consultor':
                return $this->db->insert('funcionario', $data);
            break;
            case 'form-cad-servico':
                return $this->db->insert('servico', $data);
            break;
            default:
                return false;
            break;
        }
    }

    public function dashboardData(){
        return true;
    }

    public function calendarEvents(){
        return true;
    }
    
}
?>