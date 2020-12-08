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

                $sql = "SELECT * FROM cliente as c INNER JOIN rep_cliente as r on c.CLI_CODIGO_REPRESENTANTE = r.REP_CODIGO";

            break;
            case 'funcionario':

                $sql = "SELECT * FROM funcionario";

            break;
            case 'demanda':

                $sql = "SELECT * FROM projeto p INNER JOIN cliente c on p.PRO_CODIGO_CLIENTE = c.CLI_CODIGO INNER JOIN rep_cliente r ON r.REP_CODIGO = c.CLI_CODIGO_REPRESENTANTE";

            break;
            case 'servicos':

                $sql = "SELECT * FROM servico";

            break;
            case 'relatorio':

                $sql = "SELECT * FROM relatorio r INNER JOIN projeto p on p.PRO_CODIGO = r.CODIGO_PROJETO";

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
            case 'form-cad-demanda':
                return $this->db->insert('projeto', array('pro_nome'=>$data['pro_nome'], 'pro_descricao'=>$data['pro_descricao'], 'pro_codigo_cliente'=>$data['pro_codigo_cliente']));
            break;
            case 'form-cad-servico':
                return $this->db->insert('servico', $data);
            break;
            case 'form-relatorio':
                return $this->db->insert('relatorio', $data);
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

        $events = [];

        $sql = "SELECT pro_codigo, pro_nome, pro_descricao, pro_prazo FROM projeto";

        $query = $this->db->query($sql);

        foreach($query->result_array() as $row){
            $arr = array('id'=>$row['pro_codigo'], 'title'=>'Projeto: '.$row['pro_nome'], 'description'=>$row['pro_descricao'], 'start'=>$row['pro_prazo'], 'allDay'=>'true');
            array_push($events,$arr);
        }

        $sql = "SELECT codigo, dia, descricao FROM relatorio";

        $query = $this->db->query($sql);

        foreach($query->result_array() as $row){
            $arr = array('id'=>$row['codigo'], 'title'=>'Relatorio: '.$row['descricao'], 'description'=>$row['descricao'], 'start'=>$row['dia'], 'allDay'=>'true');
            array_push($events,$arr);
        }

        return $events;
    }

    public function getCli(){
        $sql = "SELECT cli_codigo, cli_nome FROM cliente";

        $query = $this->db->query($sql);

        return $query->result_array();

    }
    
    public function getDem(){
        $sql = "SELECT pro_codigo, pro_nome FROM projeto";

        $query = $this->db->query($sql);

        return $query->result_array();
    }
}
?>