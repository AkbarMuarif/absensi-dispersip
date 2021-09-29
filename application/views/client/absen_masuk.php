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
            <h3 class="box-title">Absen Masuk</h3>
            <div class="pull-right">
                <a href="<?= site_url('dashboard')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="<?=site_url('data_absensi/datang')?>" method="post">
                    <div class="form-group <?=form_error('id_absensi')? 'has-error' : null?>">
                        <label for="id_absensi">ID absensi</label>
                        <input type="text" name="id_absensi" id="id_absensi" value="<?=set_value('id_absensi') != null ? set_value('id_absensi') : $nmr ?>" class="form-control" maxlength="10" readonly>
                        <?=form_error('id_absensi')?>
                    </div>
                    <div>
                        <input type="hidden" name="id_terlambat" value="<?=$nmr2?>">
                        <input type="hidden" name="jam_kerja" value="<?=$jam_datang?>">
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
                        <label for="jam_kerja">Jam Masuk Kantor</label>
                        <input type="time" id="jam_kerja" name="jam_kerja" value="<?=$jam_datang?>" class="form-control" readonly>
                    </div>
                    <div class="form-group <?=form_error('jam')? 'has-error' : null?>">
                        <label for="jam">Jam Datang</label>
                        <input type="text" id="jam" name="jam" value="<?=date("h:i")?>" class="form-control" readonly>
                        <?=form_error('jam')?> 
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