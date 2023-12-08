<style>
    .content-wrapper {
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Align content to the top */
        height: 80vh; /* Optional: Adjust the height of the content wrapper based on your layout */
    }

    .box {
        width: 100%; /* Adjust the width of the box if needed */
    }
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card">
                                <h4 style="text-align:center"><b>EDIT SURAT KETERANGAN PENGHASILAN</b></h4>
                                <hr>
                            </div>

                            <div class="box-body">
                                <form action="<?= base_url('penghasilan/proses_edit'); ?>" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>NIK dan Nama</label><br>
                                            <input type="hidden" name="id" class="form-control" required value="<?= $penghasilan->id_penghasilan; ?>" />
                                            <select name="nik" class="form-control" id="nama" required>
                                                <?php
                                                foreach ($penduduk as $penduduk) :
                                                    if ($penduduk->nik == $penghasilan->nik) {
                                                ?>
                                                        <option value="<?= $penduduk->nik; ?>" selected><?= $penduduk->nik; ?> - <?= $penduduk->nama; ?></option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $penduduk->nik; ?>"><?= $penduduk->nik; ?> - <?= $penduduk->nama; ?></option>
                                                <?php
                                                    }
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Penghasilan</label>
                                            <input type="number" value="<?= $penghasilan->jumlah_penghasilan; ?>" name="jumlah" class="form-control" placeholder="Jumlah Penghasilan" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Keperluan</label>
                                            <input type="text" value="<?= $penghasilan->keperluan_penghasilan; ?>" name="keperluan" class="form-control" placeholder="Keperluan" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Tanda Tangan Pejabat</label>
                                            <select name="pejabat" class="form-control" required>
                                                <?php
                                                foreach ($pejabat as $pejabat) :
                                                    if ($pejabat->id_pejabat == $penghasilan->id_pejabat) {
                                                ?>
                                                        <option value="<?= $pejabat->id_pejabat; ?>"><?= $pejabat->nama_pejabat; ?></option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?= $pejabat->id_pejabat; ?>"><?= $pejabat->nama_pejabat; ?></option>
                                                <?php
                                                    }
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="edit" class="btn btn-success" value="Simpan">
                                            <a href="<?= base_url('penghasilan/'); ?>" class="btn btn-danger">Batal</a>
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