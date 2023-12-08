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
    <font size="3"><u><b>SURAT KETERANGAN</b></u></font><br />Nomor:145/<?= $domisili->id_domisili; ?>
    /IV/DS/<?= substr($domisili->tanggal_domisili, 0, 4); ?>
</center>
<br />

<font align="justify">
    Yang bertandatangan di bawah ini , Kepala Desa Perning Kecamatan Jatikalen Kabupaten Nganjuk menerangkan:
</font>
<table width="100%">
    <tr>
        <td width="30%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="69%"><?= $domisili->nama; ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?= $domisili->nik; ?></td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td><?= $domisili->tempat_lahir; ?> / <?= date_indo(date('Y-m-d', strtotime($domisili->tanggal_lahir))); ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= $domisili->jenis_kelamin; ?></td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td><?= $domisili->status_perkawinan; ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?= $domisili->pekerjaan; ?></td>
    </tr>
    <tr>
        <td>Alamat KTP</td>
        <td>:</td>
        <td><?= $domisili->alamat; ?></td>
    </tr>
</table>
<font align="justify">
    Berdasarkan Surat pengantar RT/RW setempat No. <?= $domisili->no_surat_rt; ?>, Bahwa yang bersangkutan benar
    saat ini Berdomisili/Bertempat Tinggal di <?= $domisili->alamat; ?>.
    <br /><br />
    Surat Keterangan ini berlaku: <?= date_indo(date('Y-m-d', strtotime($domisili->tanggal_domisili))); ?> s/d
    <?= date_indo(date('Y-m-d', strtotime('+1 month', strtotime($domisili->tanggal_domisili)))); ?><br /><br />
    Demikian Surat Keterangan ini dibuat dengan sebenarnya, untuk dapat dipergunakan sesuai keperluannya serta agar yang
    berkepentingan menjadi maklum.<br /><br /><br />
</font>
<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <center>Perning, <?= date_indo(date('Y-m-d', strtotime($domisili->tanggal_domisili))); ?> </center>
        </td>
    </tr>
    <tr>
        <td>
            <center>Yang Bersangkutan</center>
        </td>
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
        <td>
            <center><b><u><?= $domisili->nama; ?></u></b></center>
        </td>
        <td>
            <center><b><u><?= $domisili->nama_pejabat; ?></u></b></center>
        </td>
    </tr>
</table>
<script>
    // Fungsi untuk mendeteksi ketika jendela cetak ditutup
    window.onafterprint = function () {
        // Redirect pengguna ke halaman data Domisili
        window.location.href = '<?= base_url('domisili'); ?>';
    };

    // Trigger the print
    window.print();
</script>
</body>
</html>