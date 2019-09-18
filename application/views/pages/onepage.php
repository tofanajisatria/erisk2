<?php
$div = array_unique(array_column($divisi, 'nama_divisi'));

$aspek = array_unique(array_column($sumber_risiko, 'aspek'));
var_dump($this->session->userdata);
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row no-gutters align-items-center">
        <div class="col-auto">

        </div>
        <div class="col">
            <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-md-12 mt-3">
            <?= $this->session->flashdata('message'); ?>



            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Pemilik Proses / Owner Identification</h6>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="card-body">

                        </div>

                        <!-- form menambah identifikasi -->
                        <form action="<?= base_url('Pages/saveOnePage') ?>" method="post" class="identification">

                            <div class="row  mx-auto">
                                <label for="divisi" class="col-md-3 ">Nama Divisi</label>

                                <select required name="divisi" class="form-control-md col-md-8  " id="divisi" value="<?= $onepage['divisi']; ?>">
                                    <?php
                                    if (!empty($this->session->userdata('divisi'))) { ?>

                                        <option selected="true" disabled="disabled"><?= $this->session->userdata('divisi') ?></option>
                                    <?php } else { ?>
                                        <option selected="true" disabled="disabled">- Pilih Divisi -</option>
                                    <?php } ?>
                                    <?php foreach ($div as $d) : ?>

                                        <option value="<?= $d ?>"><?= $d ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="row mt-3 mx-auto ">
                                <label for="bagian" class="col-md-3 ">Nama Bagian</label>
                                <select required name="bagian" class="form-control-md col-md-8" id="bagian" value="<?= set_value('bagian'); ?>">
                                    <?php
                                    if (!empty($this->session->userdata('bagian'))) { ?>

                                        <option selected="true" disabled="disabled"><?= $this->session->userdata('bagian') ?></option>
                                    <?php } else { ?>
                                        <option selected="true" disabled="disabled">- Pilih Bagian -</option>
                                    <?php } ?>

                                </select>
                            </div>

                            <div class="row mt-3 mx-auto">
                                <label for="namaProyek" class="col-md-3 ">Nama Proyek</label>
                                <?php
                                if (!empty($this->session->userdata('proyek'))) { ?>
                                    <input class="form-control-md col-md-8 " type="text" name="namaProyek" id="namaProyek" placeholder="<?= $this->session->userdata('proyek') ?>" value="<?= $this->session->userdata('proyek') ?>">

                                <?php } else { ?>

                                    <input class="form-control-md col-md-8 " type="text" name="namaProyek" id="namaProyek" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('namaProyek'); ?>">
                                <?php } ?>
                            </div>

                            <div class="row mt-3 mx-auto">
                                <label for="namaPelanggan" class="col-md-3 ">Nama Pelanggan</label>
                                <?php
                                if (!empty($this->session->userdata('pelanggan'))) { ?>


                                    <input class="form-control-md col-md-8 " type="text" name="namaPelanggan" id="namaPelanggan" placeholder="<?= $this->session->userdata('pelanggan') ?>" value="<?= $this->session->userdata('pelanggan') ?>">

                                <?php } else { ?>


                                    <input class="form-control-md col-md-8 " type="text" name="namaPelanggan" id="namaPelanggan" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('namaPelanggan'); ?>">
                                <?php } ?>
                            </div>

                            <div class="row mt-3 mx-auto">
                                <label for="PICProyek" class="col-md-3 ">PIC Proyek</label>

                                <?php
                                if (!empty($this->session->userdata('pic'))) { ?>

                                    <input class="col-md-8 " type="text" name="PICProyek" id="PICProyek" placeholder="<?= $this->session->userdata('pic') ?>" value="<?= $this->session->userdata('pic') ?>">

                                <?php } else { ?>

                                    <input class="col-md-8 " type="text" name="PICProyek" id="PICProyek" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('PICProyek'); ?>">

                                <?php } ?>

                            </div>

                            <div class="row mt-3 mx-auto">
                                <label for="PICAkun" class="col-md-3 ">PIC Akun</label>

                                <?php
                                if (!empty($this->session->userdata('akun'))) { ?>

                                    <input class="col-md-8 " type="text" name="PICAkun" id="PICAkun" placeholder="<?= $this->session->userdata('akun') ?>" value="<?= $this->session->userdata('akun') ?>">

                                <?php } else { ?>

                                    <input class="col-md-8 " type="text" name="PICAkun" id="PICAkun" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('PICAkun'); ?>">

                                <?php } ?>

                            </div>

                            <div class="row mt-3 mx-auto">
                                <label for="petugasA" class="col-md-3 ">Petugas Assesment</label>


                                <?php
                                if (!empty($this->session->userdata('petugas'))) { ?>


                                    <input class="col-md-8 " type="text" name="petugasA" id="petugasA" placeholder="<?= $this->session->userdata('petugas') ?>" value="<?= $this->session->userdata('petugas') ?>">

                                <?php } else { ?>

                                    <input class="col-md-8 " type="text" name="petugasA" id="petugasA" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('petugasA'); ?>">

                                <?php } ?>


                            </div>



                            <div class="row mt-3 mx-auto">
                                <label for="tujuan" class="col-md-3 ">Tujuan Assesment</label>


                                <?php
                                if (!empty($this->session->userdata('tujuan'))) { ?>


                                    <input class="col-md-8 " type="text" name="tujuan" id="tujuan" placeholder="<?= $this->session->userdata('tujuan') ?>" value="<?= $this->session->userdata('tujuan') ?>">

                                <?php } else { ?>

                                    <input class="col-md-8 " type="text" name="tujuan" id="tujuan" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('tujuan'); ?>">
                                <?php } ?>


                            </div>

                            <div class="row mt-3 mx-auto">
                                <label for="tahun" class="col-md-3 ">Tahun</label>
                                <select name="tahun" class="form-control-md col-md-8" id="tahun">
                                    <?php
                                    if (!empty($onepage)) { ?>

                                        <option selected="true" disabled="disabled"><?= $onepage[1]['tahun'] ?></option>
                                    <?php } else { ?>
                                        <option selected="true" value="<?= date('Y'); ?>"><?= date('Y'); ?></option>

                                    <?php } ?>


                                    <option value="2018">- 2018 -</option>
                                    <option value="2019">- 2019 -</option>
                                    <option value="2020">- 2020 -</option>
                                    <option value="2021">- 2021 -</option>
                                    <option value="2022">- 2022 -</option>
                                    <option value="2023">- 2023 -</option>
                                    <option value="2024">- 2024 -</option>
                                    <option value="2025">- 2025 -</option>

                                </select>
                            </div>

                            <div class="row mt-3 mx-auto">
                                <label for="triwulan" class="col-md-3 ">Triwulan</label>
                                <select name="triwulan" class="form-control-md col-md-8" id="triwulan">

                                    <?php
                                    if (!empty($onepage)) { ?>

                                        <option selected="true" disabled="disabled"><?= $onepage[1]['triwulan'] ?></option>
                                    <?php } else { ?>

                                        <option selected="true" value="tw">Pilih Triwulan</option>
                                    <?php } ?>

                                    <option value="1">- I -</option>
                                    <option value="2">- II -</option>
                                    <option value="3">- III -</option>
                                    <option value="4">- IV -</option>
                                </select>
                            </div>

                            <input type="hidden" name="pengisi" id="pengisi" value="<?= $user['name']; ?>">

                            <div class="row col-md-7 offset-5 mt-5 float-right">
                                <button type="button" class="btn btn-primary col-md-11 " name="cariOne" id="cariOne">OK</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Assesment</h6>
        </div>
        <div class="card-body row">
            <div class="table-responsive ">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" cellpadding="10" style="overflow:scroll">
                    <thead class="mx-auto">
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
                            <th rowspan="2">Aksi</th>
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
                            if (!empty($onepage)) {
                                foreach ($onepage as $m) : ?>
                                    <td><?= $i; ?></td>
                                    <td><?= $m['aspek'] ?></td>
                                    <td><?= $m['profil'] ?></td>
                                    <td><?= $m['sumber'] ?></td>
                                    <td><?= $m['keterangan'] ?></td>
                                    <td><?= $m['kontrol'] ?></td>
                                    <td><?= $m['uraian'] ?></td>
                                    <td><?= $m['nilai'] ?></td>
                                    <td><?= $m['mitigasi'] ?></td>
                                    <td><?= $m['aturan'] ?></td>
                                    <?php
                                    if ($m['likelihood'] == 0) :
                                        ?>
                                        <td><?= $m['likelihood'] ?></td>
                                        <td><?= $m['consequence'] ?></td>
                                        <td>
                                            <?
                                            echo $m['likelihood'] * $m['consequence'];
                                            ?>
                                        </td>
                                        <td><?= $m['level'] ?></td>
                                    <?php else : ?>
                                        <td><?= $m['likelihood'] ?></td>
                                        <td><?= $m['consequence'] ?></td>
                                        <td></td>
                                        <td><?= $m['level'] ?></td>
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
                        ?>
                        <?php
                    }  ?>
                        <tr class="my-auto">
                            <td>-</td>
                            <td>
                                <select name="aspek" style="width:6cm" class="form-control-md col-md  ml-3" id="aspek" value="<?= set_value('aspek'); ?>">
                                    <option selected="true" disabled="disabled">- Pilih aspek -</option>

                                    <?php foreach ($aspek as $asp) : ?>
                                        <option value="<?= $asp; ?>"><?= $asp; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <select name="profilRisiko" style="width:6cm" class=" form-control-md col-md" id="profilRisiko">
                                    <option selected="true" disabled="disabled">- Pilih Profil Risiko -</option>
                                </select>
                            </td>
                            <td>
                                <select name="sumberRisiko" style="width:6cm" class="form-control-md col-md" id="sumberRisiko">
                                    <option selected="true" disabled="disabled">- Pilih Sumber Risiko -</option>
                                </select>
                            </td>
                            <td>
                                <select name="keterangan" style="width:6cm" class="form-control-md col-md" id="keterangan">
                                    <option selected="true" disabled="disabled">- Pilih Keterangan -</option>
                                </select>
                            </td>
                            <td>
                                <div class="col-md-4 ">
                                    <input type="radio" class="" id="kontrol[]" name="kontrol[]" value="Controllabel" checked="checked">
                                    <Label class="">Controllabel</Label>
                                </div>
                                <div class=" col-md-4">
                                    <input type="radio" id="kontrol[]" class="" name="kontrol[]" value="UnControllabel">
                                    <Label>UnControllabel</Label>
                                </div>
                            </td>
                            <td>
                                <textarea name="uraian" id="uraian" cols="15" rows="5"></textarea>
                            </td>
                            <td><input type="text" name="nilai" id="nilai"></td>
                            <td>
                                <textarea name="mitigasi" id="mitigasi" cols="15" rows="5"></textarea>
                            </td>
                            <td><input type="text" name="aturan" id="aturan"></td>
                            <td>
                                <select style="width:3cm" name="likelihood" id="likelihood" class="form-control form-control-sm col-md">
                                    <option selected="true" disabled="disabled">likelihood</option>
                                    <option value="1">- 1 -</option>
                                    <option value="2">- 2 -</option>
                                    <option value="3">- 3 -</option>
                                    <option value="4">- 4 -</option>
                                    <option value="5">- 5 -</option>

                                </select>
                            </td>
                            <td>
                                <select style="width:3cm" name="consequence" id="consequence" class="form-control form-control-sm col-md">
                                    <option selected="true" disabled="disabled">consequence</option>
                                    <option value="1">- 1 -</option>
                                    <option value="2">- 2 -</option>
                                    <option value="3">- 3 -</option>
                                    <option value="4">- 4 -</option>
                                    <option value="5">- 5 -</option>

                                </select>
                            </td>
                            <td>
                                <p id="LKaliC"></p>
                            </td>
                            <td>
                                <select class="" name="level" id="level">
                                    <option value="" class="btn btn-danger" selected></option>
                                </select>
                            </td>
                            <td><textarea name="evidence" id="evidence" cols="15" rows="5"></textarea></td>
                            <td><textarea name="hasil" id="hasil" cols="15" rows="5"></textarea></td>
                            <td>
                                <button type="submit" class="btn btn-primary" id="btnOnePage">Save</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>











</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->