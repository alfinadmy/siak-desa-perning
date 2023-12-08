<style>
    .content-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
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
                                <h4 style="text-align:center"><b>EDIT PEJABAT</b></h4>
                                <hr>
                            </div>

                            <div class="box-body">
                                <form action="<?= base_url('pejabat/proses_edit'); ?>" method="post">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="hidden" name="id" value="<?= $pejabat->id_pejabat; ?>" class="form-control">
                                        <input type="text" name="nama" value="<?= $pejabat->nama_pejabat; ?>" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select name="jabatan" class="form-control">
                                            <option value="Kepala Desa" <?php if($pejabat->jabatan_pejabat == "Kepala Desa"){ echo "selected"; } ?>>Kepala Desa</option>
                                            <option value="Sekretaris Desa" <?php if($pejabat->jabatan_pejabat == "Sekretaris Desa"){ echo "selected"; } ?>>Sekretaris Desa</option>
                                            <option value="Kasi. Pemerintahan" <?php if($pejabat->jabatan_pejabat == "Kasi. Pemerintahan"){ echo "selected"; } ?>>Kasi. Pemerintahan</option>
                                            <option value="Kasi. Kesejahteraan" <?php if($pejabat->jabatan_pejabat == "Kasi. Kesejahteraan"){ echo "selected"; } ?>>Kasi. Kesejahteraan</option>
                                            <option value="Kasi. Pelayanan" <?php if($pejabat->jabatan_pejabat == "Kasi. Pelayanan"){ echo "selected"; } ?>>Kasi. Pelayanan</option>
                                            <option value="Kaur. TU & Umum" <?php if($pejabat->jabatan_pejabat == "Kaur. TU & Umum"){ echo "selected"; } ?>>Kaur. TU & Umum</option>
                                            <option value="Kaur. Keuangan" <?php if($pejabat->jabatan_pejabat == "Kaur. Keuangan"){ echo "selected"; } ?>>Kaur. Keuangan</option>
                                            <option value="Kaur. Perencanaan" <?php if($pejabat->jabatan_pejabat == "Kaur. Perencanaan"){ echo "selected"; } ?>>Kaur. Perencanaan</option>
                                            <option value="Kepala Dusun Perning" <?php if($pejabat->jabatan_pejabat == "Kepala Dusun Perning"){ echo "selected"; } ?>>Kepala Dusun Perning</option>
                                            <option value="Kepala Dusun Seloguno" <?php if($pejabat->jabatan_pejabat == "Kepala Dusun Seloguno"){ echo "selected"; } ?>>Kepala Dusun Seloguno</option>
                                            <option value="Kepala Dusun Sumber Gondang" <?php if($pejabat->jabatan_pejabat == "Kepala Dusun Sumber Gondang"){ echo "selected"; } ?>>Kepala Dusun Sumber Gondang</option>
                                            <option value="Staf/Operator" <?php if($pejabat->jabatan_pejabat == "Staf/Operator"){ echo "selected"; } ?>>Staf/Operator</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success">Simpan</button>
                                        <a href="<?= base_url('pejabat/index'); ?>" class="btn btn-danger">Batal</a>
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