<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Terlambat extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		cek_level();
		$this->load->model(['terlambat_m','pegawai_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{		
		$data['row'] = $this->terlambat_m->get();
		$data['hal'] = 'data';
		$this->template->load('template','terlambat/terlambat_data', $data);
    }
	
	public function add()
	{
		$this->form_validation->set_rules('id_terlambat', 'ID Data Terlambat', 'required|is_unique[tb_terlambat.id_terlambat]', array('is_unique' => '%s sudah digunakan'));
        $this->form_validation->set_rules('pegawai', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam_datang', 'Jam Kedatangan', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
		$post=$this->input->post(null, TRUE);
		$nmr=$this->terlambat_m->id_auto();

        $query_pegawai = $this->pegawai_m->get();
		$pegawai[null] = '- Pilih -';
		foreach($query_pegawai->result() as $peg) {
			$pegawai[$peg->nip] = $peg->nip.' ('.ucfirst($peg->nama).')';
		}
        
		if ($this->form_validation->run() == FALSE)
		{
            $data = array (
				'nmr'	 => $nmr,
                'pegawai' =>$pegawai, 
                'selectedunit' => null,
            );
			$this->template->load('template','terlambat/terlambat_tambah', $data);
		} else 
		{		
			$this->terlambat_m->add($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Disimpan');
				</script>";
				echo "<script>window.location='".site_url('data_terlambat')."';</script>";
			} else
			{
				echo "<script>
					alert('Data Tidak Berhasil Disimpan');
				</script>";
				echo "<script>window.location='".site_url('data_terlambat')."';</script>";
			}
		}	
	}

	public function edit($id)
	{
        $this->form_validation->set_rules('pegawai', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
		$this->form_validation->set_rules('jam_datang', 'Jam Kedatangan', 'required');
		$this->form_validation->set_rules('ket', 'Keterangan', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$query = $this->terlambat_m->get($id);

        $query_pegawai = $this->pegawai_m->get();
		$pegawai[null] = '- Pilih -';
		foreach($query_pegawai->result() as $peg) {
			$pegawai[$peg->nip] = $peg->nip.' ('.ucfirst($peg->nama).')';
		}
        
		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0)
			{
				$data = array (
					'row' => $query->row(),
					'pegawai' =>$pegawai, 
                    'selectedunit' => $query->row()->nip,
				);
				$this->template->load('template','terlambat/terlambat_ubah', $data);
			} else {
				echo "<script> alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('data_terlambat')."';</script>";
			}
		} else 
		{
			$this->terlambat_m->edit($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_terlambat')."';</script>";
			} else {
				echo "<script>
					alert('Data Tidak Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_terlambat')."';</script>";
			}
		}	
	}

	public function del($id)
	{
		$this->terlambat_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus(sudah berelasi)');</script>";
			echo "<script>window.location='".site_url('data_terlambat')."';</script>";
		}	
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data Telah Berhasil dihapus');
			</script>";
		}
		echo "<script>window.location='".site_url('data_terlambat')."';</script>";
	}

    function cetak(){
        $data['row'] = $this->terlambat_m->get();
		$html = $this->load->view('terlambat/terlambat_rekap', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'Rekap Data terlambat pegawai','A4','landscape');
	}
}