<?php
?>



<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row ">
    <h1 class="h3 col-md-8  text-gray-800">Evaluasi & Mitigasi <sup>2</sup> </h1>
    <a href="<?= base_url('pages/evaluasi'); ?>" class="btn btn-info mt-3   ">
      <span class="icon text-white-50">
        <i class="fas fa-info-circle"></i>
      </span>
      <span class="text">Back</span>
    </a>
    <a class="btn btn-success mt-3 ml-1 float-right" href="<?= base_url('pages/monitoring'); ?>">
      <span class="icon text-white-50">
        <i class="fas fa-arrow-right"></i>
      </span>
      <span class="text">ke halaman selanjutnya</span>
    </a>

  </div>

  <div class="row mt-4">

    <!-- card2 -->
    <div class="col-md-9">
      <!-- Collapsable Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#card2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card2">
          <h6 class="m-0 font-weight-bold text-primary">Action Plans</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="card2">
          <div class="card-body">

            <!-- isi card -->
            <div class="row">

              <h4 class="mb-2 col-md-9"><?= $this->session->userdata('bagian'); ?> <br>(nama proyek : <?= $this->session->userdata('nama_proyek'); ?>)</h4>

              <hr>
            </div>
            <div class="row">
              <button class="btn btn-light col-md-2 ml-3" type="button" data-toggle="collapse" data-target="#tw1" aria-expanded="false" aria-controls="collapseExample">
                Triwulan 1
              </button>
              <button class="btn btn-light col-md-2 offset-1" type="button" data-toggle="collapse" data-target="#tw2" aria-expanded="false" aria-controls="collapseExample">
                Triwulan 2
              </button>
              <button class="btn btn-light col-md-2 offset-1" type="button" data-toggle="collapse" data-target="#tw3" aria-expanded="false" aria-controls="collapseExample">
                Triwulan 3
              </button>
              <button class="btn btn-light col-md-2 offset-1" type="button" data-toggle="collapse" data-target="#tw4" aria-expanded="false" aria-controls="collapseExample">
                Triwulan 4
              </button>
              <?php $bagianId = $this->session->userdata('id');
              //         "SELECT `evaluation`.*
              // FROM `evaluation` JOIN `risk_detail`
              // ON `evaluation`.`id_riskdetail` = `risk_detail`.`id`
              // WHERE `evaluation`.`tahun`='$tahun'
              // AND `evaluation`.`periode`='$periode'
              // AND `risk_detail`.`sumber_risiko`='$sumber'        
              // ";
              $tahun = date('Y');
              $querySumRisk = "SELECT `risk_detail`.*,`evaluation`.*
                FROM `risk_detail` JOIN `evaluation`
                ON  `risk_detail`.`id` = `evaluation`.`id_riskdetail`   
                WHERE `id_identifikasi` = '$bagianId'
                AND `tahun` = '$tahun'
                
                ";
              // $querySumRisk1 = "SELECT `action_plan`.*,`risk_detail`.*
              //   FROM `risk_detail` JOIN `action_plan` 
              //   ON  `action_plan`.`id_evaluation` = `risk_detail`.`id`
              //   WHERE `id_identifikasi` = '$bagianId'


              //   ";
              $sumberRisk = $this->db->query($querySumRisk)->result_array();
              // $sumberRisk1 = $this->db->query($querySumRisk1)->result_array();
              ?>

              <div class="collapse col-md-12" id="tw1">
                <div class="card card-body">
                  <div class="row">
                    <div class="md-col-3 mb-1 offset-1">

                      <!-- Button trigger modal -->
                      <h4>
                        Triwulan 1
                      </h4>
                    </div>
                    <div class="md-col-3 mb-1 offset-6">

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monitoringModal">
                        Add Monitoring
                      </button>
                    </div>
                  </div>
                  <table class="table">
                    <thead class="thead-dark">


                      <tr class="mt-1">
                        <th scope="col">No</th>
                        <th scope="col">Sumber Risiko/ Risk Impact</th>
                        <th scope="col">Triwulan</th>
                        <th scope="col">Action Plan</th>
                        <th scope="col">Aksi</th>

                      </tr>
                    </thead>
                    <tbody>

                      <!-- perulangan  -->
                      <?php $i = 1; ?>

                      <?php foreach ($sumberRisk as $sr) :
                        if ($sr['periode'] == 1) :

                          ?>
                          <tr>
                            <th scope="row"><?= $i  ?></th>
                            <td>
                              <a class="" data-toggle="modal" data-target="#action" style="color:blue" data-isi="<?= $sr['id'] ?>">
                                <?= $sr['sumber_risiko']; ?>

                              </a>
                            </td>
                            <td>
                              <?= $sr['periode']; ?>

                            </td>
                            <?php
                            $idRisk = $sr['id'];
                            $queryAction = "SELECT *
                    FROM `action_plan`
                    WHERE `id_evaluation` = '$idRisk' ";
                            $action = $this->db->query($queryAction)->result_array();
                            ?>
                            <td>
                              <?php foreach ($action as $act) {
                                ?>
                                <?= $act['title']; ?>

                              <?php } ?>
                            </td>
                            <td>
                              <?php if (!$action) : ?>

                                <button data-toggle="modal" data-target="#action" class="btn btn-primary" data-isi="<?= $sr['id'] ?>"> add Action Plan</button>
                              <?php else : ?>
                                <button disabled="disabled" data-toggle="modal" data-target="#action" class="btn btn-primary" data-isi="<?= $sr['id'] ?>"> add Action Plan</button>
                              <?php endif; ?>

                            </td>
                          </tr>
                          <?php $i++;
                        endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>
              </div>


              <div class="collapse col-md-12" id="tw2">
                <div class="card card-body">
                  <div class="row">
                    <div class="md-col-3 mb-1 offset-1">

                      <!-- Button trigger modal -->
                      <h4>
                        Triwulan 2
                      </h4>
                    </div>
                    <div class="md-col-3 mb-1 offset-6">

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monitoringModal">
                        Add Monitoring
                      </button>
                    </div>
                  </div>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sumber Risiko/ Risk Impact</th>
                        <th scope="col">Triwulan</th>
                        <th scope="col">Action Plans</th>
                        <th scope="col">Add action plan</th>

                      </tr>
                    </thead>
                    <tbody>

                      <!-- perulangan  -->
                      <?php $i = 1; ?>

                      <?php foreach ($sumberRisk as $sr) :
                        if ($sr['periode'] == 2) :

                          ?>
                          <tr>
                            <th scope="row"><?= $i  ?></th>
                            <td>
                              <a class="" data-toggle="modal" data-target="#action" style="color:blue" data-isi="<?= $sr['id'] ?>">
                                <?= $sr['sumber_risiko']; ?>

                              </a>
                            </td>
                            <td>
                              <?= $sr['periode']; ?>

                            </td>
                            <?php
                            $idRisk = $sr['id'];
                            $queryAction = "SELECT  `evaluation`.*, `action_plan`.*
                            FROM  `evaluation`
                            JOIN `action_plan`
                            ON `evaluation`.`id` =`action_plan`.`id_evaluation`
                            WHERE `id_evaluation` = '$idRisk'
                            AND `periode`= '2'
                            ";
                            $action = $this->db->query($queryAction)->result_array();
                            ?>
                            <td>
                              <?php foreach ($action as $act) {
                                ?>
                                <?= $act['title']; ?>

                              <?php } ?>
                            </td>
                            <td>
                              <?php if (!$action) : ?>

                                <button data-toggle="modal" data-target="#action" class="btn btn-primary" data-isi="<?= $sr['id'] ?>"> add Action Plan</button>
                              <?php else : ?>
                                <button disabled="disabled" data-toggle="modal" data-target="#action" class="btn btn-primary" data-isi="<?= $sr['id'] ?>"> add Action Plan</button>
                              <?php endif; ?>

                            </td>
                          </tr>
                          <?php $i++;
                        endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>
              </div>


              <div class="collapse col-md-12" id="tw3">
                <div class="card card-body">
                  <div class="row">
                    <div class="md-col-3 mb-1 offset-1">

                      <!-- Button trigger modal -->
                      <h4>
                        Triwulan 3
                      </h4>
                    </div>
                    <div class="md-col-3 mb-1 offset-6">

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monitoringModal">
                        Add Monitoring
                      </button>
                    </div>
                  </div>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sumber Risiko/ Risk Impact</th>
                        <th scope="col">Triwulan</th>
                        <th scope="col">Action Plans</th>
                        <th scope="col">Add action plan</th>

                      </tr>
                    </thead>
                    <tbody>

                      <!-- perulangan  -->
                      <?php $i = 1; ?>

                      <?php foreach ($sumberRisk as $sr) :
                        if ($sr['periode'] == 3) :

                          ?>
                          <tr>
                            <th scope="row"><?= $i  ?></th>
                            <td>
                              <a class="" data-toggle="modal" data-target="#action" style="color:blue" data-isi="<?= $sr['id'] ?>">
                                <?= $sr['sumber_risiko']; ?>

                              </a>
                            </td>
                            <td>
                              <?= $sr['periode']; ?>

                            </td>
                            <?php
                            $idRisk = $sr['id'];
                            $queryAction = "SELECT *
                    FROM `action_plan`
                    WHERE `id_evaluation` = '$idRisk' ";
                            $action = $this->db->query($queryAction)->result_array();
                            ?>
                            <td>
                              <?php foreach ($action as $act) {
                                ?>
                                <?= $act['title']; ?>

                              <?php } ?>
                            </td>
                            <td>
                              <?php if (!$action) : ?>

                                <button data-toggle="modal" data-target="#action" class="btn btn-primary" data-isi="<?= $sr['id'] ?>"> add Action Plan</button>
                              <?php else : ?>
                                <button disabled="disabled" data-toggle="modal" data-target="#action" class="btn btn-primary" data-isi="<?= $sr['id'] ?>"> add Action Plan</button>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <?php $i++;
                        endif; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>

                </div>
              </div>


              <div class="collapse col-md-12" id="tw4">
                <div class="card card-body ">
                  <div class="row">
                    <div class="md-col-3 mb-1 offset-1">

                      <!-- Button trigger modal -->
                      <h4>
                        Triwulan 4
                      </h4>
                    </div>
                    <div class="md-col-3 mb-1 offset-6">

                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#monitoringModal">
                        Add Monitoring
                      </button>
                    </div>
                  </div>
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sumber Risiko/ Risk Impact</th>
                        <th scope="col">Triwulan</th>
                        <th scope="col">Action Plans</th>
                        <th scope="col">Add action plan</th>

                      </tr>
                    </thead>
                    <tbody>

                      <!-- perulangan  -->
                      <?php $i = 1; ?>

                      <?php foreach ($sumberRisk as $sr) :
                        if ($sr['periode'] == 4) :

                          ?>
                          <tr>
                            <th scope="row"><?= $i  ?></th>
                            <td>
                              <a class="" data-toggle="modal" data-target="#action" style="color:blue" data-isi="<?= $sr['id'] ?>">
                                <?= $sr['sumber_risiko']; ?>

                              </a>
                            </td>
                            <td>
                              <?= $sr['periode']; ?>

                            </td>
                            <?php
                            $idRisk = $sr['id'];
                            $queryAction = "SELECT *
                    FROM `action_plan`
                    WHERE `id_evaluation` = '$idRisk' ";
                            $action = $this->db->query($queryAction)->result_array();
                            ?>
                            <td>
                              <?php foreach ($action as $act) {
                                ?>
                                <?= $act['title']; ?>

                              <?php } ?>
                            </td>
                            <td>
                              <?php if (!$action) : ?>

                                <button data-toggle="modal" data-target="#action" class="btn btn-primary" data-isi="<?= $sr['id'] ?>"> add Action Plan</button>
                              <?php else : ?>
                                <button disabled="disabled" data-toggle="modal" data-target="#action" class="btn btn-primary" data-isi="<?= $sr['id'] ?>"> add Action Plan</button>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <?php $i++;
                        endif; ?>
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
    <!-- end card 2-->
    <!-- card2 -->
    <div class=" col-md-3 ">
      <!-- Collapsable Card Example -->
      <div class=" card shadow  mb-4">
        <!-- Card Header - Accordion -->
        <a href=" #card1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card1">
          <h6 class="m-0 font-weight-bold text-primary"> Bagian </h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse hide " id="card1">
          <div class="card-body">

            <!-- Looping Me nu -->

            <?php foreach ($identifikasi as $iden) : ?>
              <div class="mt-3 ml-1">
                <a href="<?= base_url(); ?>/pages/ubahIdentifikasiMitigasi/<?= $iden['id']; ?>">
                  <?= $iden['bagian']; ?><sup>(proyek :<?= $iden["nama_proyek"]  ?>)</sup>
                </a>
              </div>

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

                <!-- Nav Item - Pages Collapse Menu -->
                <a class="nav-link collapsed " style="color:skyblue" href="#" data-toggle="collapse" data-target="#collapse<?= $sr['id'];  ?>" aria-expanded="true" aria-controls="collapse<?= $sr['id'];  ?>">
                  <span>
                    <?= $sr['aspek'];  ?>
                  </span>
                </a>
                <div id="collapse<?= $sr['id'];  ?>" class="collapse" aria-labelledby="heading<?= $sr['id'];  ?>" data-parent="#accordionSidebar">
                  <p class="offset-1"><?= $sr['profil_risiko'];  ?>


                    <span class="nav-link pb-0 offset-1 " href="<?= base_url('pages/ubahSessionRisk/'); ?><?= $sr['id']; ?>">
                      <?= $sr['sumber_risiko']; ?></p>
                  </span>
                </div>



              <?php endforeach; ?>
              <!-- Divider -->
              <hr class="">



            <?php endforeach; ?>


          </div>
        </div>
      </div>


    </div>
    <!-- end card 2-->

    <div class="row">

    </div>




    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Asesmen</h6>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" style="overflow:scroll">

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
                <th scope="col">Likelihood Kini</th>
                <th scope="col">Consequence Kini</th>
                <th scope="col">Level Kini</th>
                <th scope="col">Likelihood Sisa</th>
                <th scope="col">Consequence Sisa</th>
                <th scope="col">Level Sisa</th>
                <th scope="col">Action Plan</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">File Pendukung</th>
                <th scope="col">Waktu</th>
                <th scope="col">PIC</th>
                <th scope="col">Evidence</th>
                <th scope="col">Hasil</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($dataMiti as $d) : ?>
                <tr>
                  <td>
                    edit dan hapus
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
                  <td><?= $d["likelihood_kini"]  ?></td>
                  <td><?= $d["consequence_kini"]  ?></td>
                  <td><?= $d["level_kini"]  ?></td>
                  <td><?= $d["likelihood_sisa"]  ?></td>
                  <td><?= $d["consequence_sisa"]  ?></td>
                  <td><?= $d["level_sisa"]  ?></td>
                  <td> <?= $d["title"]  ?></td>
                  <td><?= $d["description"]  ?></td>
                  <td><?= $d["attachment"]  ?></td>
                  <td><?= $d["date"]  ?></td>
                  <td><?= $d["PIC"]  ?></td>
                  <td><?= $d["evidence"]  ?></td>
                  <td><?= $d["hasil"]  ?></td>

                </tr>
              <?php endforeach; ?>
            </tbody>

          </table>





        </div>


      </div>
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
        <?= form_open_multipart('Pages/addaction'); ?>
        <input type="hidden" class="form-control" name="idRisk" id="idRisk-name">
        <div class="row mt-3 mx-auto">
          <label for="title" class="col-md-4 ">Action Plan Title</label>
          <input class="form-control-md col-md-8 " type="text" name="title" id="title" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('title'); ?>">
        </div>
        <div class="row mt-3 mx-auto">
          <label for="deskripsi" class="col-md-4 ">Uraian</label>
          <textarea class="form-control-md col-md-8 " type="text" name="deskripsi" id="deskripsi" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('deskripsi'); ?>"> </textarea>
        </div>
        <div class="row mt-3 mx-auto">
          <label for="deskripsi" class="col-md-4 ">Attachment</label>
          <div class="custom-file col-md-8">
            <input type="file" class="custom-file-input" id="attachment" name="attachment">
            <label class="custom-file-label" for="attachment">Choose File</label>
          </div>
        </div>
        <div class="row mt-3 mx-auto">
          <label for="waktu" class="col-md-4 ">Waktu</label>
          <input class="form-control-md col-md-8 " type="date" name="waktu" id="waktu" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('waktu'); ?>">
        </div>
        <div class="row mt-3 mx-auto">
          <label for="nilai" class="col-md-4 ">Nilai (Rp.) </label>
          <input class="form-control-md col-md-8 " type="text" name="nilai" id="nilai" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('waktu'); ?>">
        </div>
        <div class="row mt-3 mx-auto">
          <label for="pic" class="col-md-4 ">PIC</label>
          <input class="form-control-md col-md-8 " type="text" name="pic" id="pic" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('pic'); ?>">
        </div>
        <div class="row mt-3 mx-auto">
          <label for="evidence" class="col-md-4 ">Evidence</label>
          <input class="form-control-md col-md-8 " type="text" name="evidence" id="evidence" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('pic'); ?>">
        </div>
        <div class="row mt-3 mx-auto">
          <label for="hasil" class="col-md-4 ">Hasil</label>
          <input class="form-control-md col-md-8 " type="text" name="hasil" id="hasil" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('pic'); ?>">
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
</div>







