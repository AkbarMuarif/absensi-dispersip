<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {

    public function login($post)
    {
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', md5($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id_user=null)
    {
        $this->db->from('user');
        if($id_user != null){
            $this->db->where('id_user', $id_user);
        }
        $query = $this->db->get();
        return $query;
    }

    public function edit($post)
    {
        if ($post['password']!=null){
            $pw=md5($post['password']);
        } else {
            $pw=$post['passwordlama'];
        }
        $params = [
            'username' => $post['username'],
            'password' => $pw,
        ];
        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $params);
    }

}

?>