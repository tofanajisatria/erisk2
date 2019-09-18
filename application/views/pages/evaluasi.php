<?php

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row md">
    <h1 class="h3 col-md-8  text-gray-800">Evaluasi & Mitigasi</h1>
    <a href="<?= base_url('pages/riskdetail'); ?>" class="btn btn-info mt-3 md-2  ">
      <span class="icon text-white-50">
        <i class="fas fa-info-circle"></i>
      </span>
      <span class="text">Back</span>
    </a>
    <a class="btn btn-success mt-3 ml-1 md-2 float-right" href="<?= base_url('pages/mitigasi'); ?>">
      <span class="icon text-white-50">
        <i class="fas fa-arrow-right"></i>
      </span>
      <span class="text">ke halaman selanjutnya</span>
    </a>

  </div>

  <?= $this->session->flashdata('message'); ?>

  <form action="<?= base_url('pages/addevaluasi'); ?>" method="post">
    <div class="row mt-5">


      <div class="col-md-8 mx-auto">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#card1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card1">
            <h6 class=" font-weight-bold text-primary mt-2">Risk Level</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse show" id="card1">
            <div class="card-body">

              <p>pastikan bahwa risk level dan nilai yang akan diisi sesuai dengan data risk detail dibawah ini</p>

              <div class="row mt-3 mx-auto">
                <label for="tahun" class="col-md-3 ">Tahun</label>
                <select name="tahun" class="form-control-md col-md-8" id="tahun">
                  <option selected="true" value="<?= date('Y'); ?>"><?= date('Y'); ?></option>
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
                <label for="periode" class="col-md-3 ">Periode</label>
                <select name="periode" class="form-control-md col-md-8" id="periode">
                  <option selected="true" disabled="disabled">- Pilih Periode -</option>
                  <option value="1">- Triwulan 1 -</option>
                  <option value="2">- Triwulan 2 -</option>
                  <option value="3">- Triwulan 3 -</option>
                  <option value="4">- Triwulan 4 -</option>
                </select>
              </div>

              <div class="row mt-3 mx-auto">
                <input type="hidden" name="idRiskDetail" id="idRiskDetail" value="<?= $this->session->userdata('id_risk') ?>">
                <input type="hidden" name="bagian" id="bagian" value="<?= $this->session->userdata('bagian') ?>">
                <label for="profil" class="col-md-3 ">Profil Risiko </label>
                <input class="col-md-8 " type="text" name="profil" id="profil" value="<?= $this->session->userdata('profil_risiko') ?>" disabled="disabled">
              </div>
              <div class="row mt-3 mx-auto">
                <label for="sumber" class="col-md-3 ">Sumber Risiko </label>
                <input class="col-md-8 " type="text" name="sumber" id="sumber" value="<?= $this->session->userdata('sumber_risiko') ?>" disabled="disabled">
              </div>
              <div class="row mt-3 mx-auto">
                <label for="konsekuensi" class="col-md-3 ">Keterangan</label>
                <input class="col-md-8 " type="text" name="keterangan" id="keterangan" value="<?= $this->session->userdata('keterangan') ?>" disabled="disabled">
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- end card1 -->

      <!-- card2 -->
      <div class="col-md-4">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
          <!-- Card Header - Accordion -->
          <a href="#card2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card2">
            <h6 class="m-0 font-weight-bold text-primary">Pilih Risk Detail</h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse hide" id="card2">
            <div class="card-body">

              <!-- Nav Item - Pages Collapse Menu -->




              <!-- Looping Menu -->
              <?php foreach ($identifikasi as $iden) : ?>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $iden['id']; ?>" aria-expanded="true" aria-controls="collapse<?= $iden['bagian']; ?>">
                  <span><?= $iden['bagian']; ?></span><sup>(proyek :<?= $iden["nama_proyek"]  ?>)</sup>
                </a>

                <!-- sub menu sesuai menu -->
                <?php
                $bagianId = $iden['id'];
                $querySumRisk = "SELECT *
                FROM `risk_detail`
                WHERE `id_identifikasi` = $bagianId
                
                ";
                $sumberRisk =  $this->db->query($querySumRisk)->result_array();
                ?>
                <!-- perulangan menu -->
                <?php foreach ($sumberRisk as $sr) : ?>
                  <div id="collapse<?= $iden['id']; ?>" class="collapse" aria-labelledby="heading<?= $iden['id']; ?>" data-parent="#accordionSidebar">


                    <li class="ml-3"><?= $sr['aspek'];  ?></li>
                    <p class="offset-1"><?= $sr['profil_risiko'];  ?>


                      <a class="nav-link pb-0 offset-1 " href="<?= base_url('pages/ubahSessionRisk/'); ?><?= $sr['id']; ?>">
                        <?= $sr['sumber_risiko']; ?></p>
                    </a>
                  </div>


                <?php endforeach; ?>
                <!-- Divider -->
                <hr class="">



              <?php endforeach; ?>


            </div>
          </div>
        </div>

      </div>

    </div>
    <!-- end card 2-->




    <div class="row">
      <div class="class col-md-8 h-75">
        <!-- Basic Card Example -->
        <div class="card shadow mb-6">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nilai Risiko</h6>
          </div>
          <div class="card-body">


            <div class="row mt-2 mx-auto">
              <h6 class="col-md-12">Nilai Risiko Kini / Inherent Risk</h6>
              <label for="likelihoodKini" class="mt-3 ">Likelihood</label>
              <select name="likelihoodKini" id="likelihoodKini" class="form-control form-control-sm col-md-3 mt-3 ml-2">
                <option selected="true" disabled="disabled">- likelihood -</option>

              </select>
              <label for="consequenceKini" class="ml-4 mt-3">Consequence</label>
              <select id="consequenceKini" name="consequenceKini" class=" form-control form-control-sm col-md-3 mt-3 ml-2">
                <option selected="true" disabled="disabled">- consequence -</option>

              </select>
            </div>

            <hr>

            <div class="row mt-3 mx-auto">
              <h6 class="col-md-12 ">Nilai Risiko Sisa / Residual Risk</h6>

              <label for="likelihoodSisa" class=" mt-3 ">Likelihood</label>
              <select id="likelihoodSisa" name="likelihoodSisa" class="form-control form-control-sm col-sm-3 mt-3 ml-2">
                <option selected="true" disabled="disabled">- likelihood -</option>

              </select>
              <label for="consequenceSisa" class="ml-4 mt-3 ">Consequence</label>
              <select id="consequenceSisa" name="consequenceSisa" class=" form-control form-control-sm col-sm-3 mt-3 ml-2">
                <option selected="true" disabled="disabled">- consequence -</option>

              </select>
            </div>




          </div>
        </div>
        <!-- akhir card -->
      </div>


      <div class="class col-md-4 h-75">
        <!-- Basic Card Example -->
        <div class="card shadow mb-6">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Level Risiko</h6>
          </div>
          <div class="card-body">



            <div class="row mt-2 mx-auto">
              <h6 class="col-md-12">Level Risiko Kini / Inherent Risk</h6>
              <div class=" mt-3">
                <select id="levelKini" name="levelKini" class="form-control form-control-sm">
                  <option selected="true" disabled="disabled" value="-">- level kini -</option>

                </select>

              </div>
            </div>

            <hr>

            <div class="row mt-3 mx-auto">
              <h6 class="col-md-12">Level Risiko Sisa / Residual Risk</h6>

              <div class=" mt-3">
                <select id="levelSisa" name="levelSisa" class="form-control form-control-sm">
                  <option selected="true" disabled="disabled" value="-">- level sisa -</option>

                </select>

              </div>
            </div>





          </div>
        </div>
        <!-- akhir card -->
      </div>
    </div>
    <div class="row mt-3 mx-auto">
      <div class="class col-md-8  h-75">
        <!-- Basic Card Example -->
        <div class="card shadow mb-6">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mitigasi</h6>
          </div>
          <div class="card-body">


            <div class="row">
              <label>Rencana Mitigasi / Mitigasi Berjalan</label>
            </div>
            <div class="row mt-3">
              <input class="col-md-8" type="text" name="exitingControl[]" id="exitingin" placeholder="harap diisi jika tidak ada di opsi">
              <select name="" class="form-control-md col-md-4" id="exitingControl">
                <option selected="true" disabled="disabled">- Pilih -</option>
                <option value="0">- Tidak ada -</option>
                <?php foreach ($mitigasiBerjalan as $m) : ?>

                  <option value="<?= $m['exiting_control'] ?>"><?= $m['exiting_control']; ?></option>
                <?php endforeach; ?>

              </select>
            </div>
            <hr class="mt-4">
            <div class="row">
              <label>Aturan</label>
            </div>
            <div class="row col-md">
              <input type="text" class="col-md" name="rules" placeholder="(Kosongkan bila tidak ada)">
            </div>



          </div>
        </div>
        <!-- akhir card -->
      </div>


      <div class="class col-md-4 h-75">
        <!-- Basic Card Example -->
        <div class="card shadow mb-6">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tanggapan</h6>
          </div>
          <div class="card-body">



            <div class="row mt-2 mx-auto">
              <h6 class="col-md-12">Tanggapan Risiko Kini </h6>
              <div class=" mt-3">
                <select id="tanggapanKini" name="tanggapanKini" class="form-control form-control-sm">
                  <option selected="true" disabled="disabled" value="-">- Tanggapan -</option>

                </select>

              </div>
            </div>

            <hr>

            <div class="row mt-3 mx-auto">
              <h6 class="col-md-12">Tanggapan Risiko Sisa</h6>

              <div class=" mt-3">
                <select id="tanggapanSisa" name="tanggapanSisa" class="form-control form-control-sm">
                  <option selected="true" disabled="disabled" value="-">- Tanggapan -</option>

                </select>

              </div>
            </div>


          </div>
        </div>
        <!-- akhir card -->
      </div>
    </div>

    <div class="row">
      <button type="submit" class="btn btn-primary mx-auto col-md-8 mt-2">Save</button>
  </form>
