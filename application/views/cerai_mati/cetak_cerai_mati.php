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
<br />
<center>
    <font size="3"><u><b>SURAT KETERANGAN</b></u></font><br />Nomor:
    470/<?= $cerai_mati->id_cerai_mati; ?>/II/DS/<?= substr($cerai_mati->tanggal_cerai_mati, 0, 4); ?>
</center>
<font align="justify">
    Yang bertanda tangan dibawah ini:
</font>
<table width="100%">
    <tr>
        <td width="30%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="69%"><?= $cerai_mati->nama_pejabat; ?></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?= $cerai_mati->jabatan_pejabat; ?></td>
    </tr>
</table>
<font align="justify">
    Menerangkan dengan sebenarnya bahwa :
</font>

<table width="100%">
    <tr>
        <td width="30%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="69%"><?= $cerai_mati->nama; ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?= $cerai_mati->nik; ?></td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td><?= $cerai_mati->tempat_lahir; ?>, <?= date_indo(date('Y-m-d', strtotime($cerai_mati->tanggal_lahir))); ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= $cerai_mati->jenis_kelamin; ?></td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td><?= $cerai_mati->status_perkawinan; ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?= $cerai_mati->pekerjaan; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $cerai_mati->alamat; ?></td>
    </tr>
</table>
<font align="justify">
    Orang tersebut adalah benar salah seorang warga kami yang telah memohon :<br />
    Surat Keterangan..................................<b>"CERAI MATI"</b>....................................<br />
    Dalam rangka...............................<b>ADMINISTRASI PEKERJAAN</b>............................. <br />
    Keterangan ini berlaku
    sampai...........................<b>SELESAI</b>......................................<br /><br />
    Dan kami berdasarkan sepengetahuan dan pertimbangan bahwa sampai Keterangan ini di buat adalah benar bahwa orang
    tersebut diatas adalah warga kami yang bertempat tinggal di lingkungan <?= $cerai_mati->alamat; ?>, dan benar
    bahwa nama tersebut diatas Status Cerai Mati.<br /><br />
    Demikian surat keterangan ini dibuat mengingat sumpah jabatan dan dapat dipergunakan sebagaimana
    mestinya.<br />
</font>
<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <center>Perning, <?= date_indo(date('Y-m-d', strtotime($cerai_mati->tanggal_cerai_mati))); ?></center>
        </td>
    </tr>
    <tr>
        <td>
            <center></center>
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
        <td>
            <center><b><u><?= $cerai_mati->nama_pejabat; ?></u></b></center>
        </td>
    </tr>
</table>
<script>
    // Fungsi untuk mendeteksi ketika jendela cetak ditutup
    window.onafterprint = function () {
        // Redirect pengguna ke halaman data cerai mati
        window.location.href = '<?= base_url('cerai_mati'); ?>';
    };

    // Trigger the print
    window.print();
</script>
</body>
</html>