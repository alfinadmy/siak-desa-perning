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

<!-- Bootstrap Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="<?= base_url('assets/images/danger.jpg'); ?>">
                    <h3><b>Apakah Anda yakin?</b></h3>
                    <h5>Data yang sudah dihapus tidak dapat diakses kembali.</h5>
                </center>
            </div>
            <div class="modal-footer text-center">
                <a id="deleteDataLink" href="#" class="btn btn-primary">Iya, saya yakin</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b>DATA SURAT KETERANGAN CERAI MATI</b></h4>
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
                ?>

                <p>
                    <a href="<?= base_url('cerai_mati/tambah'); ?>" class="btn btn-primary">Tambah SK Cerai Mati</a>
                </p>

                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">NIK</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Tanda Tangan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($cerai_mati as $cm) {
                        ?>
                            <tr>
                                <td style="text-align:center"><?= $no; ?></td>
                                <td><?= $cm->nik; ?></td>
                                <td><?= $cm->nama; ?></td>
                                <td><?= $cm->nama_pejabat; ?></td>
                                <td style="text-align:center">
                                    <a href="<?= base_url('cerai_mati/edit/' . $cm->id_cerai_mati); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs" onclick="showDeleteConfirmationModal('<?= base_url('cerai_mati/hapus/' . $cm->id_cerai_mati); ?>')"><i class="fa fa-trash-o"></i>Hapus</a>
                                    <button onclick="printSktm('<?= $cm->id_cerai_mati; ?>')" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Cetak</button>
                                </td>
                           </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
</div>

<script>
    function closeNotification(element) {
        // Hapus elemen notifikasi dari DOM
        var notification = element.parentElement.parentElement;
        notification.style.display = "none";
        notification.remove();
    }
    
    // Fungsi untuk menangani klik tombol cetak
    function printSktm(id) {
        // Redirect pengguna ke halaman cetak
        window.open('<?= base_url('cerai_mati/cetak/'); ?>' + id, '_self');
    }

    function showDeleteConfirmationModal(deleteLink) {
        // Set the correct delete link in the modal
        document.getElementById('deleteDataLink').setAttribute('href', deleteLink);

        // Show the modal
        $('#deleteConfirmationModal').modal('show');
    }
</script>