<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b style="line-height:25px">DETAIL PINDAH PENDUDUK</b></h4><br>
                <hr>
            </div>
            
            <div class="box-body">
                <h4><b>DATA DAERAH ASAL</b></h4>
                <table class="table table-striped">
                    <tr>
                        <th width="40%">Nomor KK</th>
                        <td width="60%"><?= $detail->no_kk; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Kepala Keluarga</th>
                        <td><?= $detail->nama_kepala_keluarga; ?></td>
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
                        <th>NIK</th>
                        <td><?= $detail->nik; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pemohon</th>
                        <td><?= $detail->nama; ?></td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td><?= $detail->agama; ?></td>
                    </tr>
                    <tr>
                        <th>Pekerjaan</th>
                        <td><?= $detail->pekerjaan; ?></td>
                    </tr>
                </table>
                <br />
                <h4><b>DATA KEPINDAHAN</b></h4>
                <table class="table table-striped">
                    <tr>
                        <th width="40%">Alasan Pindah</th>
                        <td width="60%"><?= $detail->alasan_pindah; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Pindah</th>
                        <td><?= date_indo(date('Y-m-d', strtotime($detail->tanggal_pindah))); ?></td>
                    </tr>
                    </tr>
                    <tr>
                        <th>Alamat Tujuan</th>
                        <td><?= $detail->alamat_tujuan; ?></td>
                    </tr>
                    <tr>
                        <th>Jenis Pindah</th>
                        <td><?= $detail->jenis_pindah; ?></td>
                    </tr>
                    <tr>
                        <th>Klasifikasi Pindah</th>
                        <td><?= $detail->klasifikasi_pindah; ?></td>
                    </tr>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        <button onClick="goBack()" .GoBack class="btn btn-danger">Kembali</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </section>
</div>