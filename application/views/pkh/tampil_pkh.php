<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h4 style="text-align:center"><b>DATA PENDUDUK DESA PERNING PENERIMA PKH</b></h4>
                <hr>
            </div>
            <div class="box-body table-responsive">

                <div class="row my-2">
                    <div class="col-md-2 col-sm-12">
                        <a href="<?= base_url('pkh/excel_layak/') ?>" class="btn btn-success"><span class="fa fa-file-excel-o"></span> Download Data</a>
                    </div>
                </div>
                <br>
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
                        foreach ($pkh as $data) {
                            if ($data->keputusan == 'Layak') {
                                ?>
                                <tr>
                                    <td style="text-align:center"><?= $no; ?></td>
                                    <td><?= $data->no_kk; ?></td>
                                    <td><?= $data->nama_kk; ?></td>
                                    <td><?= $data->rt; ?></td>
                                    <td><?= $data->rw; ?></td>
                                    <td>
                                        <?php
                                        if ($data->lansia) echo 'Memiliki';
                                        if (!$data->lansia) echo 'Tidak Memiliki';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($data->anak_sekolah) echo 'Memiliki';
                                        if (!$data->anak_sekolah) echo 'Tidak Memiliki';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($data->balita) echo 'Memiliki';
                                        if (!$data->balita) echo 'Tidak Memiliki';
                                        ?>
                                    </td>
                                    <td><?= $data->keputusan; ?></td>
                                </tr>
                            <?php
                            $no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
