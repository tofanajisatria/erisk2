<?php

?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row ">
        <h1 class="h3 col-md-8  text-gray-800">Summary</h1>
        <a href="<?= base_url('pages/monitoring'); ?>" class="btn btn-info mt-3   ">
            <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
            </span>
            <span class="text">Back</span>
        </a>
        <a class="btn btn-success mt-3 ml-1 float-right" href="<?= base_url('pages/approval'); ?>">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">ke halaman selanjutnya</span>
        </a>

    </div>



    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Per-triwulan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" style="overflow:scroll">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Divisi/SBU</th>
                            <th>Nama Bagian/Urs</th>
                            <th>Periode</th>
                            <th>Nama Proyek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            foreach ($summary as $s) : ?>
                                <td><?= $i; ?></td>
                                <td><?= $s['divisi'] ?></td>
                                <td><?= $s['bagian'] ?></td>
                                <td>triwulan <?= $s['tw'] ?> tahun <?= $s['tahun'] ?></td>
                                <td><?= $s['nama_proyek'] ?></td>
                                <td>
                                    <form method="post" action="<?= base_url('pages/unduhmonitoring') ?>">
                                        <input type="hidden" name="divisi" value="<?= $s['divisi'] ?>">
                                        <input type="hidden" name="bagian" value="<?= $s['bagian']; ?>">
                                        <input type="hidden" name="proyek" value="<?= $s['nama_proyek']; ?>">
                                        <input type="hidden" name="periode" value="<?= $s['tw']; ?>">
                                        <input type="hidden" name="tahun" value="<?= $s['tahun']; ?>">
                                        <input type="hidden" name="id" value="<?= $s['id_identification']; ?>">
                                        <button type="submit">Excel</button>
                                    </form>
                                    <button>Pdf</button>
                                </td>

                            </tr>
                            <?php $i++;
                        endforeach;
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tahunan</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="overflow:scroll">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Divisi/SBU</th>
                            <th>Nama Bagian/Urs</th>
                            <th>Tahun</th>
                            <th>Nama Proyek</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <?php
                            $i = 1;
                            foreach ($sum as $s) : ?>
                                <td><?= $i; ?></td>
                                <td><?= $s['divisi'] ?></td>
                                <td><?= $s['bagian'] ?></td>
                                <td><?= $s['tahun'] ?></td>
                                <td><?= $s['nama_proyek'] ?></td>
                                <td>
                                    <form method="post" action="<?= base_url('pages/unduhsummarytahunan') ?>">
                                        <input type="hidden" name="divisi" value="<?= $s['divisi'] ?>">
                                        <input type="hidden" name="bagian" value="<?= $s['bagian']; ?>">
                                        <input type="hidden" name="proyek" value="<?= $s['nama_proyek']; ?>">

                                        <input type="hidden" name="tahun" value="<?= $s['tahun']; ?>">

                                        <button type="submit">Excel</button>
                                    </form>
                                    <form method="post" action="<?= base_url('pages/unduhPdfBulan') ?>">
                                        <input type="hidden" name="divisi" value="<?= $s['divisi'] ?>">
                                        <input type="hidden" name="bagian" value="<?= $s['bagian']; ?>">
                                        <input type="hidden" name="proyek" value="<?= $s['nama_proyek']; ?>">

                                        <input type="hidden" name="tahun" value="<?= $s['tahun']; ?>">

                                        <button type="submit">PDF</button>
                                    </form>
                                </td>

                            </tr>
                            <?php $i++;
                        endforeach;
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>





</div>
</div>