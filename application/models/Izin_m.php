<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('tb_izin.*, tb_pegawai.*');
        $this->db->from('tb_izin');
        $this->db->join('tb_pegawai', 'tb_izin.nip = tb_pegawai.nip');
        if($id != null){
            $this->db->where('id_izin', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'id_izin' => $post['id_izin'],
            'nip' => $post['pegawai'],
            'tgl' => $post['tgl'],
            'jam_keluar' => $post['jam_keluar'],
            'ket' => $post['ket'],
        ];
        $this->db->insert('tb_izin', $params);
    }

    public function edit($post)
    {
        $params = [
            'nip' => $post['pegawai'],
            'tgl' => $post['tgl'],
            'jam_keluar' => $post['jam_keluar'],
            'ket' => $post['ket'],
        ];
        $this->db->where('id_izin', $post['id_izin']);
        $this->db->update('tb_izin', $params);
    }

    public function del($id)
	{
		$this->db->where('id_izin', $id);
		$this->db->delete('tb_izin');
    }
    
    public function id_auto()
    {
        date_default_timezone_set('Asia/Makassar');
        $sql = "SELECT MAX(MID(id_izin,11,4)) AS id 
                FROM tb_izin
                WHERE MID(id_izin,5,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->id) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $nmr = "IZN-".date('ymd').$no;
        return $nmr;
    }
    
    public function cetak($awal,$akhir)
    {
        $this->db->select('tb_izin.*, tb_pegawai.*');
        $this->db->from('tb_izin');
        $this->db->join('tb_pegawai', 'tb_izin.nip = tb_pegawai.nip');
        if($awal != null && $akhir != null)
        {
            $this->db->where('tgl BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
        }
        $query = $this->db->get();
        return $query;
    }
}

?>