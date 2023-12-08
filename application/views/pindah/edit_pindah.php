<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h4 style="text-align:center"><b>EDIT DATA PENDUDUK PINDAH</b></h4>
                <hr>
            </div>

            <div class="box-body">

                <form action="<?= base_url('pindah/proses_edit'); ?>" method="post">
                    <div class="col-lg-6">
                        <h3>DATA DAERAH ASAL</h3>
                        <div class="form-group">
                            <label>Nomor KK</label>
                            <input type="text" name="no_kk" value="<?= $pindah->no_kk; ?>" class="form-control" required maxlength="16" />
                        </div>

                        <div class="form-group">
                            <label>Nama Kepala Keluarga</label>
                            <input type="text" name="nama_kepala_keluarga" value="<?= $pindah->nama; ?>" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required><?= $pindah->alamat; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>RT</label>
                            <select name="rt" class="form-control" required>
                                <option value="<?= $pindah->rt; ?>" selected><?= $pindah->rt; ?></option>
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
                                <option value="<?= $pindah->rw; ?>" selected><?= $pindah->rw; ?></option>
                                <option value="001">001</option>
                                <option value="002">002</option>
                                <option value="003">003</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nik" value="<?= $pindah->nik; ?>" class="form-control" required maxlength="16" />
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" value="<?= $pindah->nama; ?>" class="form-control" required/>
                        </div>

                        <div class="form-group">
                            <label>Agama</label>
                            <select name="agama" class="form-control selectlive" required>
                                <option value="<?= $pindah->agama; ?>" selected><?= $pindah->agama; ?></option>
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
                            <input type="text" name="pekerjaan" value="<?= $pindah->pekerjaan; ?>" class="form-control" required />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <h3>DATA KEPINDAHAN</h3>
                        <div class="form-group">
                            <label>Alasan Pindah</label>
                            <select name="alasan_pindah" class="form-control" required>
                                <option value="<?= $pindah->alasan_pindah; ?>" selected><?= $pindah->alasan_pindah; ?></option>
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
                                        <input type="date" name="tanggal_pindah" value="<?= $pindah->tanggal_pindah; ?>" class="form-control pull-right" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Alamat Tujuan</label>
                            <textarea name="alamat_tujuan" class="form-control" rows="3"><?= $pindah->alamat_tujuan; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kepindahan</label>
                            <select name="jenis_pindah" class="form-control" required>
                                <option value="<?= $pindah->jenis_pindah; ?>" selected><?= $pindah->jenis_pindah; ?></option>
                                <option value="Kepala Keluarga">Kepala Keluarga</option>
                                <option value="Kepala Keluarga dan Seluruh Anggota Keluarga">Kepala Keluarga dan Seluruh Anggota Keluarga</option>
                                <option value="Kepala Keluarga dan Sebagian Keluarga Lainnya">Kepala Keluarga dan Sebagian Keluarga Lainnya</option>
                                <option value="Anggota Keluarga">Anggota Keluarga</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Klasifikasi Pindah</label>
                            <select name="klasifikasi_pindah" class="form-control" required>
                                <option value="<?= $pindah->klasifikasi_pindah; ?>" selected><?= $pindah->klasifikasi_pindah; ?></option>
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
                    </center>
                </form>
            </div>
        </div>
    </section>
</div>