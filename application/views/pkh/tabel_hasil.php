<style>
    .callout {
        position: relative;
    }

    .close-notification {
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 30px;
        cursor: pointer;
    }

    /* Center the modal vertically and horizontally */
    .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .custom-modal-header {
        background-color: #54B4D3; /* Replace with your desired background color code */
        color: #fff; /* Set the text color to white or the contrasting color */
        border-radius: 10px 10px 0 0; /* Rounded corners at the top */
    }    

    .modal-content {
        border-radius: 10px; /* Rounded corners at the bottom */
        border-top: none; /* Remove the top border to fix the white box issue */
    }

    .modal-footer {
        text-align: center;
    }
</style>

<!-- Bootstrap Modal for Delete All -->
<div class="modal fade" id="deleteAllConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteAllConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="<?= base_url('assets/images/danger.jpg'); ?>">
                    <h3><b>Apakah Anda yakin?</b></h3>
                    <h5>Seluruh data yang sudah dihapus tidak dapat diakses kembali.</h5>
                </center>
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('pkh/hapus_semua/') ?>" class="btn btn-primary" id="deleteAllLink">Iya, saya yakin</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h4 style="text-align:center"><b>SELEKSI DATA PENDUDUK DESA PERNING PENERIMA PKH</b></h4>
                <hr>
            </div>
            <div class="box-body table-responsive">
            <?php
                if ($this->session->flashdata('sukses')) {
                ?>
                    <div class="callout callout-success">
                        <p style="font-size:14px">
                            <i class="fa fa-check"></i>
                            <?= $this->session->flashdata('sukses'); ?>
                            <span class="close-notification" onclick="closeNotification(this)">&times;</span>
                        </p>
                    </div>
                <?php
                // Hapus notifikasi sukses setelah ditampilkan
                $this->session->unset_userdata('sukses');
                }
                if ($this->session->flashdata('error')) {
                ?>
                    <div class="callout callout-danger">
                        <p style="font-size:14px">
                            <i class="fa fa-times"></i>
                            <?= $this->session->flashdata('error'); ?>
                            <span class="close-notification" onclick="closeNotification(this)">&times;</span>
                        </p>
                    </div>
                <?php
                // Hapus notifikasi error setelah ditampilkan
                $this->session->unset_userdata('error');
                }
                ?>

                <div class="row my-2">
                    <div class="col-md-3 col-sm-12">
                        <form method="post" action="<?php echo base_url() ?>pkh/importcsv" enctype="multipart/form-data">
                            <div class="form-group">
                                <p>Format file berupa .CSV</p>
                                <p><a href="https://drive.google.com/drive/folders/1qxoYj_DzCc3lltM0NlGqj9N61jLyCiPy?usp=sharing">Lihat format tabel penduduk</a></p>
                                <input type="file" name="userfile" ><br>
                                <input type="submit" name="submit" value="Klasifikasi Data" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <a href="<?= base_url('pkh/excel/') ?>" class="btn btn-success"><span class="fa fa-file-excel-o"></span> Download Data</a>
                    </div>
                    <div class="col-md-2 col-sm-12">
                        <p>
                            <a href="#" class="btn btn-danger" onclick="showDeleteAllConfirmationModal()">
                                <i class="fa fa-trash-o"></i> Hapus Data
                            </a>      
                        </p>
                    </div>
                </div>
                <br>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">No. KK</th>
                            <th style="text-align:center">Nama Kepala Keluarga</th>
                            <th style="text-align:center">RT</th>
                            <th style="text-align:center">RW</th>
                            <th style="text-align:center">Lansia</th>
                            <th style="text-align:center">Anak Sekolah</th>
                            <th style="text-align:center">Balita</th>
                            <th style="text-align:center">Keputusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pkh as $data) {
                        ?>
                            <tr>
                                <td style="text-align:center"><?= $no; ?></td>
                                <td><?= $data->no_kk; ?></td>
                                <td><?= $data->nama_kk; ?></td>
                                <td><?= $data->rt; ?></td>
                                <td><?= $data->rw; ?></td>
                                <td>
                                    <?php
                                    if ($data->lansia) echo 'Memiliki';
                                    if (!$data->lansia) echo 'Tidak Memiliki';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data->anak_sekolah) echo 'Memiliki';
                                    if (!$data->anak_sekolah) echo 'Tidak Memiliki';
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($data->balita) echo 'Memiliki';
                                    if (!$data->balita) echo 'Tidak Memiliki';
                                    ?>
                                </td>
                                <td><?= $data->keputusan; ?></td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
    function closeNotification(element) {
        element.parentElement.parentElement.style.display = "none";
    }

    function showDeleteAllConfirmationModal() {
        // Show the modal
        $('#deleteAllConfirmationModal').modal('show');

        // Set the correct delete link in the modal
        document.getElementById('deleteAllLink').setAttribute('href', '<?= base_url('pkh/hapus_semua/') ?>');
    }
</script>
