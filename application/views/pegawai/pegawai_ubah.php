<section class="content-header">
  <h1>
    Data Pegawai
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Data Pegawai</li>
    <li class="active">Ubah Data</li>
  </ol>
</section>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ubah Data Pegawai</h3>
            <div class="pull-right">
                <a href="<?= site_url('data_pegawai')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="<?=current_url()?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="nip" value="<?=$row->nip?>">
                    </div>
                    <div class="form-group <?=form_error('nama')? 'has-error' : null?>">
                        <label for="nama">Nama Pegawai</label>
                        <input type="text" id="nama" name="nama" value="<?=$this->input->post('nama') ? $this->input->post('nama') : $row->nama?>" class="form-control">
                        <?=form_error('nama')?>nama
                    </div>
                    <div class="form-group <?=form_error('jk')? 'has-error' : null?>">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" class="form-control" id="jk">
                            <?php $jk=$this->input->post('jk') ? $this->input->post('jk') : $row->jk?>
                            <option value="laki-laki" <?=$jk == "laki-laki" ? "selected" : null?>> Laki-Laki </option>
                            <option value="perempuan" <?=$jk == "perempuan" ? "selected" : null?>> Perempuan </option>
                        </select>
                        <?=form_error('jk')?> 
                    </div>
                    <div class="form-group <?=form_error('no_telp')? 'has-error' : null?>">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="text" id="no_telp" name="no_telp" value="<?=$this->input->post('no_telp') ? $this->input->post('no_telp') : $row->no_telp?>" class="form-control" maxlength="15">
                        <?=form_error('no_telp')?> 
                    </div>
                    <div class="form-group <?=form_error('jabatan')? 'has-error' : null?>">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" value="<?=$this->input->post('jabatan') ? $this->input->post('jabatan') : $row->jabatan?>" class="form-control" maxlength="100">
                        <?=form_error('jabatan')?> 
                    </div>
                    <div class="form-group <?=form_error('alamat')? 'has-error' : null?>">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" maxlength="500" class="form-control"><?=$this->input->post('alamat') ? $this->input->post('alamat') : $row->alamat?></textarea>
                        <?=form_error('alamat')?> 
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