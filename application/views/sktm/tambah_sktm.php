<div class="content-wrapper">
    <section class="content">
        <div class="col-md">
            <div class="box box-info">
                <div class="box-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card">
                                <h4 style="text-align:center"><b>TAMBAH SURAT KETERANGAN TIDAK MAMPU</b></h4>
                                    <hr>
                            </div>

                            <div class="box-body">
                                <form action="<?= base_url('sktm/proses_tambah'); ?>" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>NIK dan Nama</label><a href="<?= base_url(); ?>penduduk/tambah/" class="btn btn-sm btn-primary pull-right">Tambah Penduduk</a><br /><br />
                                            <select name="nik" id="nama" class="form-control" required>
                                                <option value="-- Pilih NIK dan Nama --">-- Pilih NIK dan Nama --</option>
                                                <?php foreach ($penduduk as $penduduk) : ?>
                                                    <option value="<?= $penduduk->nik; ?>">
                                                        <?= $penduduk->nik; ?> - <?= $penduduk->nama; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <p>
                                                Setelah diadakan penelitian hingga saat dikeluarkan surat keteranan ini, yang bersangkutan benar-benar keadaan
                                                sosial ekonominya tergolong <b><u>kurang mampu</u></b>.<br /><br />
                                                Demikian Surat Keterangan ini kami buat dan diberikan kepada yang berkepentingan untuk selanjutnya supaya
                                                dipergunakan ...
                                            </p>
                                            <textarea name="keterangan" class="form-control" rows="3" placeholder="Isi keterangan (sesuai kebutuhan)" required></textarea>
                                            <p><b>Contoh: </b><i>sebagai persyaratan administrasi rawat inap di RSUD Kertosono</i></p>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanda Tangan Pejabat</label>
                                            <select name="pejabat" class="form-control" required>
                                                <?php foreach ($pejabat as $data_pejabat) : ?>
                                                    <option value="<?= $data_pejabat->id_pejabat; ?>">
                                                        <?= $data_pejabat->nama_pejabat; ?>
                                                     </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="tambah_sktm" class="btn btn-success" value="Simpan">
                                            <a href="<?= base_url('sktm/'); ?>" class="btn btn-danger">Batal</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>