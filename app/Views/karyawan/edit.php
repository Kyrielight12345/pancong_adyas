<?php echo view('partials/header') ?>
<?php echo view('partials/sidebar') ?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa-solid fa-user-pen"></i>
                    </div>
                    <div>Ubah Data Karyawan
                        <div class="page-title-subheading">Perbarui informasi lengkap mengenai karyawan.
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
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card-body">
                <h5 class="card-title">Form Ubah Karyawan</h5>
                <br>
                <form class="needs-validation" action="<?= base_url('/karyawan/edit/process'); ?>" method="post" novalidate>
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_karyawan" value="<?= $karyawan['id_karyawan'] ?? '' ?>">
                    <input type="hidden" name="id_user" value="<?= $karyawan['id_user'] ?? '' ?>">


                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="nama_karyawan">Nama Karyawan</label>
                            <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan"
                                placeholder="Nama Lengkap Karyawan" value="<?= old('nama_karyawan', $karyawan['nama_karyawan'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nomor_karyawan">Nomor HP</label>
                            <input type="text" class="form-control" name="nomor_karyawan" id="nomor_karyawan"
                                placeholder="Nomor HP Karyawan" value="<?= old('nomor_karyawan', $karyawan['no_hp'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                placeholder="Tempat Lahir" value="<?= old('tempat_lahir', $karyawan['tempat_lahir'] ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                value="<?= old('tanggal_lahir', $karyawan['tgl_lahir'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="" disabled>Pilih Jenis Kelamin...</option>
                                <option value="Laki-laki" <?= (old('jenis_kelamin', $karyawan['jenis_kelamin'] ?? '') == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                <option value="Perempuan" <?= (old('jenis_kelamin', $karyawan['jenis_kelamin'] ?? '') == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="id_cabang">Cabang</label>
                            <select class="form-control" name="id_cabang" id="id_cabang" required>
                                <option value="" disabled>Pilih Cabang...</option>
                                <?php if (!empty($cabang) && is_array($cabang)) : ?>
                                    <?php foreach ($cabang as $cb) : ?>
                                        <option value="<?= htmlspecialchars($cb['id_cabang']); ?>"
                                            <?= (old('id_cabang', $karyawan['id_cabang'] ?? '') == $cb['id_cabang']) ? 'selected' : ''; ?>>
                                            <?= htmlspecialchars($cb['nama_cabang']); ?>
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
                                required rows="3"><?= old('alamat', $karyawan['alamat'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    <a href="<?= base_url('/karyawan'); ?>" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php echo view('partials/footer') ?>