<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti extends CI_Controller {

    function __construct()
	{
        parent::__construct();
        belum_login();
        $this->load->model(['admin_m']);
    }
    
	public function index()
	{
        $query=$this->fungsi->user_login();
        $data['row']=$this->admin_m->get($query->id_user)->row();
        $this->template->load('template','data_admin', $data);
    }

    public function proses()
	{
        $post=$this->input->post(null, TRUE);
        if(isset($_POST['simpan'])){
			$this->admin_m->edit($post);
        }
        if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data Admin Telah Diubah');
			</script>";
			echo "<script>window.location='".site_url('dashboard')."';</script>";
		} else {
            echo "<script>
				alert('Data Admin Gagal Diubah');
			</script>";
			echo "<script>window.location='".site_url('dashboard')."';</script>";
        }
    }

}