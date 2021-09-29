<section class="content-header">
  <h1>
    Data Cuti
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Data Cuti</li>
    <li class="active">Tambah Data</li>
  </ol>
</section>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Cuti</h3>
            <div class="pull-right">
                <a href="<?= site_url('data_cuti')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="<?=site_url('data_cuti/add')?>" method="post">
                    <div class="form-group <?=form_error('id_cuti')? 'has-error' : null?>">
                        <label for="id_cuti">ID Cuti</label>
                        <input type="text" name="id_cuti" id="id_cuti" value="<?=set_value('id_cuti') != null ? set_value('id_cuti') : $nmr ?>" class="form-control" maxlength="10" >
                        <?=form_error('id_cuti')?>
                    </div>
                    <div class="form-group <?=form_error('tgl_mulai')? 'has-error' : null?>">
                        <label for="tgl_mulai">Tanggal Mulai Cuti</label>
                        <input type="date" id="tgl_mulai" name="tgl_mulai" value="<?=set_value('tgl_mulai')?>" class="form-control">
                        <?=form_error('tgl_mulai')?> 
                    </div>
                    <div class="form-group <?=form_error('tgl_selesai')? 'has-error' : null?>">
                        <label for="tgl_selesai">Tanggal Selesai Cuti</label>
                        <input type="date" id="tgl_selesai" name="tgl_selesai" value="<?=set_value('tgl_selesai')?>" class="form-control">
                        <?=form_error('tgl_selesai')?> 
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <?php echo form_dropdown('pegawai', $pegawai, $selectedunit, ['class' => 'form-control', 'required' => 'required']) ?>
                    </div>
                    <div class="form-group <?=form_error('jenis_cuti')? 'has-error' : null?>">
                        <label for="jenis_cuti">Jenis Cuti</label>
                        <select name="jenis_cuti" class="form-control" id="jenis_cuti">
                            <option value="">- Pilih -</option>
                            <option value="Cuti Tahunan" <?=set_value('jenis_cuti') == "Cuti Tahunan" ? "selected" : null?>> Cuti Tahunan </option>
                            <option value="Cuti Besar" <?=set_value('jenis_cuti') == "Cuti Besar" ? "selected" : null?>> Cuti Besar </option>
                            <option value="Cuti Sakit" <?=set_value('jenis_cuti') == "Cuti Sakit" ? "selected" : null?>> Cuti Sakit </option>
                            <option value="Cuti Melahirkan" <?=set_value('jenis_cuti') == "Cuti Melahirkan" ? "selected" : null?>> Cuti Melahirkan </option>
                            <option value="Cuti Alasan Penting" <?=set_value('jenis_cuti') == "Cuti Alasan Penting" ? "selected" : null?>> Cuti Alasan Penting </option>
                            <option value="Cuti Bersama" <?=set_value('jenis_cuti') == "Cuti Bersama" ? "selected" : null?>> Cuti Bersama </option>
                            <option value="Cuti Diluar Tanggungan Negara" <?=set_value('jenis_cuti') == "Cuti Diluar Tanggungan Negara" ? "selected" : null?>> Cuti Diluar Tanggungan Negara </option>
                        </select>
                        <?=form_error('jenis_cuti')?> 
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