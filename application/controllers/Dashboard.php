<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		belum_login();
		if($this->fungsi->user_login()->level == 1) {
			$this->template->load('template','dashboard');	
		} else {
			$this->template->load('template','client/home');
		}
	}
}
