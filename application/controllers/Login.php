<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        sudah_login();
		$this->load->view('login');
    }
    
    public function logout()
    {
        $params = array('id_user','username','level');
        $this->session->unset_userdata($params);
        redirect('login');
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
		if(isset($post['login'])){
			$this->load->model('admin_m');
            $query = $this->admin_m->login($post);
            
			if($query->num_rows()>0){
				$row = $query->row();
				$params = array(
					'id_user' => $row->id_user,
					'username' => $row->username,
					'level' => $row->level,
				);
				$this->session->set_userdata($params);
				echo "<script>
					alert('Login Berhasil');
					window.location='".site_url('dashboard')."';
				</script>";
			} else{
				echo "<script>
					alert('Username/Password salah');
					window.location='".site_url('login')."';
				</script>";
			}
		}  
    }
}
