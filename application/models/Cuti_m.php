<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('tb_cuti.*, tb_pegawai.*');
        $this->db->from('tb_cuti');
        $this->db->join('tb_pegawai', 'tb_cuti.nip = tb_pegawai.nip');
        if($id != null){
            $this->db->where('id_cuti', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'id_cuti' => $post['id_cuti'],
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'nip' => $post['pegawai'],
            'jenis_cuti' => $post['jenis_cuti'],
            'ket' => $post['ket'],
        ];
        $this->db->insert('tb_cuti', $params);
    }

    public function edit($post)
    {
        $params = [
            'tgl_mulai' => $post['tgl_mulai'],
            'tgl_selesai' => $post['tgl_selesai'],
            'nip' => $post['pegawai'],
            'jenis_cuti' => $post['jenis_cuti'],
            'ket' => $post['ket'],
        ];
        $this->db->where('id_cuti', $post['id_cuti']);
        $this->db->update('tb_cuti', $params);
    }

    public function del($id)
	{
		$this->db->where('id_cuti', $id);
		$this->db->delete('tb_cuti');
    }
    
    public function id_auto()
    {
        date_default_timezone_set('Asia/Makassar');
        $sql = "SELECT MAX(MID(id_cuti,11,4)) AS id 
                FROM tb_cuti
                WHERE MID(id_cuti,5,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->id) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $nmr = "CTI-".date('ymd').$no;
        return $nmr;
    }

    public function cetak($awal,$akhir)
    {
        $this->db->select('tb_cuti.*, tb_pegawai.*');
        $this->db->from('tb_cuti');
        $this->db->join('tb_pegawai', 'tb_cuti.nip = tb_pegawai.nip');
        if($awal != null && $akhir != null)
        {
            $this->db->where('tgl_mulai BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
        }
        $query = $this->db->get();
        return $query;
    }

}

?>