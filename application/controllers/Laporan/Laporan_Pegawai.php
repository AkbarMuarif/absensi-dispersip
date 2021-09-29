<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Pegawai extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		$this->load->model(['pegawai_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{		
        $data['row'] = $this->pegawai_m->get();
        $data['hal'] = 'laporan';
		$this->template->load('template','pegawai/pegawai_data', $data);
    }
	
    function cetak(){
		$data['row'] = $this->pegawai_m->get();
		$html = $this->load->view('pegawai/pegawai_rekap', $data, TRUE);
		$this->fungsi->PdfGenerator($html,'Rekap Data Pegawai','A4','landscape');
	}
}