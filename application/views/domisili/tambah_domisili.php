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
                                <h4 style="text-align:center"><b>TAMBAH SURAT DOMISILI</b></h4>
                                <hr>
                            </div>

                            <div class="box-body">
                                <form action="<?= base_url('domisili/proses_tambah'); ?>" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>NIK dan Nama</label><a href="<?= base_url(); ?>penduduk/tambah/" class="btn btn-sm btn-primary pull-right">Tambah
                                                Penduduk</a><br /><br />
                                            <select name="nik" id="nama" class="select2 form-control custom-select" required>
                                                <option value="-- Pilih NIK dan Nama --">-- Pilih NIK dan Nama --</option>
                                                <?php
                                                foreach ($penduduk as $penduduk) :
                                                ?>
                                                    <option value="<?= $penduduk->nik; ?>">
                                                        <?= $penduduk->nik; ?> - <?= $penduduk->nama; ?>
                                                    </option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Nomor Surat Pengantar RT/RW</label>
                                            <input type="text" name="pengantar" class="form-control" placeholder="Nomor Surat Pengantar RT/RW" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Tanda Tangan Pejabat</label>
                                            <select name="pejabat" class="form-control" required>
                                                <?php
                                                foreach ($pejabat as $data_pejabat) :
                                                ?>
                                                    <option value="<?= $data_pejabat->id_pejabat; ?>">
                                                        <?= $data_pejabat->nama_pejabat; ?></option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="tambah" class="btn btn-success" value="Simpan">
                                            <a href="<?= base_url('domisili/'); ?>" class="btn btn-danger">Batal</a>
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