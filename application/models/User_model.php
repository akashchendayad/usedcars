<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model
{
    protected $tbl = 'tbl_users';

   
    public function insert_user(array $data) {
        $this->db->insert($this->tbl, $data);
        return $this->db->insert_id();
    }

 
    public function user_login($username, $password)
    {
        $this->db->where('username', $username);
        $q = $this->db->get($this->tbl);

        if( $q->num_rows() ) 
        {
            $user_pass = $q->row('password');
            if(md5($password) === $user_pass) {
                return $q->row();
            }
            return FALSE;
        }else{
            return FALSE;
        }
    }

    public function fetch_all_users() {
        return $this->db->select()->from($this->tbl)->get()->result();
    }
}
