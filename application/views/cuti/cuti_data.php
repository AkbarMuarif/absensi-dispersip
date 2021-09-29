<section class="content-header">
  <h1>
    Data Cuti
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Data Cuti</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Cuti Terdata</h3>
            <?php if ($hal=='data') {?>
            <div class="pull-right">
                <a href="<?= site_url('data_cuti/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Tambah
                </a>
            </div>
            <?php } ?>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Id Cuti</th>
                        <th>Tanggal Cuti</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Cuti</th>
                        <th>Keterangan</th>
                        <?php if ($hal=='data') {?>
                        <th class="text-center" width="100px">Actions</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1;
                    foreach($row->result() as $key => $data) { 
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $data->id_cuti?></td>
                        <td><?= indo($data->tgl_mulai).' s/d '.indo($data->tgl_selesai)?> </td>
                        <td><?= $data->nip?></td>
                        <td><?= ucfirst($data->nama)?></td>
                        <td><?= $data->jenis_cuti?></td>
                        <td><?= $data->ket?></td>
                        <?php if ($hal=='data') {?>
                        <td class="text-center">
                            <a href="<?= site_url('data_cuti/edit/'.$data->id_cuti)?>" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a> 
                            <a href="<?= site_url('data_cuti/del/'.$data->id_cuti)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php if ($hal=='laporan') {?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-2">
                        <label for="tgl_awal">Dari Tanggal : </label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="tgl_awal">Sampai Tanggal : </label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                    </div>
                    <br>
                    <div class="col-md-2">
                        <button type="submit" name="cetak" class="btn btn-success btn-normal" formtarget="_blank">REKAP DATA</button>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</section>