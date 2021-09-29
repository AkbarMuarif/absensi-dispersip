<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?=base_url()?>img/bp.png">
    <title>Rekap Data Pegawai yang Terlambat</title>
</head>
<body>
    <div style="width: 100%; margin-left:-5px ; margin-right:-5px">
        <table width="100%">
            <tbody>
                <tr>
                    <td width="15%"></td>
                    <td style="text-align:center">
                        <img src="<?php base_url()?>img/dispersip.png" alt="logo"  style="position: absolute; width:80px; height: auto;">
                    </td>
                    <td width="60%" style="text-align:center">
                        <p style="text-align:center; font-size:16px; line-height: 0.5em">PEMERINTAH PROVINSI KALIMANTAN SELATAN</p>
                        <p style="text-align:center; font-size:22px; line-height: 1em"><b>DINAS PERPUSTAKAAN DAN KEARSIPAN</b></p>
                        <p style="text-align:center; font-size:14px; line-height: 1em">Jl. A. Yani Km. 6,400 No. 6 Pemurus Luar &nbsp;&nbsp;&nbsp; Telp. 0511-3256155</p>
                        <p style="text-align:center; font-size:14px; line-height: 0.3em"><b>Banjarmasin - 70249</b></p>
                    </td>
                    <td width="20%"></td>
                </tr>
            <tbody>
        </table>
        <hr style="margin-top: -3px;">
        <p style="font-size:16px; line-height:70%; text-align:center"><b>REKAP DATA PEGAWAI TERLAMBAT DI KANTOR DISPERSIP (DINAS PERPUSTAKAAN DAN KEARSIPAN)</b></p>
        <p style="font-size:14px"><b>PERIODE : <?=indo($awal)?> s/d <?=indo($akhir)?></b></p>
        <table border="1" cellspacing="0" cellpadding="2" width="100%" style="font-size: 12px">
            <tr style="background-color:#FCFDAF; text-align:center">
                <th style="width: 10px">#</th>
                <th>Id Terlambat</th>
                <th>NIP</th>
                <th>Nama Pegawai</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Datang</th>
                <th>Keterangan</th>
            </tr>
            <?php $no=1; 
            foreach($row->result() as $key => $data) {
            ?>
            <tr style="text-align:center">
                <td><?= $no++?></td>
                <td><?= $data->id_terlambat?></td>
                <td><?= $data->nip?></td>
                <td><?= ucfirst($data->nama)?></td>
                <td><?= indo($data->tgl)?></td>
                <td><?= $data->jam_kerja?></td>
                <td><?= $data->jam_datang?></td>
                <td><?= $data->ket?></td>
            </tr>
            <?php } ?>
        </table>
        <p style="text-align:right; font-size:12px; line-height:-40%"><i>Dicetak tanggal : <?=date('d-m-Y')?></i></p>
        <table width="100%" style="text-align:center">
            <tr>
                <td width="68%">
                </td>
                <td>
                    <p>Yang Mengetahui</p>
                    <br><br><br>
                    <p><u>..................................</u>
                    <br><b>NIP........................... </b></p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>