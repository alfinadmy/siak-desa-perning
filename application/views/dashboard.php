<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <h1>
             Dashboard
         </h1>
     </section>

     <!-- Main content -->
     <section class="content">
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><?= $this->db->count_all_results('Penduduk'); ?> Jiwa</h3>
                        <p>Jumlah Penduduk</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?= base_url('penduduk/tampil'); ?>" class="small-box-footer">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $this->db->count_all_results('pindahdatang'); ?> Jiwa</h3>
                        <p>Jumlah Penduduk Pindah</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-arrows"></i>
                    </div>
                    <a href="<?= base_url('pindah/tampil'); ?>" class="small-box-footer">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $this->db->where('keputusan', 'Layak')->count_all_results('pkh'); ?> Keluarga</h3>
                        <p>Jumlah Penerima PKH</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?= base_url('pkh'); ?>" class="small-box-footer">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <?php
                        $query = $this->db->query("SELECT COUNT(*) as total_kepala_keluarga FROM penduduk WHERE hubungan_keluarga = 'KEPALA KELUARGA'");
                        $result = $query->row();
                        $total_kepala_keluarga = $result->total_kepala_keluarga;
                        ?>
                        <h3><?= $total_kepala_keluarga; ?> Kepala Keluarga</h3>
                        <p>Jumlah Kepala Keluarga</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?= base_url('penduduk/tampil'); ?>" class="small-box-footer">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <?php
                        $query = $this->db->query("SELECT COUNT(*) as total_L FROM penduduk WHERE jenis_kelamin = 'Laki-laki'");
                        $result = $query->row();
                        $total_L = $result->total_L;
                        ?>
                        <h3><?= $total_L; ?> Jiwa</h3>
                        <p>Jumlah Laki-laki</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="<?= base_url('penduduk/tampil'); ?>" class="small-box-footer">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-purple">
                    <div class="inner">
                        <?php
                        $query = $this->db->query("SELECT COUNT(*) as total_P FROM penduduk WHERE jenis_kelamin = 'Perempuan'");
                        $result = $query->row();
                        $total_P = $result->total_P;
                        ?>
                        <h3><?= $total_P; ?> Jiwa</h3>
                        <p>Jumlah Perempuan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="<?= base_url('penduduk/tampil'); ?>" class="small-box-footer">Lihat Semua <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        
     </section>
</div>