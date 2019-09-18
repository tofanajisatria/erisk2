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
                        <th>aspek</th>
                        <th>Profil Risiko</th>
                        <th>Sumber Risiko</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php

                        $i = 1;
                        foreach ($sumber as $s) : ?>
                            <td><?= $i; ?></td>
                            <td><?= $s['aspek'] ?></td>
                            <td><?= $s['profil_risiko'] ?></td>
                            <td><?= $s['sumber_risiko'] ?></td>
                            <td><?= $s['keterangan'] ?></td>

                            <td class="mx-auto">
                                <a class="btn btn-danger" href="<?= base_url(); ?>Library/deleteRisk/<?= $s['id']; ?>">Hapus</a>

                                <a class="btn btn-warning" data-toggle="modal" data-target="#sumberRisk" style="color:white" data-isi="<?= $s['id'] ?>" data-aspek="<?= $s['aspek'] ?>" data-profil="<?= $s['profil_risiko'] ?>" data-sumber="<?= $s['sumber_risiko'] ?>" data-keterangan="<?= $s['keterangan'] ?>">
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





<!-- Modal -->
<div class="modal fade" id="tambahSumber" tabindex="-1" role="dialog" aria-labelledby="tambahSumberLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSumberLabel"> Tambah Sumber Risiko</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="<?= base_url('Library/addRisk') ?>">
                    <div class="form-group">
                        <label for="aspek">Aspek</label>
                        <input type="text" class="form-control" id="aspek" name="aspek" placeholder="Masukan aspek">
                    </div>

                    <div class="form-group">
                        <label for="profilRisiko">Profil Risiko</label>
                        <input type="text" class="form-control" id="profilRisiko" name="profilRisiko" placeholder="Masukan nama profil risiko">
                    </div>

                    <div class="form-group">
                        <label for="sumberRisiko">Sumber Risiko</label>
                        <input type="text" class="form-control" id="sumberRisiko" name="sumberRisiko" placeholder="Masukan nama sumber risiko">
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan nama sumber risiko">
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>

        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="sumberRisk" tabindex="-1" role="dialog" aria-labelledby="actionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionLabel">Edit Sumber</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('Library/updateRisk'); ?>
                <input type="hidden" class="form-control" name="idSumber" id="idSumber">
                <div class="row mt-3 mx-auto">
                    <label for="aspek" class="col-md-4 ">Aspek</label>
                    <input class="form-control-md col-md-8 " type="text" name="aspek" id="aspek1" placeholder="(Harap diisi)" value="<?= set_value('aspek'); ?>">
                </div>

                <div class="row mt-3 mx-auto">
                    <label for="profil" class="col-md-4 "> Profil</label>
                    <input class="form-control-md col-md-8 " type="text" name="profil" id="profil1" placeholder="(Harap diisi)" value="<?= set_value('profil'); ?>">
                </div>

                <div class="row mt-3 mx-auto">
                    <label for="sumber" class="col-md-4 "> sumber</label>
                    <input class="form-control-md col-md-8 " type="text" name="sumber" id="sumber1" placeholder="(Harap diisi)" value="<?= set_value('sumber'); ?>">
                </div>

                <div class="row mt-3 mx-auto">
                    <label for="keterangan" class="col-md-4 "> keterangan</label>
                    <input class="form-control-md col-md-8 " type="text" name="keterangan" id="keterangan1" placeholder="(Harap diisi)" value="<?= set_value('keterangan'); ?>">
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>