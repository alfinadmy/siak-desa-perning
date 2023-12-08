<label class="content-wrapper">
    <section class="content">
        <label class="box">
            <label class="box-header">
                <label class="container-fluid">
                    <label class="row">
                        <label class="col-md-12">
                            <div class="card">
                                <h4 style="text-align:center"><b>TAMBAH DATA PENDUDUK</b></h4>
                                <hr>
                            </div>

                            <label class="box-body">
                                <form action="<?= base_url('penduduk/proses_tambah'); ?>" method="post">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" name="nik" class="form-control" required maxlength="16" />
                                    </div>

                                    <div class="form-group">
                                        <label>No. Kartu Keluarga</label>
                                        <input type="text" name="no_kk" class="form-control" required maxlength="16" />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" required />
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Tempat, Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat">
                                            </div>
                                            <div class="col-xs-5">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="date" name="tanggal_lahir" class="form-control pull-right" placeholder="Tanggal Lahir">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" required>
                                            <option value="" selected disabled>- pilih -</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status Hubungan Dalam Keluarga</label>
                                        <select name="hubungan_keluarga" class="form-control" required>
                                            <option value="" selected disabled>- pilih -</option>
                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Cucu">Cucu</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Mertua">Mertua</option>
                                            <option value="Menantu">Menantu</option>
                                            <option value="Famili Lain">Famili Lain</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>
                                    
                                <div class="col-lg-6">
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
                                        <label>Agama</label>
                                        <select name="agama" class="form-control selectlive" required>
                                            <option value="" selected disabled>- pilih -</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <input type="text" name="pendidikan" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" name="pekerjaan" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Status Perkawinan</label>
                                        <input type="text" name="status_perkawinan" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Kewarganegaraan</label>
                                        <input type="text" name="kewarganegaraan" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-success">Simpan</button>
                                        <a href="<?= base_url('penduduk'); ?>" class="btn btn-danger">Batal</a>
                                    </div>
                                </div>
                                    <?= form_close(); ?>
                                </form>
                            </label>
                        </label>
                    </label>
                </label>
            </label>
        </label>
    </section>
</label>