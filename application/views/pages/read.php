<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if ($app == 0) { ?>

        <div class="">
            <a class="col-md-12 btn btn-primary" href="<?= base_url('home/index') ?>?id=<?= $reading[0]['id'] ?>&tw=<?= $reading[0]['periode'] ?>&read=1"> OK </a>

        </div>
    <?php } elseif ($app == 99) { } else { ?>

        <div class="row mx-auto">
            <a class="col-md-5 btn btn-primary " href="<?= base_url('home/index') ?>?id=<?= $reading[0]['id'] ?>&tw=<?= $reading[0]['periode'] ?>&approve=1"> Setujui </a>
            <button type="button" class="btn btn-primary col-md-5 offset-2" data-toggle="modal" data-target="#noaccept">
                Perbaikan
            </button>
        </div>
    <?php } ?>
    <!-- Basic Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Asesmen</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <h6 class="col-md-3 offset-1">Nama Divisi/SBU :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['divisi'] ?>/<?= $reading[0]['bagian'] ?>">
            </div>
            <div class="row mt-1">
                <h6 class="col-md-3 offset-1">Nama Project :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['nama_proyek'] ?>">
            </div>
            <div class="row mt-1">
                <h6 class="col-md-3 offset-1">Nama Customer :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['nama_pelanggan'] ?>">
            </div>
            <div class="row mt-1">
                <h6 class="col-md-3 offset-1">PIC Project :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['pic_proyek'] ?>">
            </div>
            <div class="row mt-1">
                <h6 class="col-md-3 offset-1">PIC Account :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['pic_akun'] ?>">
            </div>
            <div class="row mt-1">
                <h6 class="col-md-3 offset-1">Sasaran/ Tujuan :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['tujuan'] ?>">
            </div>
            <div class="row mt-1">
                <h6 class="col-md-3 offset-1">Tanggal Asesmen :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['tanggal'] ?>">
            </div>
            <div class="row mt-1">
                <h6 class="col-md-3 offset-1">Petugas Asesmen :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['pengisi'] ?>">
            </div>
            <div class="row mt-1">
                <h6 class="col-md-3 offset-1">Tahun :</h6>
                <input class="col-md-7" type="text" disabled="disabled" value="<?= $reading[0]['tahun'] ?>">
            </div>

        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data </h6>
        </div>
        <div class="card-body">

        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="overflow:scroll">
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Aspek</th>
                        <th rowspan="2">Profil Risiko</th>
                        <th rowspan="2">Sumber Risiko</th>
                        <th rowspan="2">Keterangan</th>
                        <th rowspan="2">UC/C</th>
                        <th colspan="2">Konsekuensi</th>
                        <th colspan="2">Mitigasi berjalan</th>
                        <th colspan="4">Nilai Risiko Residual</th>
                        <th rowspan="2">evidence</th>
                        <th rowspan="2">hasil</th>

                    </tr>
                    <tr>
                        <th>Uraian</th>
                        <th>Nilai bila ada</th>
                        <th>Mitigasi</th>
                        <th>Aturan</th>
                        <th>L</th>
                        <th>C</th>
                        <th>Total (L*C)</th>
                        <th>level</th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php


                        $i = 1;
                        if (!empty($reading)) {
                            foreach ($reading as $m) : ?>
                                <td><?= $i; ?></td>
                                <td><?= $m['aspek'] ?></td>
                                <td><?= $m['profil_risiko'] ?></td>
                                <td><?= $m['sumber_risiko'] ?></td>
                                <td><?= $m['keterangan'] ?></td>
                                <td><?= $m['kontrol'] ?></td>
                                <td><?= $m['konsekuensi'] ?></td>
                                <td><?= $m['nilai'] ?></td>
                                <td><?= $m['title'] ?></td>
                                <td><?= $m['description'] ?></td>
                                <?php
                                if ($m['likelihood_sisa'] == 0) :
                                    ?>
                                    <td><?= $m['likelihood_kini'] ?></td>
                                    <td><?= $m['consequence_kini'] ?></td>
                                    <td><?= $m['likelihood_kini'] * $m['consequence_kini'] ?></td>
                                    <td><?= $m['level_kini'] ?></td>
                                <?php else : ?>
                                    <td><?= $m['likelihood_sisa'] ?></td>
                                    <td><?= $m['consequence_sisa'] ?></td>
                                    <td></td>
                                    <td><?= $m['level_sisa'] ?></td>
                                <?php endif; ?>
                                <td><?= $m['evidence'] ?></td>
                                <td><?= $m['hasil'] ?></td>

                            </tr>
                            <?php $i++;
                        endforeach;
                        ?>
                    <?php
                    } else {
                        echo "<tr><td colspan='17' class='col-md mx-auto' >Data tidak ada</td></tr>";
                    }  ?>


                </tbody>
            </table>
        </div>
    </div>









</div>
</div>


<!-- Modal -->
<div class="modal fade" id="noaccept" tabindex="-1" role="dialog" aria-labelledby="monitoringModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="monitoringModalLabel">Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form name="monitoring" method="post" action="">
                    <div class="row">
                        <p>harap isi pesan agar asesmen dapat segera diperbaiki oleh pembuat</p>
                    </div>
                    <div class="row">
                        <textarea name="pesan" class="col-md-12" id="pesan" cols="30" rows="10" placeholder="">

    </textarea>
                    </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>

            </div>
            </form>
        </div>
    </div>
</div>