<?php

class Fungsi{

    protected $ci;
    
    public function __construct(){
        $this->ci =& get_instance();
        require_once 'assets/dompdf/autoload.inc.php';
    }

    function user_login(){
        $this->ci->load->model('admin_m');
        $id_user = $this->ci->session->userdata('id_user');
        $data_admin = $this->ci->admin_m->get($id_user)->row();
        return $data_admin;
    }

    function PdfGenerator($html, $filename, $paper, $orientation){
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment'=>0));
    }

    public function count_pegawai(){
        $this->ci->load->model('pegawai_m');
        return $this->ci->pegawai_m->get()->num_rows();
    }

    public function count_terlambat(){
        $this->ci->load->model('terlambat_m');
        return $this->ci->terlambat_m->get()->num_rows();
    }

    public function count_cuti(){
        $this->ci->load->model('cuti_m');
        return $this->ci->cuti_m->get()->num_rows();
    }

    public function count_izin(){
        $this->ci->load->model('izin_m');
        return $this->ci->izin_m->get()->num_rows();
    }

    public function count_absensi(){
        $this->ci->load->model('absensi_m');
        return $this->ci->absensi_m->get()->num_rows();
    }

}

?>