<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Pegawai extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		cek_level();
		$this->load->model(['pegawai_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{		
		$data['row'] = $this->pegawai_m->get();
		$data['hal'] = 'data';
		$this->template->load('template','pegawai/pegawai_data', $data);
    }
	
	public function add()
	{
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required|is_unique[tb_pegawai.nip]', array('is_unique' => '%s sudah digunakan'));
		$this->form_validation->set_rules('nama', 'Nama Pegawai', 'required', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
		$post=$this->input->post(null, TRUE);
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template','pegawai/pegawai_tambah');
		} else 
		{
			$this->pegawai_m->add($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Disimpan');
				</script>";
				echo "<script>window.location='".site_url('data_pegawai')."';</script>";
			} else
			{
				echo "<script>
					alert('Data Tidak Berhasil Disimpan');
				</script>";
				echo "<script>window.location='".site_url('data_pegawai')."';</script>";
			}
			
		}	
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Pegawai', 'required', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$query = $this->pegawai_m->get($id);

		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template','pegawai/pegawai_ubah', $data);
			} else {
				echo "<script> alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('data_pegawai')."';</script>";
			}
		} else 
		{
			$this->pegawai_m->edit($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_pegawai')."';</script>";
			} else {
				echo "<script>
					alert('Data Tidak Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_pegawai')."';</script>";
			}
			
		}	
	}

	public function del($id)
	{
		$this->pegawai_m->del($id);
		$error = $this->db->error();

		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus(sudah berelasi)');</script>";
			echo "<script>window.location='".site_url('data_pegawai')."';</script>";
		}	
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data Telah Berhasil dihapus');
			</script>";
		}
		echo "<script>window.location='".site_url('data_pegawai')."';</script>";
	}

}