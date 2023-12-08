<?php  
  header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/x-msexcel");
    header ("Content-type: application/octet-stream");
    header ("Content-Disposition: attachment; filename=Seleksi PKH.xls");
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
                <h4 style="text-align:center"><b>DATA PENDUDUK DESA PERNING SELEKSI PKH</b></h4>
                <hr>
            </div>
            <div class="box-body table-responsive">
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">No. KK</th>
                            <th style="text-align:center">Nama Kepala Keluarga</th>
                            <th style="text-align:center">RT</th>
                            <th style="text-align:center">RW</th>
                            <th style="text-align:center">Lansia</th>
                            <th style="text-align:center">Anak Sekolah</th>
                            <th style="text-align:center">Balita</th>
                            <th style="text-align:center">Keputusan</th>
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
                                        <td><?= $row->no_kk; ?></td>
                                        <td><?= $row->nama_kk; ?></td>
                                        <td><?= $row->rt; ?></td>
                                        <td><?= $row->rw; ?></td>
                                        <td><?= $row->lansia; ?></td>
                                        <td><?= $row->anak_sekolah ?></td>
                                        <td><?= $row->balita ?></td>
                                        <td><?= $row->keputusan; ?></td>
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