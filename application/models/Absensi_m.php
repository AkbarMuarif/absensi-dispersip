<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_m extends CI_Model {

    public function get($id=null)
    {
        $this->db->select('tb_absensi.*, tb_pegawai.*');
        $this->db->from('tb_absensi');
        $this->db->join('tb_pegawai', 'tb_absensi.nip = tb_pegawai.nip');
        if($id != null){
            $this->db->where('id_absensi', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'id_absensi' => $post['id_absensi'],
            'nip' => $post['pegawai'],
            'tgl' => $post['tgl'],
            'jam' => $post['jam'],
            'ket' => $post['ket'],
        ];
        $this->db->insert('tb_absensi', $params);
    }

    public function edit($post)
    {
        $params = [
            'nip' => $post['pegawai'],
            'tgl' => $post['tgl'],
            'jam' => $post['jam'],
            'ket' => $post['ket'],
        ];
        $this->db->where('id_absensi', $post['id_absensi']);
        $this->db->update('tb_absensi', $params);
    }

    public function del($id)
	{
		$this->db->where('id_absensi', $id);
		$this->db->delete('tb_absensi');
    }
    
    public function id_auto()
    {
        date_default_timezone_set('Asia/Makassar');
        $sql = "SELECT MAX(MID(id_absensi,7,4)) AS id 
                FROM tb_absensi
                WHERE MID(id_absensi,1,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int)$row->id) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $nmr = date('ymd').$no;
        return $nmr;
    }

    public function datang($post)
    {
        date_default_timezone_set('Asia/Makassar');
        $nip=$post['pegawai'];
        $sql = "SELECT * 
                FROM tb_absensi
                WHERE MID(id_absensi,1,6) = DATE_FORMAT(CURDATE(),'%y%m%d') AND nip=$nip ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0){
            return FALSE;
        } else {
            $params = [
                'id_absensi' => $post['id_absensi'],
                'nip' => $post['pegawai'],
                'tgl' => $post['tgl'],
                'jam' => $post['jam'],
                'ket' => $post['ket'],
            ];
            $this->db->insert('tb_absensi', $params);
        }   
    }

    public function pulang($post)
    {
        date_default_timezone_set('Asia/Makassar');
        $nip=$post['pegawai'];
        $sql = "SELECT * 
                FROM tb_absensi
                WHERE MID(id_absensi,1,6) = DATE_FORMAT(CURDATE(),'%y%m%d') AND nip=$nip ";
        $id=$this->db->query($sql)->row()->id_absensi;
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0){
            $params = [
                'jam_pulang' => $post['jam_pulang'],
                'ket' => $post['ket'],
            ];
            $this->db->where('id_absensi', $id);
            $this->db->update('tb_absensi', $params);
        } else {
            return FALSE;
        }   
    }

    public function cetak($awal,$akhir)
    {
        $this->db->select('tb_absensi.*, tb_pegawai.*');
        $this->db->from('tb_absensi');
        $this->db->join('tb_pegawai', 'tb_absensi.nip = tb_pegawai.nip');
        if($awal != null && $akhir != null)
        {
            $this->db->where('tgl BETWEEN "'. date('Y-m-d', strtotime($awal)). '" and "'. date('Y-m-d', strtotime($akhir)).'"');
        }
        $query = $this->db->get();
        return $query;
    }

}

?>