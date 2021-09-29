<section class="content-header">
  <h1>
    Data Cuti
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Data Cuti</li>
    <li class="active">Ubah Data</li>
  </ol>
</section>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ubah Data Cuti</h3>
            <div class="pull-right">
                <a href="<?= site_url('data_cuti')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="<?=current_url()?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id_cuti" value="<?=$row->id_cuti?>">
                    </div>
                    <div class="form-group <?=form_error('tgl_mulai')? 'has-error' : null?>">
                        <label for="tgl_mulai">Tanggal Mulai Cuti</label>
                        <input type="date" id="tgl_mulai" name="tgl_mulai" value="<?=$this->input->post('tgl_mulai') ? $this->input->post('tgl_mulai') : $row->tgl_mulai?>" class="form-control">
                        <?=form_error('tgl_mulai')?> 
                    </div>
                    <div class="form-group <?=form_error('tgl_selesai')? 'has-error' : null?>">
                        <label for="tgl_selesai">Tanggal Selesai Cuti</label>
                        <input type="date" id="tgl_selesai" name="tgl_selesai" value="<?=$this->input->post('tgl_selesai') ? $this->input->post('tgl_selesai') : $row->tgl_selesai?>" class="form-control">
                        <?=form_error('tgl_selesai')?> 
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <?php echo form_dropdown('pegawai', $pegawai, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>
                    <div class="form-group <?=form_error('jenis_cuti')? 'has-error' : null?>">
                        <label for="jenis_cuti">Jenis Cuti</label>
                        <select name="jenis_cuti" class="form-control" id="jenis_cuti">
                            <?php $jenis_cuti=$this->input->post('jenis_cuti') ? $this->input->post('jenis_cuti') : $row->jenis_cuti?>
                            <option value="Cuti Tahunan" <?=$jenis_cuti == "Cuti Tahunan" ? "selected" : null?>> Cuti Tahunan </option>
                            <option value="Cuti Besar" <?=$jenis_cuti == "Cuti Besar" ? "selected" : null?>> Cuti Besar </option>
                            <option value="Cuti Sakit" <?=$jenis_cuti == "Cuti Sakit" ? "selected" : null?>> Cuti Sakit </option>
                            <option value="Cuti Melahirkan" <?=$jenis_cuti == "Cuti Melahirkan" ? "selected" : null?>> Cuti Melahirkan </option>
                            <option value="Cuti Alasan Penting" <?=$jenis_cuti == "Cuti Alasan Penting" ? "selected" : null?>> Cuti Alasan Penting </option>
                            <option value="Cuti Bersama" <?=$jenis_cuti == "Cuti Bersama" ? "selected" : null?>> Cuti Bersama </option>
                            <option value="Cuti Diluar Tanggungan Negara" <?=$jenis_cuti == "Cuti Diluar Tanggungan Negara" ? "selected" : null?>> Cuti Diluar Tanggungan Negara </option>
                        </select>
                        <?=form_error('jenis_cuti')?> 
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