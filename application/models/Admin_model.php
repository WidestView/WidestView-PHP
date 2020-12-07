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
                    ['Codigo', 'CNPJ','Nome','rep_Codigo', 'rep_Nome'],
                ];

                $sql = "SELECT c.CODIGO, c.CNPJ, c.NOME, r.* FROM cliente c INNER JOIN rep_cliente r on c.CODIGO = r.CODIGO ";

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

                for($i = 0;$i<10;$i++){
                    array_push($result, ['40028922','Wellington','WellWell','M','12','4','2020-06-20','1','971024838','wellington@gmail.com','1','well123','1']);
                }

            break;
            case 'demanda':
                $result = [
                    ['Codigo', 'Nome','Nome Social','Sexo', 'RG', 'CPF', 'Nascimento', 'Telefone', 'Celular', 'Email', 'Acesso', 'Senha', 'Ativo'],
                ];

                $sql = "SELECT * FROM funcionario";

                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    array_push($result,$row);
                }

                for($i = 0;$i<10;$i++){
                    array_push($result, ['40028922','Wellington','WellWell','M','12','4','2020-06-20','1','971024838','wellington@gmail.com','1','well123','1']);
                }

            break;
            case 'servicos':
                $result = [
                    ['Codigo', 'Nome','Nome Social','Sexo', 'RG', 'CPF', 'Nascimento', 'Telefone', 'Celular', 'Email', 'Acesso', 'Senha', 'Ativo'],
                ];

                $sql = "SELECT * FROM funcionario";

                $query = $this->db->query($sql);

                foreach ($query->result_array() as $row)
                {
                    array_push($result,$row);
                }

                for($i = 0;$i<10;$i++){
                    array_push($result, ['40028922','Wellington','WellWell','M','12','4','2020-06-20','1','971024838','wellington@gmail.com','1','well123','1']);
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