<?php echo view('partials/header') ?>
<?php echo view('partials/sidebar') ?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>Data Karyawan
                        <div class="page-title-subheading"> Informasi lengkap mengenai karyawan yang tersebar di berbagai wilayah.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title">Tambah Karyawan</h5>
                <br>
                <form class="needs-validation" action="<?= base_url('karyawan/process'); ?>" method="post" novalidate>
                    <?= csrf_field(); ?>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="nama_karyawan">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan"
                                placeholder="Nama Lengkap Karyawan" value="<?= old('nama_karyawan'); ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nomor_karyawan">Nomor HP</label>
                            <input type="text" class="form-control" name="nomor_karyawan" id="nomor_karyawan"
                                placeholder="Nomor Unik Karyawan" value="<?= old('nomor_karyawan'); ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                placeholder="Tempat Lahir" value="<?= old('tempat_lahir'); ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                value="<?= old('tanggal_lahir'); ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="" <?= (old('jenis_kelamin') == '') ? 'selected' : ''; ?> disabled>Pilih Jenis Kelamin...</option>
                                <option value="Laki-laki" <?= (old('jenis_kelamin') == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= (old('jenis_kelamin') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="id_cabang">Cabang</label>
                            <select class="form-control" name="id_cabang" id="id_cabang" required>
                                <option value="" <?= (old('id_cabang') == '') ? 'selected' : ''; ?> disabled>Pilih Cabang...</option>
                                <?php if (!empty($cabang) && is_array($cabang)) : ?>
                                    <?php foreach ($cabang as $row) :
                                    ?>
                                        <option value="<?= htmlspecialchars($row['id_cabang']); ?>"
                                            <?= (old('id_cabang') == $row['id_cabang']) ? 'selected' : ''; ?>>
                                            <?= htmlspecialchars($row['nama_cabang']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="" disabled>Data cabang tidak tersedia</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap Karyawan"
                                required rows="3"><?= old('alamat'); ?></textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo view('partials/footer') ?>