<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('*');
        $this->db->from('tb_pegawai');
        if($id != null){
            $this->db->where('nip', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nip' => $post['nip'],
            'nama' => $post['nama'],
            'jk' => $post['jk'],
            'no_telp' => $post['no_telp'],
            'jabatan' => $post['jabatan'],
            'alamat' => $post['alamat'],
        ];
        $this->db->insert('tb_pegawai', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama' => $post['nama'],
            'jk' => $post['jk'],
            'no_telp' => $post['no_telp'],
            'jabatan' => $post['jabatan'],
            'alamat' => $post['alamat'],
        ];
        $this->db->where('nip', $post['nip']);
        $this->db->update('tb_pegawai', $params);
    }
    
    public function del($id)
	{
		$this->db->where('nip', $id);
		$this->db->delete('tb_pegawai');
    }
}

?>