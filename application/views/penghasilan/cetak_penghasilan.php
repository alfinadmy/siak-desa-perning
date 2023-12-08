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
    145/<?= $penghasilan->id_penghasilan; ?>/DS/<?= substr($penghasilan->tanggal_penghasilan, 0, 4); ?>
</center>
<font align="justify">
    Yang bertanda tangan dibawah ini:
</font>
<table width="100%">
    <tr>
        <td width="30%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="69%"><?= $penghasilan->nama_pejabat; ?></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?= $penghasilan->jabatan_pejabat; ?></td>
    </tr>
</table>
<font align="justify">
    Menerangkan dengan sebenarnya bahwa :
</font>

<table width="100%">
    <tr>
        <td width="30%">Nama Lengkap</td>
        <td width="1%">:</td>
        <td width="69%"><?= $penghasilan->nama; ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?= $penghasilan->nik; ?></td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td><?= $penghasilan->tempat_lahir; ?> / <?= date('d F Y', strtotime($penghasilan->tanggal_lahir)); ?>
        </td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?= $penghasilan->jenis_kelamin; ?></td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td><?= $penghasilan->status_perkawinan; ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?= $penghasilan->pekerjaan; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?= $penghasilan->alamat; ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Keperluan Untuk</td>
        <td>:</td>
        <td><?= $penghasilan->keperluan_penghasilan; ?></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td>Berdasarkan pernyataan yang bersangkutan mempunyai
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>penghasilan setiap bulannya sebesar Rp.<?= number_format($penghasilan->jumlah_penghasilan); ?></td>
    </tr>
</table>
<font align="justify">
    Surat Keterangan ini dinyatakan tidak berlaku apabila terjadi pelanggaran peraturan perundang-undangan dan perda
    Kabupaten Nganjuk serta, apabila terdapat kekeliruan/kesalahan dalam pembuatannya. Pemohon/pemegang bersedia
    mempertanggung jawabakan secara hukum tanpa melibatkan pihak manapun<br />

    Demikian surat keterangan ini dibuat dengan sebenarnya serta dapat dipergunakan sebagaimana mestinya.<br />
</font>
<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <center>Perning, <?= date('d F Y', strtotime($penghasilan->tanggal_penghasilan)); ?></center>
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
        <td>
            <center><b><u><?= $penghasilan->nama; ?></u></b></center>
        </td>
        <td>
            <center><b><u><?= $penghasilan->nama_pejabat; ?></u></b></center>
        </td>
    </tr>
</table>

<script>
    // Fungsi untuk mendeteksi ketika jendela cetak ditutup
    window.onafterprint = function () {
        // Redirect pengguna ke halaman data penghasilan
        window.location.href = '<?= base_url('penghasilan'); ?>';
    };

    // Trigger the print
    window.print();
</script>
</body>
</html>
