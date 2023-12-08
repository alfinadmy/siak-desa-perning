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
                <a href="<?= base_url('penduduk/hapus_semua/') ?>" class="btn btn-primary" id="deleteAllLink">Iya, saya yakin</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>


<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h4 style="text-align:center"><b>DATA PENDUDUK DESA PERNING</b></h4>
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
                    <div class="col-md-3 col-sm-6">
                        <p>
                            <a href="<?= base_url('penduduk/tambah'); ?>" class="btn btn-primary">Tambah Data Penduduk</a>
                            <a href="<?= base_url('#'); ?>" target="_blank"></a>
                        </p>
                        
                    </div>
                    <div class="col-md-1 col-sm-6"><p>Atau</p></div>
                    <div class="col-md-3 col-sm-6">
                        <form method="post" action="<?= base_url() ?>penduduk/importcsv" enctype="multipart/form-data">
                            <div class="form-group">
                                <p>Format file berupa .CSV</p>
                                <p><a href="https://drive.google.com/drive/folders/1qxoYj_DzCc3lltM0NlGqj9N61jLyCiPy?usp=sharing">Lihat format tabel penduduk</a></p>
                                <input type="file" name="userfile" ><br>
                                <input type="submit" name="submit" value="Import Data Penduduk" class="btn btn-info">
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <a href="<?= base_url('penduduk/excel/') ?>" class="btn btn-success"><span class="fa fa-file-excel-o"></span> Download Data Penduduk</a>
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
                            <th style="text-align:center">NIK</th>
                            <th style="text-align:center">Nama Lengkap</th>
                            <th style="text-align:center">Umur</th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Status Hubungan Keluarga</th>
                            <th style="text-align:center">Alamat</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($penduduk as $data) {
                            // Tambahkan pemeriksaan untuk tanggal lahir
                            if (!empty($data->tanggal_lahir)) {
                                $tanggal_lahir = new DateTime($data->tanggal_lahir);
                                $today = new DateTime();
                                $umur = $today->diff($tanggal_lahir)->y;
                            } else {
                                // Tindakan yang akan diambil jika tanggal lahir kosong
                                $umur = 'Tanggal Lahir Kosong';
                            }
                            ?>
                            <tr>
                                <td style="text-align:center"><?= $no; ?></td>
                                <td><?= $data->nik; ?></td>
                                <td><?= $data->nama; ?></td>
                                <td style="text-align:center"><?= $umur ?></td>
                                <td><?= $data->jenis_kelamin; ?></td>
                                <td><?= $data->hubungan_keluarga; ?></td>
                                <td><?= $data->alamat; ?></td>
                                <td style="text-align:center">
                                    <a href="<?= base_url('penduduk/edit/' . $data->nik); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                    <a href="#" class="btn btn-danger btn-xs" onclick="showDeleteConfirmationModal('<?= base_url('penduduk/hapus/' . $data->nik); ?>')"><i class="fa fa-trash-o"></i>Hapus</a>
                                    <a href="<?= base_url('penduduk/detail/' . $data->nik); ?>" class="btn btn-info btn-xs"><i class="fa fa-info-circle"></i>Detail</a>
                                </td>
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
        // Hapus elemen notifikasi dari DOM
        var notification = element.parentElement.parentElement;
        notification.style.display = "none";
        notification.remove();
    }

    function showDeleteConfirmationModal(deleteLink) {
        // Set the correct delete link in the modal
        document.getElementById('deleteDataLink').setAttribute('href', deleteLink);

        // Show the modal
        $('#deleteConfirmationModal').modal('show');
    }

    function showDeleteAllConfirmationModal() {
        // Show the modal
        $('#deleteAllConfirmationModal').modal('show');

        // Set the correct delete link in the modal
        document.getElementById('deleteAllLink').setAttribute('href', '<?= base_url('penduduk/hapus_semua/') ?>');
    }
    
</script>
