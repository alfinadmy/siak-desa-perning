<?php  
  header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-type: application/octet-stream");
    header ("Content-Disposition: attachment; filename=Data Penduduk.xls");
?>

<style type="text/css">
  table,th,td{
    border-collapse: collapse;
    padding: 15px;
    margin: 10px;
    color: #000;
  }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h4 style="text-align:center"><b>DATA PENDUDUK DESA PERNING</b></h4>
                <hr>
            </div>
            <div class="box-body table-responsive">
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">NIK</th>
                            <th style="text-align:center">No. KK</th>
                            <th style="text-align:center">Nama Lengkap</th>
                            <th style="text-align:center">Tempat Lahir</th>
                            <th style="text-align:center">Tanggal Lahir</th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Status Hubungan Keluarga</th>
                            <th style="text-align:center">Alamat</th>
                            <th style="text-align:center">RT</th>
                            <th style="text-align:center">RW</th>
                            <th style="text-align:center">Agama</th>
                            <th style="text-align:center">Pendidikan</th>
                            <th style="text-align:center">Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            if ($data->num_rows() > 0) {
                                foreach ($data->result() as $row) {
                                    ?>
                                    <tr>
                                        <td style="text-align:center"><?= $no++; ?></td>
                                        <td style="text-align:center"><?= $row->nik; ?></td>
                                        <td style="text-align:center"><?= $row->no_kk; ?></td>
                                        <td><?= $row->nama; ?></td>
                                        <td><?= $row->tempat_lahir; ?></td>
                                        <td style="text-align:center"><?= $row->tanggal_lahir; ?></td>
                                        <td style="text-align:center"><?= $row->jenis_kelamin; ?></td>
                                        <td><?= $row->hubungan_keluarga; ?></td>
                                        <td width="300"><?= $row->alamat; ?></td>
                                        <td style="text-align:center"><?= $row->rt; ?></td>
                                        <td style="text-align:center"><?= $row->rw; ?></td>
                                        <td><?= $row->agama; ?></td>
                                        <td><?= $row->pendidikan; ?></td>
                                        <td><?= $row->pekerjaan; ?></td>
                                    </tr>

                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>