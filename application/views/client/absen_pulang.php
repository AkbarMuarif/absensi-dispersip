<section class="content-header">
  <h1>
    Absensi Pegawai
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Absensi Pegawai</li>
  </ol>
</section>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Absen Pulang</h3>
            <div class="pull-right">
                <a href="<?= site_url('dashboard')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="<?=site_url('data_absensi/pulang')?>" method="post">
                    <div>
                        <input type="hidden" name="jam_kerja" value="<?=$jam_pulang?>">
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <?php echo form_dropdown('pegawai', $pegawai, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>
                    <div class="form-group <?=form_error('tgl')? 'has-error' : null?>">
                        <label for="tgl">Tanggal Absensi</label>
                        <input type="text" id="tgl" name="tgl" value="<?=date('Y-m-d')?>" class="form-control" readonly>
                        <?=form_error('tgl')?> 
                    </div>
                    <div class="form-group">
                        <label for="jam_kerja">Jam Pulang Kantor</label>
                        <input type="time" id="jam_kerja" name="jam_kerja" value="<?=$jam_pulang?>" class="form-control" readonly>
                    </div>
                    <div class="form-group <?=form_error('jam_pulang')? 'has-error' : null?>">
                        <label for="jam_pulang">Jam Keluar</label>
                        <input type="text" id="jam_pulang" name="jam_pulang" value="<?=date("h:i")?>" class="form-control" readonly>
                        <?=form_error('jam_pulang')?> 
                    </div>
                    <div class="form-group <?=form_error('ket')? 'has-error' : null?>">
                        <label for="ket">Keterangan</label>
                        <textarea id="ket" name="ket" value="<?=set_value('ket')?>" maxlength="500" class="form-control"></textarea>
                        <?=form_error('ket')?> 
                    </div>
                    <div class="button-group">
                        <button type="reset" class="btn btn-danger btn-flat margin pull-right">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                        <button type="submit" class="btn btn-success btn-flat margin pull-right">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>