<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jam_m extends CI_Model {

    public function get($id=1)
    {
        $this->db->select('*');
        $this->db->from('tb_kerja');
        if($id != null){
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function edit($post)
    {
        $params = [
            'jam_datang' => $post['jam_datang'],
            'jam_pulang' => $post['jam_pulang'],
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('tb_kerja', $params);
    }

}

?>