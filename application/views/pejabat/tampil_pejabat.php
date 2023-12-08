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
</style>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b>PEMERINTAHAN DESA PERNING</b></h4>
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
                }
                ?>

                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama Pejabat</th>
                            <th style="text-align:center">Jabatan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pejabat as $pejabat) {
                        ?>
                            <tr>
                                <td style="text-align:center"><?= $no; ?></td>
                                <td><?= $pejabat->nama_pejabat; ?></td>
                                <td><?= $pejabat->jabatan_pejabat; ?></td>
                                <td style="text-align:center">
                                    <a href="<?= base_url('pejabat/edit/' . $pejabat->id_pejabat); ?>"
                                        class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
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
        element.parentElement.parentElement.style.display = "none";
    }
</script>