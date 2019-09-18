<?php
$aspek = array_unique(array_column($sumber_risiko, 'aspek'));
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row ">
    <h1 class="h3 col-md-8  text-gray-800">Risk Detail</h1>
    <a href="<?= base_url('pages/identifikasi'); ?>" class="btn btn-info mt-3   ">
      <span class="icon text-white-50">
        <i class="fas fa-info-circle"></i>
      </span>
      <span class="text">Back</span>
    </a>
    <a class="btn btn-success mt-3 ml-1 float-right" href="<?= base_url('pages/evaluasi'); ?>">
      <span class="icon text-white-50">
        <i class="fas fa-arrow-right"></i>
      </span>
      <span class="text">ke halaman selanjutnya</span>
    </a>

  </div>

  <div class="row mt-5">


    <div class="col-lg-9">
      <!-- Collapsable Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#card1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card1">
          <h6 class=" font-weight-bold text-primary mt-2">Rincian</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="card1">
          <div class="card-body">

            <p>pastikan bahwa risk detail yang akan diisi sesuai dengan table dibawah ini</p>
          <div class="table-responsive">
            <table class="table mx-auto" style="overflow:scroll">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Divisi</th>
                  <th scope="col ">Bagian</th>
                  <th scope="col">Nama Proyek</th>
                  <th scope="col">Tujuan Asesmen</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><?= $this->session->userdata('divisi'); ?></th>
                  <td><?= $this->session->userdata('bagian'); ?></td>
                  <td><?= $this->session->userdata('nama_proyek'); ?></td>
                  <td><?= $this->session->userdata('tujuan'); ?></td>
                </tr>
              </tbody>
            </table>

            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Aspek</th>
                  <th scope="col">Profil Risiko</th>
                  <th scope="col">Sumber Risiko</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <?php foreach ($riskDetail as $risk) : ?>
                <tbody>
                  <tr>
                    <td scope="row"><?= $risk["aspek"]  ?></td>
                    <td><?= $risk["profil_risiko"]  ?></td>
                    <td><?= $risk["sumber_risiko"]  ?></td>
                    <td><?= $risk["keterangan"]  ?></td>
                    <th>
                      <a class="btn btn-danger" href="<?= base_url(); ?>/pages/hapusrisk/<?= $risk['id']; ?>">Hapus</a>
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editRisk" data-id="<?= $risk['id']; ?>" data-aspek="<?= $risk["aspek"] ?>" data-profil="<?= $risk["profil_risiko"] ?>" data-sumber="<?= $risk["sumber_risiko"] ?>" data-keterangan="<?= $risk["keterangan"] ?>" data-kontrol="<?= $risk["kontrol"] ?>" data-konsekuensi="<?= $risk["konsekuensi"] ?>" data-nilai="<?= $risk["nilai"] ?>">
                        Edit
                      </button>
                    </th>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>



          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end card1 -->

    <!-- card2 -->
    <div class="col-lg-3">
      <!-- Collapsable Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#card2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card2">
          <h6 class="m-0 font-weight-bold text-primary">Pilih Data</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse hide" id="card2">
          <div class="card-body">

            <table class="table table-strip">
              <?php foreach ($identifikasi as $iden) : ?>
                <tbody>
                  <tr>
                    <td>
                      <a href="<?= base_url(); ?>/pages/ubahIdentifikasiRisk/<?= $iden['id']; ?>"><?= $iden["bagian"]  ?></a><sup>(proyek :<?= $iden["nama_proyek"]  ?>)</sup>
                    </td>
                  </tr>
                </tbody>
              <?php endforeach; ?>
            </table>


          </div>
        </div>
      </div>

    </div>

  </div>
  <!-- end card 2-->

  <!-- card3 -->
  <div class="row">
    <div class="col-lg-12">
      <!-- Collapsable Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#card3" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="card3">
          <h6 class="m-0 font-weight-bold text-primary">Risk Detail</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="card3">
          <div class="card-body">


            <form action="<?= base_url('pages/addRiskDetail'); ?>" method="post">
              <div class="row mt-3 mx-auto">
                <label for="aspek" class="col-md-3 ">Aspek</label>
                <select name="aspek" class="form-control-md col-md-8" id="aspek" value="<?= set_value('aspek'); ?>">
                  <option selected="true" disabled="disabled">- Pilih aspek -</option>

                  <?php foreach ($aspek as $asp) : ?>
                    <option value="<?= $asp; ?>"><?= $asp; ?></option>
                  <?php endforeach; ?>
                </select>


              </div>

              <div class="row mt-3 mx-auto">
                <label for="profilRisiko" class="col-md-3 ">Profil Risiko</label>
                <select name="profilRisiko" class="form-control-md col-md-8" id="profilRisiko">
                  <option selected="true" disabled="disabled">- Pilih Profil Risiko -</option>
                </select>
              </div>

              <div class="row mt-3 mx-auto">
                <label for="sumberRisiko" class="col-md-4 ">Sumber Risiko</label>
                <select name="sumberRisiko" class="form-control-md col-md-7" id="sumberRisiko">
                  <option selected="true" disabled="disabled">- Pilih Sumber Risiko -</option>
                </select>
              </div>

              <div class="row mt-3 mx-auto">
                <div class="col-md-4 offset-3">
                  <input type="radio" class="" id="controllabel" name="kontrol" value="Controllable" checked="checked">
                  <Label for="controllabel" class="">Controllable</Label>
                </div>
                <div class=" col-md-4">
                  <input type="radio" id="unControllabel" class="" name="kontrol" value="UnControllable">
                  <Label for="unControllabel">UnControllable</Label>
                </div>
              </div>

              <div class="row mt-3 mx-auto">
                <label for="keterangan" class="col-md-3 ">Keterangan</label>
                <select name="keterangan" class="form-control-md col-md-8" id="keterangan">
                  <option selected="true" disabled="disabled">- Pilih Keterangan -</option>
                </select>
              </div>

              <div class="row mt-3 mx-auto">
                <label for="konsekuensi" class="col-md-3 ">Konsekuensi/ impact</label>
                <textarea class="form-control col-md-8" aria-label="With textarea" name="konsekuensi" id="konsekuensi" placeholder="harap diisi jika terdapat konsekuensi"></textarea>
              </div>

              <div class="row mt-3 mx-auto">
                <label for="nilai" class="col-md-3 ">Nilai Rp. </label>
                <input class="col-md-8 " type="text" name="nilai" id="nilai" placeholder="(jika ada)">
              </div>
              <input type="hidden" name="idIdentifikasi" value="<?= $this->session->userdata('id'); ?>">
              <input type="hidden" name="pengisi" value="<?= $user['name']; ?>">
              <input type="hidden" name="bagian" value="<?= $this->session->userdata('bagian'); ?>">
              <div class="row  mt-5 offset-5 ">
                <button type="button" class="btn btn-info " data-toggle="modal" data-target="#spesifik">
                  Add New Library
                </button>

                <button type="submit" class="col-md-6 btn btn-primary  offset-2 " name=addmore>Save</button>
            </form>


          </div>







        </div>
      </div>
    </div>

  </div>

