<section class="content-header">
  <h1>
    Data Pegawai
  </h1>
  <ol class="breadcrumb">
    <li class="active">Dashboard</li>
    <li class="active">Data Pegawai</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pegawai Keseluruhan</h3>
            <?php if ($hal=='data') {?>
            <div class="pull-right">
                <a href="<?= site_url('data_pegawai/add')?>" class="btn btn-primary btn-flat">
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
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>No. Telepon</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
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
                        <td><?= $data->nip?></td>
                        <td><?= ucfirst($data->nama)?></td>
                        <td><?= ucfirst($data->jk)?></td>
                        <td><?= $data->no_telp?></td>
                        <td><?= ucfirst($data->jabatan)?></td>
                        <td><?= $data->alamat?></td>
                        <?php if ($hal=='data') {?>
                        <td class="text-center">
                            <a href="<?= site_url('data_pegawai/edit/'.$data->nip)?>" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a> 
                            <a href="<?= site_url('data_pegawai/del/'.$data->nip)?>" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php if ($hal=='laporan') {?>
            <a href="<?= site_url('laporan/laporan_pegawai/cetak')?>" class="btn btn-success btn-flat" target="_blank">
                <i class="fa fa-print"></i> REKAP DATA
            </a>
            <?php } ?>
        </div>
    </div>
</section>