<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Cuti extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		$this->load->model(['cuti_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{		
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $this->cuti_m->cetak($awal,$akhir);
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('cuti/cuti_rekap', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Rekap Data Cuti','A4','landscape');
		}
		$data['row'] = $this->cuti_m->get();
		$data['hal'] = 'laporan';
		$this->template->load('template','cuti/cuti_data', $data);

		
    }
}