</div>
<!-- end card 3-->



<div class="row mt-3">
  <div class="col-md-12 mt-3">
    <?= $this->session->flashdata('message'); ?>

    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
      <!-- Card Header - Accordion -->

      <a href="#assesmentIdentifikasi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="assesmentIdentifikasi">
        <h6 class="m-0 font-weight-bold text-primary">Data Assesment Identifikasi & Risk Detail</h6>
      </a>
      <!-- Card Content - Collapse -->
      <div class="collapse show" id="assesmentIdentifikasi">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="overflow:scroll">

              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Divisi</th>
                  <th scope="col">Bagian</th>
                  <th scope="col">Proyek</th>
                  <th scope="col">Aspek</th>
                  <th scope="col">Profil</th>
                  <th scope="col">Sumber</th>
                  <th scope="col">UC/C</th>
                  <th scope="col">Keterangan</th>
                  <th scope="col">Konsekuensi</th>
                  <th scope="col">Nilai</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $i=1;
                foreach ($dataRisk as $d) : ?>
                  <tr>
                    <td>
<?= $i++; 
?>
                    </td>
                    <td><?= $d["divisi"]  ?></td>
                    <td><?= $d["bagian"]  ?></td>
                    <td><?= $d["nama_proyek"]  ?></td>
                    <td><?= $d["aspek"]  ?></td>
                    <td><?= $d["profil_risiko"]  ?></td>
                    <td><?= $d["sumber_risiko"]  ?></td>
                    <td><?= $d["kontrol"]  ?></td>
                    <td><?= $d["keterangan"]  ?></td>
                    <td><?= $d["konsekuensi"]  ?></td>
                    <td><?= $d["nilai"]  ?></td>

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

