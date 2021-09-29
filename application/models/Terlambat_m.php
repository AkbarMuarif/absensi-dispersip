<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terlambat_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('tb_terlambat.*, tb_pegawai.*');
        $this->db->from('tb_terlambat');
        $this->db->join('tb_pegawai', 'tb_terlambat.nip = tb_pegawai.nip');
        if($id != null){
            $this->db->where('id_terlambat', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'id_terlambat' => $post['id_terlambat'],
            'nip' => $post['pegawai'],
            'tgl' => $post['tgl'],
            'jam_kerja' => $post['jam_kerja'],
            'jam_datang' => $post['jam_datang'],
            'ket' => $post['ket'],
        ];
        $this->db->insert('tb_terlambat', $params);
    }

    public function edit($post)
    {
        $params = [
            'nip' => $post['pegawai'],
            'tgl' => $post['tgl'],
            'jam_kerja' => $post['jam_kerja'],
            'jam_datang' => $post['jam_datang'],
            'keterlambatan' => $post['keterlambatan'],
            'ket' => $post['ket'],
        ];
        $this->db->where('id_terlambat', $post['id_terlambat']);
        $this->db->update('tb_terlambat', $params);
    }

    public function del($id)
	{
		$this->db->where('id_terlambat', $id);
		$this->db->delete('tb_terlambat');
    }
    
    public function id_auto()
    {
        date_default_timezone_set('Asia/Makassar');
        $sql = "SELECT MAX(MID(id_terlambat,9,4)) AS id 
                FROM tb_terlambat
                WHERE MID(id_terlambat,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->id) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $nmr = "T-".date('ymd').$no;
        return $nmr;
    }

    public function telat($post)
    {
        $params = [
            'id_terlambat' => $post['id_terlambat'],
            'nip' => $post['pegawai'],
            'tgl' => $post['tgl'],
            'jam_kerja' => $post['jam_kerja'],
            'jam_datang' => $post['jam'],
        ];
        $this->db->insert('tb_terlambat', $params);
    }

    public function cetak($awal,$akhir)
    {
        $this->db->select('tb_terlambat.*, tb_pegawai.*');
        $this->db->from('tb_terlambat');
        $this->db->join('tb_pegawai', 'tb_terlambat.nip = tb_pegawai.nip');
        if($awal != null && $akhir != null)
        {
            $this->db->where('tgl BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
        }
        $query = $this->db->get();
        return $query;
    }
}

?>