<section class="content-header">
  <h1>
    Data Admin
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Data Admin</li>
  </ol>
</section>


<!-- Main content -->
<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Rincian Data Admin</h3>
            <div class="pull-right">
                <a href="<?= site_url('dashboard')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form action="<?=site_url('ganti/proses')?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id_user" value="<?=$row->id_user?>">
                        <label>Username</label>
                        <input type="text" name="username" value="<?=$this->input->post('username') ? $this->input->post('username') : $row->username?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label> <small>(Biarkan kosong jika tidak diganti)</small>
                        <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                        <input type="hidden" name="passwordlama" value="<?=$row->password?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="simpan" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan Perubahan
                        </button>
                        <button type="reset" class="btn bg-red btn-flat">
                            <i class="fa fa-refresh"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>