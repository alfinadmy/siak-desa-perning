<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

    <style type="text/css">
        @media print and (width: 21cm) and (height: 33cm) {
            @page {
                margin: 1cm;
            }
        }

        .tabelku {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 2px;
        }
        body, p, font, table {
            line-height: 1.5;
        }
    </style>

    <style type="text/css" media="print">
        @page {
            size: portrait;
            margin: 2cm;
        }
    </style>

</head>
<body>

<img src="<?= base_url('assets/images/kop-perning.png'); ?>" width="100%" height="15%">
<br /><br />

<center>
    <font size="3"><u><b>SURAT KETERANGAN TIDAK MAMPU</b></u></font><br />Nomor:
    471/<?= $sktm->id_sktm; ?>/411.505.2001/<?= substr($sktm->tanggal_sktm, 0, 4); ?>
</center>
<br />

<font align="justify">
    Yang bertandatangan di bawah ini, <?= $sktm->jabatan_pejabat; ?> Perning Kecamatan
    Jatikalen Kabupaten Nganjuk, menerangkan dengan sebenarnya bahwa:
</font>
<table width="100%">
    <tr>
        <td width="30%">Nama</td>
        <td width="1%">:</td>
        <td width="69%"><?= $sktm->nama; ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?= $sktm->nik; ?></td>
    </tr>
    <tr>
        <td>Nomor KK</td>
        <td>:</td>
        <td><?= $sktm->no_kk; ?></td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td><?= $sktm->tempat_lahir; ?>, <?= date_indo(date('Y-m-d', strtotime($sktm->tanggal_lahir))); ?>
        </td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= $sktm->jenis_kelamin; ?></td>
    </tr>
    <tr>
        <td>Kewarganegaraan</td>
        <td>:</td>
        <td><?= $sktm->kewarganegaraan; ?></td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td><?= $sktm->status_perkawinan; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>RT.<?= $sktm->rt; ?> RW.<?= $sktm->rw; ?> Desa <?= $sktm->alamat; ?>,</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td> Kecamatan Jatikalen, Kabupaten Nganjuk</td></td>
    </tr>
</table>
<font align="justify">
    Setelah diadakan penelitian hingga saat dikeluarkan surat keteranan ini, yang bersangkutan benar-benar keadaan
    sosial ekonominya tergolong <b><u>kurang mampu</u></b>.<br /><br />
    Demikian Surat Keterangan ini kami buat dan diberikan kepada yang berkepentingan untuk selanjutnya supaya
    dipergunakan <?= $sktm->keterangan; ?>.
    <br /><br />
</font>
<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <center>Perning, <?= date_indo(date('Y-m-d', strtotime($sktm->tanggal_sktm))); ?></center>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <center>Kepala Desa Perning</center>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <center><b><u><?= $sktm->nama_pejabat; ?></u></b></center>
        </td>
    </tr>
</table>
<script>
    // Fungsi untuk mendeteksi ketika jendela cetak ditutup
    window.onafterprint = function () {
        // Redirect pengguna ke halaman data SKTM
        window.location.href = '<?= base_url('sktm'); ?>';
    };

    // Trigger the print
    window.print();
</script>
</body>
</html>
