<?php echo view('partials/header') ?>
<?php echo view('partials/sidebar') ?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa-solid fa-location-dot"></i>
                        </i>
                    </div>
                    <div>Data Cabang
                        <div class="page-title-subheading"> Informasi lengkap mengenai cabang yang tersebar di berbagai wilayah.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Tambah Cabang</h5>
                <br>
                <form class="needs-validation" action="<?= base_url('cabang/process'); ?>" method="post" novalidate>
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip01">Nama Cabang</label>
                            <input type="text" class="form-control" name="nama_cabang" id="validationTooltip01"
                                placeholder="Nama Cabang" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationTooltip02">Alamat</label>
                            <textarea class="form-control" name="alamat" id="validationTooltip02" placeholder="Alamat" required></textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">simpan</button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php echo view('partials/footer') ?>