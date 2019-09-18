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
    <div class="offset-10 col-md ">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-md" data-toggle="modal" data-target="#tambahDivisi">
            Tambah Divisi
        </button>

    </div>
</div>



<!-- DataTales Example -->
<div class="card shadow mb-4 mx-5 mt-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Divisi </h6>
    </div>
    <div class="card-body col-md">
        <div class="table-responsive">
            <table class="table table-bordered " name="myTable" id="myTable" width="100%" cellspacing="0">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Nama Divisi</th>
                        <th>Nama Subdivisi/Bagian</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php

                        $i = 1;
                        foreach ($divisi as $d) : ?>
                            <td><?= $i; ?></td>
                            <td><?= $d['nama_divisi'] ?></td>
                            <td><?= $d['bagian'] ?></td>
                            <td class="mx-auto">
                                <a class="btn btn-danger" href="<?= base_url(); ?>Library/deleteDivision/<?= $d['id_divisi']; ?>">Hapus</a>

                                <a class="btn btn-warning" data-toggle="modal" data-target="#action" style="color:white" data-isi="<?= $d['id_divisi'] ?>" data-divisi="<?= $d['nama_divisi'] ?>" data-subdivisi="<?= $d['bagian'] ?>">
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
<div class="modal fade" id="tambahDivisi" tabindex="-1" role="dialog" aria-labelledby="tambahDivisiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDivisiLabel"> Tambah Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="<?= base_url('Library/addDivision') ?>">
                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <input type="taxt" class="form-control" id="divisi" name="divisi" placeholder="Masukan nama divisi">
                    </div>

                    <div class="form-group">
                        <label for="subdivisi">Divisi Subdivisi/Bagian</label>
                        <input type="taxt" class="form-control" id="subdivisi" name="subdivisi" placeholder="Masukan  nama sub divisi">
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
<div class="modal fade" id="action" tabindex="-1" role="dialog" aria-labelledby="actionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionLabel">Action Plans</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('Library/updatedivision'); ?>
                <input type="hidden" class="form-control" name="idDivisi" id="idDivisi">
                <div class="row mt-3 mx-auto">
                    <label for="divisi" class="col-md-4 ">Nama Divisi</label>
                    <input class="form-control-md col-md-8 " type="text" name="divisi" id="divisi1" placeholder="(Harap diisi)" value="<?= set_value('divisi'); ?>">
                </div>

                <div class="row mt-3 mx-auto">
                    <label for="subdivisi" class="col-md-4 ">Nama Subdivisi</label>
                    <input class="form-control-md col-md-8 " type="text" name="subdivisi" id="subdivisi1" placeholder="(Harap diisi)" value="<?= set_value('subdivisi'); ?>">
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