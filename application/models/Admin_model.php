<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_model  extends CI_Model {

    public function __construct(){
        parent::__construct(); 
        $this->load->database();
        $this->load->library('session');
    }

    public function query(string $type){

        switch ($type){
            case 'cliente':
                $result = [
                    ['Codigo', 'CNPJ','Nome','rep_Codigo', 'rep_Nome', 'rep_Nome Social', 'rep_CPF', 'rep_Sexo', 'rep_Telefone', 'rep_Celular', 'rep_Email'],
                ];

                $sql = "SELECT c.CODIGO, c.CNPJ, c.NOME, r.* FROM cliente c INNER JOIN rep_cliente r on c.CODIGO = r.CODIGO";

                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    array_push($result,$row);
                }

            break;
            case 'funcionario':
                $result = [
                    ['Codigo', 'Nome','Nome Social','Sexo', 'RG', 'CPF', 'Nascimento', 'Telefone', 'Celular', 'Email', 'Acesso', 'Senha', 'Ativo'],
                ];

                $sql = "SELECT * FROM funcionario";

                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    array_push($result,$row);
                }

            break;
            case 'demanda':
                $result = [
                    ['Codigo', 'Desc','Ativo','cli_Codigo', 'cli_Nome', 'cli_CNPJ', 'rep_Codigo', 'rep_CPF', 'rep_Nome Social', 'rep_Email'],
                ];

                $sql = "SELECT p.CODIGO, p.DESCRICAO, p.ATIVO, c.CODIGO, c.NOME, c.CNPJ, r.CODIGO, r.CPF, r.NOME_SOCIAL, r.EMAIL FROM projeto p INNER JOIN cliente c on p.CODIGO_CLIENTE = c.CODIGO INNER JOIN rep_cliente r ON r.CODIGO = c.CODIGO";

                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    array_push($result,$row);
                }

            break;
            case 'servicos':
                $result = [
                    ['Codigo', 'Nome', 'Desc', 'Ativo'],
                ];

                $sql = "SELECT * FROM servico";

                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    array_push($result,$row);
                }

            break;
            default:
                return null;
            break;
        }

        return $result;
    }

    public function form($type, $data){
        switch ($type){
            case 'funcionario':
                // CAD
            break;
            default:
                return false;
            break;
        }

        return true;
    }

    public function dashboardData(){
        return true;
    }

    public function calendarEvents(){
        return true;
    }
    
}
?>