</div>


<div class="row mt-3">
  <div class="col-md-12 mt-3">
    <?= $this->session->flashdata('message'); ?>

    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->

      <a href="#assesmentIdentifikasi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="assesmentIdentifikasi">
        <h6 class="m-0 font-weight-bold text-primary">Data Assesmen</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="assesmentIdentifikasi">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="overflow:scroll">

              <thead>
                <tr>

                  <th scope="col">Aksi</th>
                  <th scope="col">Divisi</th>
                  <th scope="col">Bagian</th>
                  <th scope="col">Proyek</th>
                  <th scope="col">Aspek</th>
                  <th scope="col">Profil</th>
                  <th scope="col">Sumber</th>
                  <th scope="col">Keterangan</th>

                  <th scope="col">Tahun</th>
                  <th scope="col">Periode</th>
                  <th scope="col">Mitigasi Berjalan</th>
                  <th scope="col">Aturan</th>

                  <th scope="col">Likelihood Kini</th>
                  <th scope="col">Consequence Kini</th>
                  <th scope="col">Level Kini</th>
                  <th scope="col">Tanggapan Kini</th>
                  <th scope="col">Likelihood Sisa</th>
                  <th scope="col">Consequence Sisa</th>
                  <th scope="col">Level Sisa</th>
                  <th scope="col">Tanggapan Sisa</th>


                </tr>
              </thead>
              <tbody>
                <?php foreach ($dataEval as $d) : ?>
                  <tr>


                    <td>
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editRisk" data-id="<?= $d['id']; ?>" data-aspek="<?= $d["aspek"] ?>" data-profil="<?= $d["profil_risiko"] ?>" data-sumber="<?= $d["sumber_risiko"] ?>" data-keterangan="<?= $d["keterangan"] ?>" data-kontrol="<?= $d["kontrol"] ?>" data-konsekuensi="<?= $d["konsekuensi"] ?>" data-nilai="<?= $d["nilai"] ?>">
                        Edit
                      </button>
                      <a class="btn btn-danger" href="<?= base_url(); ?>pages/hapusevaluation/<?= $d['id']; ?>">Hapus</a>

                      <?= $d["id"]  ?>

                    </td>
                    <td><?= $d["divisi"]  ?></td>
                    <td><?= $d["bagian"]  ?></td>
                    <td><?= $d["nama_proyek"]  ?></td>
                    <td><?= $d["aspek"]  ?></td>
                    <td><?= $d["profil_risiko"]  ?></td>
                    <td><?= $d["sumber_risiko"]  ?></td>
                    <td><?= $d["keterangan"]  ?></td>

                    <td><?= $d["tahun"]  ?></td>
                    <td><?= $d["periode"]  ?></td>
                    <td><?= $d["exiting_control"]  ?></td>
                    <td><?= $d["rules"]  ?></td>

                    <td><?= $d["likelihood_kini"]  ?></td>
                    <td><?= $d["consequence_kini"]  ?></td>
                    <td><?= $d["level_kini"]  ?></td>
                    <td><?= $d["tanggapan_kini"]  ?></td>
                    <td><?= $d["likelihood_sisa"]  ?></td>
                    <td><?= $d["consequence_sisa"]  ?></td>
                    <td><?= $d["level_sisa"]  ?></td>
                    <td><?= $d["tanggapan_sisa"]  ?></td>

                  </tr>
                <?php endforeach; ?>
              </tbody>

            </table>





          </div>
        </div>
      </div>

    </div>
  </div>

</div>






















</div>
</div>



















</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script>
  document.addEventListener('DOMContentLoaded', function() {

    $('#exitingControl').change(function() {
      var ket = $(this).val();
      if (ket == 0) {
        $('#exitingin').val("");
      } else {

        $('#exitingin').val(ket);
      }

    });






  });
</script>