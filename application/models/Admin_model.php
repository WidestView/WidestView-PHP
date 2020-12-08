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

                // REPRESENTANTE

                $rep_data = array('rep_nome'=>$data['rep_nome'], 'rep_nome_social'=>$data['rep_nome_social'], 'rep_cpf'=>$data['rep_cpf'], 'rep_sexo'=>$data['rep_sexo'], 'rep_telefone'=>$data['rep_telefone'], 'rep_cel'=>$data['rep_cel'], 'rep_email'=>$data['rep_email']);

                $rep = $this->db->insert('rep_cliente', $rep_data);

                $sql = "SELECT MAX(rep_codigo) FROM rep_cliente";

                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    $rep_cod = $row['MAX(rep_codigo)'];
                }

                //CLIENTE

                $cli_data = array('cli_nome'=>$data['cli_nome'], 'cli_cnpj'=>$data['cli_cnpj'], 'cli_codigo_representante'=>$rep_cod);

                $cli = $this->db->insert('cliente', $cli_data);

                return ($rep && $cli);
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