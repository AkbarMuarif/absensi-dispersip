<?php

    function sudah_login() {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_user');
        if($user_session){
            redirect('dashboard');
        }
    }

    function belum_login() {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_user');
        if(!$user_session){
            redirect('login');
        }
    }
    
    function cek_level(){
        $ci =& get_instance();
        $ci->load->library('fungsi');
        if($ci->fungsi->user_login()->level != 1){
            redirect('dashboard');
        }
    }

    function indo($tgl){
        $hari = substr($tgl,8,2);
        $bulan = substr($tgl,5,2);
        $tahun = substr($tgl,0,4);
        return $hari.'-'.$bulan.'-'.$tahun;
    }

    function rupiah($nominal)
    {
        return 'Rp. '.number_format($nominal, 2, ',', '.');
    }
    
?>