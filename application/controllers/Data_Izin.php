<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Izin extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		cek_level();
		$this->load->model(['izin_m','pegawai_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{		
		$data['row'] = $this->izin_m->get();
		$data['hal'] = 'data';
		$this->template->load('template','izin/izin_data', $data);
    }
	
	public function add()
	{
		$this->form_validation->set_rules('id_izin', 'Nomor ID Izin', 'required|is_unique[tb_izin.id_izin]', array('is_unique' => '%s sudah digunakan'));
		$this->form_validation->set_rules('tgl', 'Tanggal izin', 'required', 'required');
		$this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required', 'required');
		$this->form_validation->set_rules('pegawai', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
		$post=$this->input->post(null, TRUE);
		$nmr=$this->izin_m->id_auto();

		//pegawai
        $query_pegawai = $this->pegawai_m->get();
		$pegawai[null] = '- Pilih -';
		foreach($query_pegawai->result() as $peg) {
			$pegawai[$peg->nip] = $peg->nip.' ('.ucfirst($peg->nama).')';
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'nmr'	 => $nmr,
				'pegawai' =>$pegawai, 
				'selectedunit' => null,
			);
			$this->template->load('template','izin/izin_tambah', $data);
		} else 
		{
			$this->izin_m->add($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Disimpan');
				</script>";
				echo "<script>window.location='".site_url('data_izin')."';</script>";
			} else
			{
				echo "<script>
					alert('Data Tidak Berhasil Disimpan');
				</script>";
				echo "<script>window.location='".site_url('data_izin')."';</script>";
			}
			
		}	
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('tgl', 'Tanggal izin', 'required', 'required');
		$this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required', 'required');
		$this->form_validation->set_rules('pegawai', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$query = $this->izin_m->get($id);

		//pegawai
		$query_pegawai = $this->pegawai_m->get();
		$pegawai[null] = '- Pilih -';
		foreach($query_pegawai->result() as $peg) {
			$pegawai[$peg->nip] = $peg->nip.' ('.ucfirst($peg->nama).')';
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0){
				$data = array (
					'row' => $query->row(),
					'pegawai' =>$pegawai, 
                    'selectedunit' => $query->row()->nip,
				);
				$this->template->load('template','izin/izin_ubah', $data);
			} else {
				echo "<script> alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('data_izin')."';</script>";
			}
		} else 
		{
			$this->izin_m->edit($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_izin')."';</script>";
			} else {
				echo "<script>
					alert('Data Tidak Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_izin')."';</script>";
			}
			
		}	
	}

	public function del($id)
	{
		$this->izin_m->del($id);
		$error = $this->db->error();

		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus(sudah berelasi)');</script>";
			echo "<script>window.location='".site_url('data_izin')."';</script>";
		}	
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data Telah Berhasil dihapus');
			</script>";
		}
		echo "<script>window.location='".site_url('data_izin')."';</script>";
	}
}