<section class="content-header">
  <h1>
    SELAMAT DATANG
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i></a></li>
  </ol>
</section>

<section class="content">
  <table width="100%">
    <tbody>
        <tr>
            <td width="20%"></td>
            <td width="60%" style="text-align:center">
                <p style="text-align:center; font-size:40px; line-height: 0.5em"><b>APLIKASI ABSENSI PEGAWAI</b></p>
                <p style="text-align:center; font-size:30px; line-height: 1em">DISPERSIP</p>
            </td>
            <td width="20%"></td>
        </tr>
    <tbody>
  </table>
  <br>
  <div class="container-fluid">
  
    <div class="col-lg-4 col-6">
      <div class="small-box bg-teal">
        <div class="inner">
          <h3><i class="nav-icon fa fa-cubes nav-icon"></i></h3>
          <h2 style="font-size:26px; text-align:center">Data Pegawai (<?=$this->fungsi->count_pegawai()?>)</h2>
        </div>   
        <a href="<?=base_url()?>data_pegawai/add" class="small-box-footer">Input Data<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-6">
      <div class="small-box bg-teal">
        <div class="inner">
          <h3><i class="nav-icon fa fa-cubes nav-icon"></i></h3>
          <h2 style="font-size:26px; text-align:center">Data Absensi (<?=$this->fungsi->count_absensi()?>)</h2>
        </div>   
        <a href="<?=base_url()?>data_absensi/add" class="small-box-footer">Input Data<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-6">
      <div class="small-box bg-teal">
        <div class="inner">
          <h3><i class="nav-icon fa fa-cubes nav-icon"></i></h3>
          <h2 style="font-size:26px; text-align:center">Data Keterlambatan (<?=$this->fungsi->count_terlambat()?>)</h2>
        </div>   
        <a href="<?=base_url()?>data_terlambat/add" class="small-box-footer">Input Data<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-6">
    </div>

    <div class="col-lg-4 col-6">
      <div class="small-box bg-teal">
        <div class="inner">
          <h3><i class="nav-icon fa fa-cubes nav-icon"></i></h3>
          <h2 style="font-size:26px; text-align:center">Data Izin Keluar (<?=$this->fungsi->count_izin()?>)</h2>
        </div>   
        <a href="<?=base_url()?>data_izin/add" class="small-box-footer">Input Data<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-6">
      <div class="small-box bg-teal">
        <div class="inner">
          <h3><i class="nav-icon fa fa-cubes nav-icon"></i></h3>
          <h2 style="font-size:26px; text-align:center">Data Cuti (<?=$this->fungsi->count_cuti()?>)</h2>
        </div>   
        <a href="<?=base_url()?>data_cuti/add" class="small-box-footer">Input Data<i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    
    <div class="col-lg-2 col-6">
    </div>

  </div>
</section>