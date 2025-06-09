<?php echo view('partials/header') ?>
<?php echo view('partials/sidebar') ?>

<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-date icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div>Laporan Produksi Harian
                        <div class="page-title-subheading">Menampilkan seluruh catatan produksi untuk tanggal <strong><?= $tanggal_hari_ini; ?></strong>.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>

                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Riwayat Produksi Hari Ini</h3>
                        <a href="<?= base_url('/produksi/create'); ?>" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Produksi
                        </a>
                    </div>

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%;">No</th>
                                    <th class="text-center" style="width: 15%;">Waktu</th>
                                    <th>Nama Produk</th>
                                    <th class="text-center" style="width: 15%;">Jumlah (Pcs)</th>
                                    <th style="width: 20%;">Cabang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $grandTotalJumlah = 0;
                                $grandTotalModal = 0;
                                ?>

                                <?php if (!empty($riwayat) && is_array($riwayat)) : ?>
                                    <?php foreach ($riwayat as $key => $row) { ?>
                                        <?php
                                        $grandTotalJumlah += $row['jumlah_hasil'];
                                        $grandTotalModal += $row['total_modal'];
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $key + 1; ?></td>
                                            <td class="text-center"><?php echo date('H:i', strtotime($row['tgl_produksi'])); ?></td>
                                            <td><?php echo $row['nama_produk']; ?></td>
                                            <td class="text-center"><?php echo $row['jumlah_hasil']; ?></td>
                                            <td><?php echo $row['nama_cabang']; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php endif; ?>
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #f0f0f0; font-weight: bold;">
                                    <th colspan="3" class="text-right">GRAND TOTAL</th>
                                    <th class="text-center"><?= number_format($grandTotalJumlah); ?></th>
                                    <th class="text-right">Rp <?= number_format($grandTotalModal); ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo view('partials/footer') ?>