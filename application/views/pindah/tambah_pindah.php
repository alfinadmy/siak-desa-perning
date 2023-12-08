<label class="content-wrapper">
    <section class="content">
        <label class="box">
            <label class="box-header">
                <label class="container-fluid">
                    <label class="row">
                        <label class="col-md-12">
                            <div class="card">
                                <h4 style="text-align:center"><b>TAMBAH DATA PENDUDUK PINDAH</b></h4>
                                <hr>
                            </div>

                            <label class="box-body">
                                <form action="<?= base_url('pindah/proses_tambah'); ?>" method="post">
                                    <div class="col-lg-6">
                                        <h3>DATA DAERAH ASAL</h3>
                                        <div class="form-group">
                                            <label>Nomor KK</label>
                                            <input type="text" name="no_kk" class="form-control" required maxlength="16" />
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Kepala Keluarga</label>
                                            <input type="text" name="nama_kepala_keluarga" class="form-control" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="3" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>RT</label>
                                            <select name="rt" class="form-control" required>
                                                <option value="" selected disabled>- pilih -</option>
                                                <option value="001">001</option>
                                                <option value="002">002</option>
                                                <option value="003">003</option>
                                                <option value="004">004</option>
                                                <option value="005">005</option>
                                                <option value="006">006</option>
                                                <option value="007">007</option>
                                                <option value="008">008</option>
                                                <option value="009">009</option>
                                                <option value="010">010</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>RW</label>
                                            <select name="rw" class="form-control" required>
                                                <option value="" selected disabled>- pilih -</option>
                                                <option value="001">001</option>
                                                <option value="002">002</option>
                                                <option value="003">003</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" name="nik" class="form-control" required maxlength="16" />
                                        </div>

                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select name="agama" class="form-control selectlive" required>
                                                <option value="" selected disabled>- pilih -</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Kristen">Katolik</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Hindu">Konghucu</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input type="text" name="pekerjaan" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <h3>DATA KEPINDAHAN</h3>
                                        <div class="form-group">
                                            <label>Alasan Pindah</label>
                                            <select name="alasan_pindah" class="form-control" required>
                                                <option value="" selected disabled>- pilih -</option>
                                                <option value="Pekerjaan">Pekerjaan</option>
                                                <option value="Keamanan">Keamanan</option>
                                                <option value="Kesehatan">Kesehatan</option>
                                                <option value="Perumahan">Perumahan</option>
                                                <option value="Keluarga">Keluarga</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Pindah</label>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="date" name="tanggal_pindah" class="form-control pull-right">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Tujuan</label>
                                            <textarea name="alamat_tujuan" class="form-control" rows="3"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kepindahan</label>
                                            <select name="jenis_pindah" class="form-control" required>
                                                <option value="" selected disabled>- pilih -</option>
                                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                <option value="Kepala Keluarga dan Seluruh Anggota Keluarga">Kepala Keluarga dan Seluruh Anggota Keluarga</option>
                                                <option value="Kepala Keluarga dan Sebagian Keluarga Lainnya">Kepala Keluarga dan Sebagian Keluarga Lainnya</option>
                                                <option value="Anggota Keluarga">Anggota Keluarga</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Klasifikasi Pindah</label>
                                            <select name="klasifikasi_pindah" class="form-control" required>
                                                <option value="" selected disabled>- pilih -</option>
                                                <option value="Dalam Satu Desa">Dalam Satu Desa</option>
                                                <option value="Antar Desa">Antar Desa</option>
                                                <option value="Antar Kecamatan">Antar Kecamatan</option>
                                                <option value="Antar Kabupaten/Kota">Antar Kab/Kota</option>
                                                <option value="Antar Provinsi">Antar Provinsi</option>
                                            </select>
                                        </div>
                                    </div>
                                    <center>
                                        <div class="form-group">
                                            <button class="btn btn-success">Simpan</button>
                                            <a href="<?= base_url('pindah'); ?>" class="btn btn-danger">Batal</a>
                                        </div>
                                        <?= form_close(); ?>
                                    </center>
                                </form>
                            </label> 
                        </label>
                    </label>
                </label>
            </label>
        </label>
    </section>
</label>