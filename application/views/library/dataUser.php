<?php
// var_dump($pengguna);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center ml-1 justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Risk Library Management</h1>
</div>

<div class="row ml-1 mt-5 mr-1">

    <!-- Earnings (Monthly) Card Example -->

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="<?= base_url('library') ?>">
                                <h4 id="divisi">Divisi</h4>
                            </a>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i for="divisi" class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            <a href="<?= base_url('library/datasumber') ?>" style="color:green">
                                <h4>Sumber Risiko</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            <a href="<?= base_url('library/dataRisiko') ?>" style="color:skyblue">
                                <h4>Tingkat Risiko</h4>
                            </a>
                        </div>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            <a href="<?= base_url('library/dataUser') ?>" style="color:orange">
                                <h4>User</h4>
                            </a>
                        </div>

                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="offset-8 col-md ">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-md " data-toggle="modal" data-target="#tambahSumber">
            tambah
        </button>

    </div>
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4 mx-5 mt-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Sumber Risiko </h6>
    </div>
    <div class="card-body col-md">
        <div class="table-responsive">
            <table class="table table-bordered " name="myTable" id="myTable" width="100%" cellspacing="0">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Active?</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php

                        $i = 1;
                        foreach ($pengguna as $p) : ?>
                            <td><?= $i; ?></td>
                            <td><?= $p['name'] ?></td>
                            <td><?= $p['jabatan'] ?></td>
                            <td><?= $p['email'] ?></td>
                            <td>
                                <select name="" id="">
                                    <?php if ($p['is_active'] == 0) : ?>
                                        <option value="0" selected="true">tidak</option>
                                        <option value="1">ya</option>

                                    <?php elseif ($p['is_active'] == 1) : ?>
                                        <option value="1" selected="true">ya</option>
                                        <option value="0">tidak</option>

                                    <?php endif; ?>
                                </select>
                            </td>

                            <td class="mx-auto">
                                <a class="btn btn-danger" href="<?= base_url(); ?>Library/<?= $p['id']; ?>">Hapus</a>

                                <a class="btn btn-warning" data-toggle="modal" data-target="#sumberRisk" style="color:white" data-id="<?= $p['id'] ?>" data-nama="<?= $p['name'] ?>" data-jabatan="<?= $p['jabatan'] ?>" data-email="<?= $p['email'] ?>" data-active="<?= $p['is_active'] ?>">
                                    Edit
                                </a>
                            </td>

                        </tr>
                        <?php $i++;
                    endforeach; ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
































</div>