<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Terlambat extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		$this->load->model(['terlambat_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{		
		$post=$this->input->post(null, TRUE);
		$awal = $this->input->post('tgl_awal');
		$akhir = $this->input->post('tgl_akhir');	
		if(isset($_POST['cetak'])){
			$data['row'] = $this->terlambat_m->cetak($awal,$akhir);
			$data['awal'] = $awal;
			$data['akhir'] = $akhir;
			$html = $this->load->view('terlambat/terlambat_rekap', $data, TRUE);
			$this->fungsi->PdfGenerator($html,'Rekap Data terlambat Barang','A4','landscape');
		}
		$data['row'] = $this->terlambat_m->get();
		$data['hal'] = 'laporan';
		$this->template->load('template','terlambat/terlambat_data', $data);
    }
	
    function cetak(){
        
	}
}