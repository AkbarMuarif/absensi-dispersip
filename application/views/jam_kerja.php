<section class="content-header">
  <h1>
    Data Jam Kerja
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Data Jam Kerja</li>
  </ol>
</section>


<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Ubah Data Jam Kerja</h3>
        </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="<?=current_url()?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" value="1">
                    </div>
                    <div class="form-group <?=form_error('jam_datang')? 'has-error' : null?>">
                        <label for="jam_datang">Jam Datang</label>
                        <input type="time" id="jam_datang" name="jam_datang" value="<?=$this->input->post('jam_datang') ? $this->input->post('jam_datang') : $row->jam_datang?>" class="form-control">
                        <?=form_error('jam_datang')?> 
                    </div>
                    <div class="form-group <?=form_error('jam_pulang')? 'has-error' : null?>">
                        <label for="jam_pulang">Jam Pulang</label>
                        <input type="time" id="jam_pulang" name="jam_pulang" value="<?=$this->input->post('jam_pulang') ? $this->input->post('jam_pulang') : $row->jam_pulang?>" class="form-control">
                        <?=form_error('jam_pulang')?> 
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