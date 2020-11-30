<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User_model  extends CI_Model {

    public function __construct(){
        parent::__construct(); 
        $this->load->database();
        $this->load->library('session');
    }
    
	public function login(string $user, string $pass){
        $sql = "SELECT CODIGO, NOME_SOCIAL, NIVELACESSO FROM funcionario WHERE EMAIL = ? AND SENHA = ?";
        $query = $this->db->query($sql, array($user,$pass));

        $row = $query->row_array();

        if (isset($row))
        {
            $newdata = array(
                'username'  => $row['NOME_SOCIAL'],
                'codigo'    => $row['CODIGO'],
                'access'     => $row['NIVELACESSO'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            return true;
        }else{
            return false;
        }
	}

	public function logout(){
		$this->sendSession();
    }

    public function sendSession(){
		$newdata = array(
			'username'  => '',
			'codigo'    => 0,
			'access'     => 0,
			'logged_in' => FALSE
		);
        $this->session->set_userdata($newdata);
    }
}
?>