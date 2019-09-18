<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Unduh</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?= base_url('assets/'); ?>css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/hihiy.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



</head>

<body>
    <H2 class="mx-auto">Format Asesmen & Mitigasi Risiko</H2>
    <H3><strong>Identitas</strong></H3>
    <h6>Nama Divisi/SBU</h6>
    <H6>Nama Project</H6>
    <h6>Nama Customer</h6>
    <h6>PIC Project</h6>
    <h6>PIC Account</h6>
    <h6>Sasaran/Tujuan</h6>
    <p>Tanggal Asesmen</p>
    <br>
    <p>Petugas Asesmen</p>



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
                    if (!empty($monitoring)) {
                        foreach ($monitoring as $m) : ?>
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
                            <td>
                                <a href="">edit</a>
                                <a href="">hapus</a>
                            </td>
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



















</body>

</html>