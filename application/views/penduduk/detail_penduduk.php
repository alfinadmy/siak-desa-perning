<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center; margin-bottom:30px"><b>DETAIL DATA PENDUDUK</b></h4>
            </div>
            <div class="box-body table-responsive">
                <h4><b>Data Penduduk</b></h4>
                <table class="table table-striped">
                    <tr>
                        <th width="40%">NIK</th>
                        <td width="60%"><?= $detail->nik; ?></td>
                    </tr>
                    <tr>
                        <th>No. Kartu Keluarga</th>
                        <td><?= $detail->no_kk; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= $detail->nama; ?></td>
                    </tr>
                    <tr>
                        <th>Tempat Lahir</th>
                        <td><?= $detail->tempat_lahir; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td><?= date_indo(date('Y-m-d', strtotime($detail->tanggal_lahir))); ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td><?= $detail->jenis_kelamin; ?></td>
                    </tr>
                    <tr>
                        <th>Status Hubungan Dalam Keluarga</th>
                        <td><?= $detail->hubungan_keluarga; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $detail->alamat; ?></td>
                    </tr>
                    <tr>
                        <th>RT</th>
                        <td><?= $detail->rt; ?></td>
                    </tr>
                    <tr>
                        <th>RW</th>
                        <td><?= $detail->rw; ?></td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td><?= $detail->agama; ?></td>
                    </tr>
                    <tr>
                        <th>Pendidikan</th>
                        <td><?= $detail->pendidikan; ?></td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td><?= $detail->pekerjaan; ?></td>
                    </tr>
                    </tr>
                    <tr>
                        <th>Status Perkawinan</th>
                        <td><?= $detail->status_perkawinan; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <button onClick="goBack()".GoBack class="btn btn-danger">Kembali</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </section>
</div>