<!-- Modal -->
<div class="modal fade" id="spesifik" tabindex="-1" role="dialog" aria-labelledby="spesifikTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="spesifikTitle">Add More Library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h5>Harap memilih sesuai dengan yang ingin ditambahkan</h5>
        <hr>
        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#addMoreLibraryKeterangan" data-dismiss="modal">
          Tambah Keterangan
        </button>

        <br>
        <br>
        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#addMoreLibrarySumber" data-dismiss="modal">
          Tambah Sumber Risiko & Keterangan
        </button>
        <br>
        <br>

        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#addMoreLibraryProfil" data-dismiss="modal">
          Tambah Profil Risiko, Sumber Risiko & Keterangan
        </button>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addMoreLibraryProfil" tabindex="-1" role="dialog" aria-labelledby="addMoreLibraryProfilTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMoreLibraryProfilTitle">Add More Library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form action="<?= base_url('pages/addNewRisk'); ?>" method="post">

          <div class="row mt-3 mx-auto">
            <label for="aspek1" class="col-md-3 ">Aspek</label>
            <select name="aspek" required="required" class="form-control-md col-md-8" id="aspek1" value="<?= set_value('aspek'); ?>">
              <option selected="true" disabled="disabled">- Pilih aspek -</option>

              <?php foreach ($aspek as $asp) : ?>
                <option value="<?= $asp; ?>"><?= $asp; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="profilRisiko1" class="col-md-3 ">Profil Risiko</label>
            <input name="profilRisiko" class="form-control-md col-md-8" id="profilRisiko1" placeholder="harap diisi" required="required">

          </div>

          <div class="row mt-3 mx-auto">
            <label for="sumberRisiko" class="col-md-4 ">Sumber Risiko</label>
            <input class="col-md-7" name="sumberRisiko" id="sumberRisiko" type="text" placeholder="harap diisi" required="required">
          </div>

          <div class="row mt-3 mx-auto">
            <label for="keterangan" class="col-md-3 ">Keterangan</label>
            <input class="col-md-8" name="keterangan" id="keterangan" type="text" placeholder="harap diisi" required="required">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>







