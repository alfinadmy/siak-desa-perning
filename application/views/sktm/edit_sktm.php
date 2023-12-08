<div class="content-wrapper">
    <section class="content">
        <div class="col-md">
            <div class="box box-info">
                <div class="box-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card">
                                <h4 style="text-align:center"><b>EDIT SURAT KETERANGAN TIDAK MAMPU</b></h4>
                                <hr>
                            </div>

                            <div class="box-body">
                                <form action="<?= base_url('sktm/proses_edit'); ?>" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>NIK dan Nama</label>
                                            <input type="hidden" name="id" class="form-control" required
                                                value="<?= $sktm->id_sktm; ?>" />
                                            <select name="nik" id="nama" class="form-control" required>
                                                <?php
												foreach ($penduduk as $penduduk) :
													if ($penduduk->nik == $sktm->nik) {
														?>
                                                <option value="<?= $penduduk->nik; ?>" selected>
                                                    <?= $penduduk->nik; ?> - <?= $penduduk->nama; ?>
                                                </option>
                                                <?php
														} else {
															?>
                                                <option value="<?= $penduduk->nik; ?>">
                                                    <?= $penduduk->nik; ?> - <?= $penduduk->nama; ?>
                                                </option>
                                                <?php
													}
												endforeach;
												?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea name="keterangan" class="form-control" rows="2">
                                                <?= $sktm->keterangan; ?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanda Tangan Pejabat</label>
                                            <select name="pejabat" class="form-control" required>
                                                <?php
												foreach ($pejabat as $pejabat) :
													if ($pejabat->id_pejabat == $sktm->id_pejabat) {
														?>
                                                <option value="<?= $pejabat->id_pejabat; ?>">
                                                    <?= $pejabat->nama_pejabat; ?></option>
                                                <?php
														} else {
															?>
                                                <option value="<?= $pejabat->id_pejabat; ?>">
                                                    <?= $pejabat->nama_pejabat; ?></option>
                                                <?php
													}
												endforeach;
												?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="edit_sktm" class="btn btn-success"
                                                value="Simpan">
                                            <a href="<?= base_url('sktm/'); ?>"
                                                class="btn btn-danger">Batal</a>
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