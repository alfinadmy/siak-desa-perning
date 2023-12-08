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
<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <center>Perning, <?= date_indo(date('Y-m-d', strtotime($pemasangan_listrik->tanggal_pemasangan_listrik))); ?></center>
        </td>
    </tr>
</table>
<font align="justify">
    Nomor: <?= $pemasangan_listrik->id_pemasangan_listrik; ?>/411.505.2001/V/<?= substr($pemasangan_listrik->tanggal_pemasangan_listrik, 0, 4); ?><br />
    Perihal: Permohonan Pemasangan Listrik Baru<br /><br />

    Kepada Yth,
    <br /><br />
    Pimpinan PT. PLN Persero<br />
    Cabang Kertosono<br />
    Di<br />
    Tempat<br />
</font>
<br />

<font align="justify">
    Yang bertandatangan di bawah ini:
</font>
<table width="100%">
    <tr>
        <td width="20%">Nama</td>
        <td width="1%">:</td>
        <td width="79%"><?= $pemasangan_listrik->nama_pejabat; ?></td>
    </tr>
    <tr>
        <td>Kantor</td>
        <td>:</td>
        <td>PEMDES PERNING</td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?= $pemasangan_listrik->jabatan_pejabat; ?></td>
    </tr>
</table>
<font align="justify">
    Dengan surat ini kami ajukan permohonan kepada Bapak/Ibu Pimpinan PT PLN Persero Cabang Kertosono untuk pemasangan 
    listrik baru dengan daya <?= $pemasangan_listrik->daya; ?> VA. Pemasangan listrik baru ini diperuntukkan kerumah saudara 
    <?= $pemasangan_listrik->nama; ?> RT. <?= $pemasangan_listrik->rt; ?> RW. <?= $pemasangan_listrik->rw; ?> 
    Dusun <?= $pemasangan_listrik->alamat; ?> Desa Perning Kecamatan Jatikalen Kabupaten Nganjuk.
    <br /><br />
    Demikian surat permohonan pemasangan listrik baru ini dibuat, atas perhatiannya kami ucapkan terima kasih.
</font><br /><br />
<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <center>Mengetahui</center>
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
            <center><b><u><?= $pemasangan_listrik->nama_pejabat; ?></u></b></center>
        </td>
    </tr>
</table>
<script>
    // Fungsi untuk mendeteksi ketika jendela cetak ditutup
    window.onafterprint = function () {
        // Redirect pengguna ke halaman data pemasangan listrik
        window.location.href = '<?= base_url('pemasangan_listrik'); ?>';
    };

    // Trigger the print
    window.print();
</script>
</body>
</html>