<!-- Modal -->
<div class="modal fade" id="addMoreLibrarySumber" tabindex="-1" role="dialog" aria-labelledby="addMoreLibrarySumberTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMoreLibrarySumberTitle">Add More Library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form action="<?= base_url('pages/addNewRisk'); ?>" method="post">

          <div class="row mt-3 mx-auto">
            <label for="aspek2" class="col-md-3 ">Aspek</label>
            <select name="aspek" class="form-control-md col-md-8" id="aspek2" value="<?= set_value('aspek'); ?>" required="required">
              <option selected="true" disabled="disabled">- Pilih aspek -</option>

              <?php foreach ($aspek as $asp) : ?>
                <option value="<?= $asp; ?>"><?= $asp; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="profilRisiko2" class="col-md-3 ">Profil Risiko</label>
            <select name="profilRisiko" class="form-control-md col-md-8" id="profilRisiko2" required="required">
              <option selected="true" disabled="disabled">- Pilih Profil Risiko -</option>
            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="sumberRisiko" class="col-md-4 ">Sumber Risiko</label>
            <input class="col-md-7" name="sumberRisiko" id="sumberRisiko" type="text" placeholder="harap diisi" required="required">
          </div>

          <div class="row mt-3 mx-auto">
            <label for="keterangan" class="col-md-3 ">Keterangan</label>
            <input class="col-md-8" name="keterangan" id="keterangan" type="text" placeholder="harap diisi" required="required">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="addMoreLibraryKeterangan" tabindex="-1" role="dialog" aria-labelledby="addMoreLibraryKeteranganTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMoreLibraryKeteranganTitle">Add More Library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form action="<?= base_url('pages/addNewRisk'); ?>" method="post">

          <div class="row mt-3 mx-auto">
            <label for="aspek3" class="col-md-3 ">Aspek</label>
            <select name="aspek" class="form-control-md col-md-8" id="aspek3" value="<?= set_value('aspek'); ?>" required="required">
              <option selected="true" disabled="disabled">- Pilih aspek -</option>

              <?php foreach ($aspek as $asp) : ?>
                <option value="<?= $asp; ?>"><?= $asp; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="profilRisiko3" class="col-md-3 ">Profil Risiko</label>
            <select name="profilRisiko" class="form-control-md col-md-8" id="profilRisiko3" required="required">
              <option selected="true" disabled="disabled">- Pilih Profil Risiko -</option>
            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="sumberRisiko3" class="col-md-4 ">Sumber Risiko</label>
            <select class="form-control-md col-md-8" name="sumberRisiko" id="sumberRisiko3" required="required">
              <option selected="true" disabled="disabled">- Pilih Sumber Risiko -</option>
            </select>

          </div>

          <div class="row mt-3 mx-auto">
            <label for="keterangan" class="col-md-3 ">Keterangan</label>
            <input class="col-md-8" name="keterangan" id="keterangan" type="text" placeholder="harap diisi" required="required">
          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editRisk" tabindex="-1" role="dialog" aria-labelledby="editRiskTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editRiskTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('pages/addRiskDetail'); ?>" method="post">

          <div class="row mt-3 mx-auto">
            <input type="hidden" id="idRisk" name="idRisk">
            <label for="aspek" class="col-md-3 ">Aspek</label>
            <input type="text" name="aspek" id="aspekm" class="form-control col-md-7">
            <select class="form-control-md col-md-1" id="aspek4" value="<?= set_value('aspek'); ?>">
              <option selected="true" disabled="disabled">- Pilih aspek -</option>

              <?php foreach ($aspek as $asp) : ?>
                <option value="<?= $asp; ?>"><?= $asp; ?></option>
              <?php endforeach; ?>
            </select>


          </div>

          <div class="row mt-3 mx-auto">
            <label for="profilRisiko" class="col-md-3 ">Profil Risiko</label>
            <input type="text" name="profilRisiko" id="profilm" class="form-control col-md-7">
            <select class="form-control-md col-md-1" id="profilRisiko4">
              <option selected="true" disabled="disabled">- Pilih Profil Risiko -</option>
            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="sumberRisiko" class="col-md-4 ">Sumber Risiko</label>
            <input type="text" name="sumberRisiko" id="sumberm" class="form-control col-md-6">
            <select class="form-control-md col-md-1" id="sumberRisiko4">
              <option selected="true" disabled="disabled">- Pilih Sumber Risiko -</option>
            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="keterangan" class="col-md-3 ">Keterangan</label>
            <input name="keterangan" type="text" id="keteranganm" class="form-control col-md-7">
            <select class="form-control-md col-md-1" id="keterangan4">
              <option selected="true" disabled="disabled">- Pilih Keterangan -</option>
            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <div class="col-md-4 offset-3">
              <input type="radio" class="" id="controllablem" name="kontrol" value="Controllable">
              <Label for="controllabelm" class="">Controllable</Label>
            </div>
            <div class=" col-md-4">
              <input type="radio" id="unControllablem" class="" name="kontrol" value="UnControllable">
              <Label for="unControllabelm">UnControllable</Label>
            </div>
          </div>



          <div class="row mt-3 mx-auto">
            <label for="konsekuensim" class="col-md-3 ">Konsekuensi/ impact</label>
            <textarea class="form-control col-md-8" aria-label="With textarea" name="konsekuensi" id="konsekuensim" placeholder="harap diisi jika terdapat konsekuensi"></textarea>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="nilaim" class="col-md-3 ">Nilai Rp. </label>
            <input class="col-md-8 " type="text" name="nilai" id="nilaim" placeholder="(jika ada)">
          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('#editRisk').on('show.bs.modal', function(event) {

      var button = $(event.relatedTarget)
      var id = button.data('id')
      var aspek = button.data('aspek')
      var profil = button.data('profil')
      var sumber = button.data('sumber')
      var keterangan = button.data('keterangan')
      var kontrol = button.data('kontrol')
      var konsekuensi = button.data('konsekuensi')
      var nilai = button.data('nilai')
      var modal = $(this)

      modal.find('#idRisk').val(id)
      modal.find('#aspekm').val(aspek)
      modal.find('#profilm').val(profil)
      modal.find('#sumberm').val(sumber)
      modal.find('#keteranganm').val(keterangan)
      // kondisi 1
      modal.find('#konsekuensim').val(konsekuensi)
      modal.find('#nilaim').val(nilai)
      if (kontrol = "UnControllable") {
        modal.find('#unControllablem').attr('checked', 'true')
        modal.find('#controllablem').attr('checked', 'false')
      } else if (kontrol = "Controllable") {
        modal.find('#controllablem').attr('checked', 'true')
        modal.find('#unControllablem').attr('checked', 'false')

      }
    });










    $('#aspek2').change(function() {
      var aspekRisiko = $(this).val();

      $.ajax({
        url: "<?= base_url('Pages/fetch_profil') ?>",
        method: "POST",
        data: {
          aspekRisiko
        },
        dataType: "text",

        success: function(data)

        {
          $('#profilRisiko2').html(data);

        }
      });
    });

    $('#aspek3').change(function() {
      var aspekRisiko = $(this).val();

      $.ajax({
        url: "<?= base_url('Pages/fetch_profil') ?>",
        method: "POST",
        data: {
          aspekRisiko
        },
        dataType: "text",

        success: function(data)

        {
          $('#profilRisiko3').html(data);

        }
      });
    });

    $('#profilRisiko3').change(function() {
      var profil = $(this).val();

      $.ajax({
        url: "<?= base_url('Pages/fetch_sumber') ?>",
        method: "POST",
        data: {
          profil
        },
        dataType: "text",

        success: function(data)

        {
          $('#sumberRisiko3').html(data);

        }
      });
    });


    $('#aspek4').change(function() {
      var aspekRisiko = $(this).val();

      $.ajax({
        url: "<?= base_url('Pages/fetch_profil') ?>",
        method: "POST",
        data: {
          aspekRisiko
        },
        dataType: "text",

        success: function(data)

        {
          $('#profilRisiko4').html(data);
          $('#aspekm').val(aspekRisiko);
          $('#profilm').val("");
          $('#sumberm').val("");
          $('#keteranganm').val("");
        }
      });
    });

    $('#profilRisiko4').change(function() {
      var profil = $(this).val();

      $.ajax({
        url: "<?= base_url('Pages/fetch_sumber') ?>",
        method: "POST",
        data: {
          profil
        },
        dataType: "text",

        success: function(data)

        {
          $('#sumberRisiko4').html(data);
          $('#profilm').val(profil);
        }
      });
    });

    $('#sumberRisiko4').change(function() {
      var sumber = $(this).val();

      $.ajax({
        url: "<?= base_url('Pages/fetch_keterangan') ?>",
        method: "POST",
        data: {
          sumber
        },
        dataType: "text",

        success: function(data)

        {
          $('#keterangan4').html(data);
          $('#sumberm').val(sumber);
        }

      });
    });

    $('#keterangan4').change(function() {
      var ket = $(this).val();
      $('#keteranganm').val(ket);

    });





  });
</script>