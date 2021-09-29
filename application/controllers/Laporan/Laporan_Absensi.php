<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Absensi extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		$this->load->model(['absensi_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{		
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $this->absensi_m->cetak($awal,$akhir);
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('absensi/absensi_rekap', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Rekap Data Absensi','A4','landscape');
		}
		$data['row'] = $this->absensi_m->get();
		$data['hal'] = 'laporan';
		$this->template->load('template','absensi/absensi_data', $data);
    }

}