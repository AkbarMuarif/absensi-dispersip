<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Absensi extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        belum_login();
		$this->load->model(['absensi_m','pegawai_m','jam_m','terlambat_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{		
		cek_level();
		$data['row'] = $this->absensi_m->get();
		$data['hal'] = 'data';
		$this->template->load('template','absensi/absensi_data', $data);
    }
	
	public function add()
	{
		cek_level();
		$this->form_validation->set_rules('id_absensi', 'ID Absensi', 'required|is_unique[tb_absensi.id_absensi]', array('is_unique' => '%s sudah digunakan'));
		$this->form_validation->set_rules('pegawai', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
        $post=$this->input->post(null, TRUE);
		$nmr=$this->absensi_m->id_auto();
		$nmr2=$this->terlambat_m->id_auto();
		$jam_datang = $this->jam_m->get()->row()->jam_datang;
		$jam_pulangg = $this->jam_m->get()->row()->jam_pulang;

        //pegawai
        $query_pegawai = $this->pegawai_m->get();
		$pegawai[null] = '- Pilih -';
		foreach($query_pegawai->result() as $peg) {
			$pegawai[$peg->nip] = $peg->nip.' ('.ucfirst($peg->nama).')';
		}

		if ($this->form_validation->run() == FALSE)
		{
            $data = array (
				'nmr'	 => $nmr,
				'nmr2'	 => $nmr2,
				'jam_datang' => $jam_datang,
				'jam_pulangg' => $jam_pulangg,
                'pegawai' =>$pegawai, 
                'selectedunit' => null,
            );
			$this->template->load('template','absensi/absensi_tambah', $data);
		} else 
		{
			if($jam_datang>$post['jam']){
				$this->absensi_m->add($post);
				if($this->db->affected_rows() > 0){
					echo "<script>
						alert(',Data Telah Berhasil Disimpan');
					</script>";
					echo "<script>window.location='".site_url('data_absensi')."';</script>";
				} else
				{
					echo "<script>
						alert('Data Tidak Berhasil Disimpan');
					</script>";
					echo "<script>window.location='".site_url('data_absensi')."';</script>";
				}
			} else {
				$this->absensi_m->add($post);
				$this->terlambat_m->telat($post);
				if($this->db->affected_rows() > 0){
					echo "<script>
						alert('Data Telah Berhasil Disimpan');
					</script>";
					echo "<script>window.location='".site_url('data_absensi')."';</script>";
				} else
				{
					echo "<script>
						alert('Data Tidak Berhasil Disimpan');
					</script>";
					echo "<script>window.location='".site_url('data_absensi')."';</script>";
				}
			}
		}	
	}

	public function edit($id)
	{
		cek_level();
		$this->form_validation->set_rules('pegawai', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		$post=$this->input->post(null, TRUE);
		$query = $this->absensi_m->get($id);
		$jam_datang = $this->jam_m->get()->row()->jam_datang;
		$jam_pulangg = $this->jam_m->get()->row()->jam_pulang;

        //pegawai
        $query_pegawai = $this->pegawai_m->get();
		$pegawai[null] = '- Pilih -';
		foreach($query_pegawai->result() as $peg) {
			$pegawai[$peg->nip] = $peg->nip.' ('.ucfirst($peg->nama).')';
		}
        
		if ($this->form_validation->run() == FALSE)
		{
			if($query->num_rows()>0){
				$data = array (
					'row' => $query->row(),
					'jam_datang' => $jam_datang,
					'jam_pulangg' => $jam_pulangg,
					'pegawai' =>$pegawai, 
                    'selectedunit' => $query->row()->nip,
				);
				$this->template->load('template','absensi/absensi_ubah', $data);
			} else {
				echo "<script> alert('Data Tidak Ditemukan');";
				echo "window.location='".site_url('data_absensi')."';</script>";
			}
		} else 
		{
            $this->absensi_m->edit($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_absensi')."';</script>";
			} else {
				echo "<script>
					alert('Data Tidak Berhasil Diubah');
				</script>";
				echo "<script>window.location='".site_url('data_absensi')."';</script>";
			}
			
		}	
	}

	public function del($id)
	{
		cek_level();
		$this->absensi_m->del($id);
		$error = $this->db->error();
		if($error['code'] != 0){
			echo "<script>alert('Data tidak dapat dihapus(sudah berelasi)');</script>";
			echo "<script>window.location='".site_url('data_absensi')."';</script>";
		}	
		if($this->db->affected_rows() > 0){
			echo "<script>
				alert('Data Telah Berhasil dihapus');
			</script>";
		}
		echo "<script>window.location='".site_url('data_absensi')."';</script>";
	}

	public function datang()
	{
		$this->form_validation->set_rules('id_absensi', 'ID Absensi', 'required|is_unique[tb_absensi.id_absensi]', array('is_unique' => '%s sudah digunakan'));
		$this->form_validation->set_rules('pegawai', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam', 'Jam', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
        $post=$this->input->post(null, TRUE);
		$nmr=$this->absensi_m->id_auto();
		$nmr2=$this->terlambat_m->id_auto();
		$jam_datang = $this->jam_m->get()->row()->jam_datang;

        //pegawai
        $query_pegawai = $this->pegawai_m->get();
		$pegawai[null] = '- Pilih -';
		foreach($query_pegawai->result() as $peg) {
			$pegawai[$peg->nip] = $peg->nip.' ('.ucfirst($peg->nama).')';
		}

		if ($this->form_validation->run() == FALSE)
		{
			date_default_timezone_set('Asia/Makassar');
            $data = array (
				'nmr'	 => $nmr,
				'nmr2'	 => $nmr2,
				'jam_datang' => $jam_datang,
                'pegawai' =>$pegawai, 
                'selectedunit' => null,
            );
			$this->template->load('template','client/absen_masuk', $data);
		} else 
		{
			if($jam_datang>$post['jam']){
				$this->absensi_m->datang($post);
				if($this->db->affected_rows() > 0){
					echo "<script>
						alert('Data Telah Berhasil Disimpan');
					</script>";
					echo "<script>window.location='".site_url('dashboard')."';</script>";
				} else
				{
					echo "<script>
						alert('Data Tidak Berhasil Disimpan');
					</script>";
					echo "<script>window.location='".site_url('dashboard')."';</script>";
				}
			} else {
				$this->absensi_m->datang($post);
				$this->terlambat_m->telat($post);
				if($this->db->affected_rows() > 0){
					echo "<script>
						alert('Anda Terlambat, Data Telah Berhasil Disimpan');
					</script>";
					echo "<script>window.location='".site_url('dashboard')."';</script>";
				} else
				{
					echo "<script>
						alert('Data Tidak Berhasil Disimpan');
					</script>";
					echo "<script>window.location='".site_url('dashboard')."';</script>";
				}
			}
		}	
	}

	public function pulang()
	{
		$this->form_validation->set_rules('pegawai', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
        $this->form_validation->set_rules('jam_pulang', 'Jam Pulang', 'required');
		$this->form_validation->set_message('required', '%s kosong, silahkan diisi');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');
		
        $post=$this->input->post(null, TRUE);
		$nmr=$this->absensi_m->id_auto();
		$jam_pulang = $this->jam_m->get()->row()->jam_pulang;

        //pegawai
        $query_pegawai = $this->pegawai_m->get();
		$pegawai[null] = '- Pilih -';
		foreach($query_pegawai->result() as $peg) {
			$pegawai[$peg->nip] = $peg->nip.' ('.ucfirst($peg->nama).')';
		}

		if ($this->form_validation->run() == FALSE)
		{
			date_default_timezone_set('Asia/Makassar');
            $data = array (
				'nmr'	 => $nmr,
				'jam_pulang' => $jam_pulang,
                'pegawai' =>$pegawai, 
                'selectedunit' => null,
            );
			$this->template->load('template','client/absen_pulang', $data);
		} else 
		{
			$this->absensi_m->pulang($post);
			if($this->db->affected_rows() > 0){
				echo "<script>
					alert('Data Telah Berhasil Disimpan');
				</script>";
				echo "<script>window.location='".site_url('dashboard')."';</script>";
			} else
			{
				echo "<script>
					alert('Data Tidak Berhasil Disimpan');
				</script>";
				echo "<script>window.location='".site_url('dashboard')."';</script>";
			}
		}	
	}


}