<!-- Modal -->
<div class="modal fade" id="monitoringModal" tabindex="-1" role="dialog" aria-labelledby="monitoringModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="monitoringModalLabel">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form name="monitoring" method="post" action="<?= base_url('pages/addmonitoring'); ?>">

          <input type="hidden" value="<?= $this->session->userdata('id'); ?>" name="sumberId[]">
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
            <label for="progress" class="col-md-3 ">Progress</label>
            <input class="col-md-8 " type="text" name="progress" id="progress" value="" placeholder="isi dengan angka 0-100 (persen)">
          </div>

          <div class="row mt-3 mx-auto">
            <label class="col-md-3 ">Status</label>

            <div class="form-group col-md-8">
              <input class="form-check-input " type="checkbox" id="status1" value="Disable/ Enable" />
              <label for="status1" class="col-md-5">On Progress</label>

              <textarea class=" row  col-md-12" type="text" id="onprogress" name="onprogress" disabled="disabled"></textarea>


            </div>
          </div>


          <div class="row  mx-auto">
            <div class="col-md-3 "></div>

            <div class="form-group col-md-8">
              <input class="form-check-input " type="checkbox" id="status2" value="Disable/ Enable" />
              <label for="status2" class="col-md-3">Closed</label>
              <textarea class=" row  col-md-12" type="text" id="closed" name="closed" disabled="disabled"> </textarea>
            </div>
          </div>

          <div class="row mx-auto">
            <div class="col-md-3 "></div>
            <div class="form-group col-md-8">
              <input class="form-check-input " type="checkbox" id="status3" value="Disable/ Enable" />
              <label for="status3">Pending</label>
              <textarea class=" row  col-md-12" type="text" id="pending" name="pending" disabled> </textarea>
            </div>
          </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>

      </div>
      </form>
    </div>
  </div>
</div>