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
                    <div>Data user
                        <div class="page-title-subheading"> Informasi lengkap mengenai user yang tersebar di berbagai wilayah.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if (session()->getFlashdata('warning')) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('warning'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="dataTables_length"></div>
                                <div class="dataTables_info"></div>
                            </div>

                            <table id="datatable" class="table  text-center table-hover datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row['nama_karyawan']; ?></td>
                                            <td><?php echo $row['username']; ?></td>
                                            <td>
                                                <?php if ($row['is_deleted'] == 1) : ?>
                                                    <span class="badge badge-danger">Nonaktif</span>
                                                <?php else : ?>
                                                    <span class="badge badge-primary">Aktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <?php if ($row['is_deleted'] == 0) : ?>
                                                        <a href="<?php echo base_url('user/delete/' . $row['id_user']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menonaktifkan user ini?');">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    <?php else : ?>
                                                        <a href="<?php echo base_url('user/edit/process/' . $row['id_user']); ?>" class="btn btn-sm btn-info" title="Aktifkan Pengguna" onclick="return confirm('Apakah Anda yakin ingin mengaktifkan pengguna ini?');">
                                                            <i class="fa fa-check-circle"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php echo view('partials/footer') ?>