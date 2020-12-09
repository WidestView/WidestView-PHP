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

                $sql = "SELECT CLI_CODIGO AS 'Código&nbspdo&nbspCliente', CLI_NOME AS 'Nome&nbspdo&nbspCliente', CLI_CNPJ AS 'CNPJ&nbspdo&nbspCliente',
                REP_CODIGO AS 'Código&nbspdo&nbspRepresentante', REP_NOME AS 'Nome&nbspdo&nbspRepresentante', REP_NOME_SOCIAL AS 'Nome&nbspSocial&nbspdo&nbspRepresentante', REP_CPF AS 'CPF&nbspdo&nbspRepresentante', REP_SEXO AS 'Sexo&nbspdo&nbspRepresentante',
                REP_TELEFONE AS 'Telefone&nbspdo&nbspRepresentante', REP_CEL AS 'Celular&nbspdo&nbspRepresentante', REP_EMAIL AS 'Email&nbspdo&nbspRepresentante' FROM cliente as c INNER JOIN rep_cliente as r on c.CLI_CODIGO_REPRESENTANTE = r.REP_CODIGO";

            break;
            case 'funcionario':

                $sql = "SELECT FUN_CODIGO AS 'Código', FUN_NOME AS 'Nome', FUN_NOME_SOCIAL AS 'Nome&nbspSocial', FUN_SEXO AS 'Sexo',
                FUN_RG AS 'RG', FUN_CPF AS 'CPF', FUN_NASCIMENTO AS 'Data_de_Nascimento', FUN_TELEFONE AS 'Telefone', FUN_CEL AS 'Celular',
                FUN_EMAIL AS 'Email', FUN_NIVELACESSO AS 'Nível&nbspde&nbspAcesso', FUN_SENHA AS 'Senha', FUN_CARGO AS 'Cargo', FUN_ATIVO AS 'Funcionário&nbspAtivo' FROM funcionario";

            break;
            case 'demanda':

                $sql = "SELECT PRO_CODIGO AS 'Código', PRO_NOME AS 'Nome', PRO_DESCRICAO AS 'Descrição', PRO_ATIVO AS 'Demanda&nbspAtivo', PRO_CODIGO_CLIENTE AS 'Código&nbspdo&nbspCliente' , PRO_PRAZO AS 'Prazo'
                FROM projeto p INNER JOIN cliente c on p.PRO_CODIGO_CLIENTE = c.CLI_CODIGO INNER JOIN rep_cliente r ON r.REP_CODIGO = c.CLI_CODIGO_REPRESENTANTE";

            break;
            case 'servicos':

                $sql = "SELECT SER_CODIGO AS 'Código', SER_NOME AS 'Nome', SER_DESCRICAO AS 'Descrição', SER_ATIVO AS 'Serviço&nbspAtivo' FROM servico";

            break;
            case 'relatorio':

                $sql = "SELECT CODIGO AS 'Código', DIA AS 'Dia', DESCRICAO AS 'Descrição', CODIGO_PROJETO AS 'Código&nbspdo&nbspProjeto' FROM relatorio r INNER JOIN projeto p on p.PRO_CODIGO = r.CODIGO_PROJETO";

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
                return $this->db->insert('projeto', $data);
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
        $data = [
            'clientes' => 0,
            'consultores' => 0,
            'demandas' => 0,
            'relatorios' => 0,
            'dataRela' => [],
            'dataDem' => []
        ];

        $sql = "SELECT COUNT(*) FROM cliente";

        $query = $this->db->query($sql);

        foreach($query->result_array() as $row){
           $data['clientes'] = $row['COUNT(*)'];
        }

        $sql = "SELECT COUNT(*) FROM funcionario";

        $query = $this->db->query($sql);

        foreach($query->result_array() as $row){
           $data['consultores'] = $row['COUNT(*)'];
        }

        $sql = "SELECT COUNT(*) FROM projeto";

        $query = $this->db->query($sql);

        foreach($query->result_array() as $row){
           $data['demandas'] = $row['COUNT(*)'];
        }

        $sql = "SELECT COUNT(*) FROM relatorio";

        $query = $this->db->query($sql);

        foreach($query->result_array() as $row){
           $data['relatorios'] = $row['COUNT(*)'];
        }

        $year = date("Y");

        // Relatorios
        for($month = 1; $month<13; $month++){
            $sql = "SELECT COUNT(codigo) as qtd FROM relatorio WHERE MONTH(dia) = ? AND YEAR(dia) = ?";

            $query = $this->db->query($sql, array($month, $year));
    
            foreach($query->result_array() as $row){
               array_push($data['dataRela'], $row['qtd']);
            }
        }

        // PROJETOS
        for($month = 1; $month<13; $month++){
            $sql = "SELECT COUNT(PRO_CODIGO) as qtd FROM projeto WHERE MONTH(PRO_PRAZO) = ? AND YEAR(PRO_PRAZO) = ?";

            $query = $this->db->query($sql, array($month, $year));
    
            foreach($query->result_array() as $row){
               array_push($data['dataDem'], $row['qtd']);
            }
        }
    
        return $data;
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