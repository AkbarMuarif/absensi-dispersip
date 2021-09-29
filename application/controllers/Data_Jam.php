<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_jam extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		cek_level();
		$this->load->model(['jam_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('jam_datang', 'Jam Masuk Kantor', 'required', 'required');
		$this->form_validation->set_rules('jam_pulang', 'Jam Pulang Kantor', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$query = $this->jam_m->get();

		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template','jam_kerja', $data);
			} else {
				echo "<script> alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('dashboard')."';</script>";
			}
		} else 
		{
			$this->jam_m->edit($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_jam')."';</script>";
			} else {
				echo "<script>
					alert('Data Tidak Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_jam')."';</script>";
			}
			
		}	
	}

}