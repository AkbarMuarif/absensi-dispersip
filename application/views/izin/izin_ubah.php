<section class="content-header">
  <h1>
    Data Izin
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Data Izin</li>
    <li class="active">Ubah Data</li>
  </ol>
</section>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ubah Data Izin</h3>
            <div class="pull-right">
                <a href="<?= site_url('data_izin')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="<?=current_url()?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id_izin" value="<?=$row->id_izin?>">
                    </div>
                    <div class="form-group <?=form_error('tgl')? 'has-error' : null?>">
                        <label for="tgl">Tanggal</label>
                        <input type="date" id="tgl" name="tgl" value="<?=$this->input->post('tgl') ? $this->input->post('tgl') : $row->tgl?>" class="form-control">
                        <?=form_error('tgl')?> 
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <?php echo form_dropdown('pegawai', $pegawai, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>
                    <div class="form-group <?=form_error('jam_keluar')? 'has-error' : null?>">
                        <label for="jam_keluar">Jam Keluar</label>
                        <input type="time" id="jam_keluar" name="jam_keluar" value="<?=$this->input->post('jam_keluar') ? $this->input->post('jam_keluar') : $row->jam_keluar?>" class="form-control">
                        <?=form_error('jam_keluar')?> 
                    </div>
                    <div class="form-group <?=form_error('ket')? 'has-error' : null?>">
                        <label for="ket">Keterangan</label>
                        <textarea id="ket" name="ket" maxlength="500" class="form-control"><?=$this->input->post('ket') ? $this->input->post('ket') : $row->ket?></textarea>
                        <?=form_error('ket')?> 
                    </div>
                    <div class="button-group">
                        <button type="reset" class="btn btn-danger btn-flat margin pull-right">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-success btn-flat margin pull-right">
                            <i class="fa fa-paper-plane"></i> Ubah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>