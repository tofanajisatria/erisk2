<?php
$div = array_unique(array_column($divisi, 'nama_divisi'));



?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row ">
    <h1 class="h3 col-md-8  text-gray-800">Monitoring Risiko </h1>
    <a href="<?= base_url('pages/mitigasi'); ?>" class="btn btn-info mt-3   ">
      <span class="icon text-white-50">
        <i class="fas fa-info-circle"></i>
      </span>
      <span class="text">Back</span>
    </a>
    <a class="btn btn-success mt-3 ml-1 float-right" href="<?= base_url('pages/summary'); ?>">
      <span class="icon text-white-50">
        <i class="fas fa-arrow-right"></i>
      </span>
      <span class="text">ke halaman selanjutnya</span>
    </a>
  </div>

  <!-- Circle Buttons -->
  <div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Rincian Monitoring</h6>
    </div>
    <div class="card-body">
      <div class="container">
        <div class="card-body">

        </div>

        <form action="<?= base_url('pages/monitoring'); ?>" method="post">

          <div class="row  mx-auto">
            <label for="divisi" class="col-md-3 ">Nama Divisi</label>

            <select required name="divisi" class="form-control-md col-md-8  " id="divisi" value="<?= set_value('divisi'); ?>">
              <option selected="true" disabled="disabled">- Pilih divisi -</option>
              <?php foreach ($div as $d) : ?>

                <option value="<?= $d ?>"><?= $d ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="row mt-3 mx-auto ">
            <label for="bagian" class="col-md-3 ">Nama Bagian</label>
            <select required name="bagian" class="form-control-md col-md-8" id="bagian" value="<?= set_value('bagian'); ?>">
              <option selected="true" disabled="disabled">- Pilih bagian -</option>

            </select>
          </div>

          <div class="row mt-3 mx-auto ">
            <label for="proyek" class="col-md-3 ">Nama Proyek</label>
            <select required name="proyek" class="form-control-md col-md-8" id="proyek" value="<?= set_value('proyek'); ?>">
              <option selected="true" disabled="disabled">- Proyek -</option>

            </select>
          </div>

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
              <option selected="true" disabled="disabled">- Pilih periode -</option>
              <option value="1">- Triwulan 1 -</option>
              <option value="2">- Triwulan 2 -</option>
              <option value="3">- Triwulan 3 -</option>
              <option value="4">- Triwulan 4 -</option>
            </select>
          </div>

          <div class="row col-md-7 offset-5 mt-5 float-right">
            <button type="submit" class="btn btn-primary col-md-11 " name="cari" id="cari">OK</button>
          </div>
      </div>
      </form>
    </div>
  </div>


  <!-- DataTales Example -->
  <div class="card shadow mb-4 ">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Tabel Monitoring</h6>
    </div>
    <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
      <form method="post" action="<?= base_url('pages/unduhmonitoring') ?>">
        <input type="hidden" name="divisi" value="<?= $this->session->userdata('divisi'); ?>">
        <input type="hidden" name="bagian" value="<?= $this->session->userdata('bagian'); ?>">
        <input type="hidden" name="proyek" value="<?= $this->session->userdata('proyek'); ?>">
        <input type="hidden" name="periode" value="<?= $this->session->userdata('periode'); ?>">
        <input type="hidden" name="tahun" value="<?= $this->session->userdata('tahun'); ?>">
        <input type="hidden" name="id" value="<?= $this->session->userdata('id_identifikasi'); ?>">

        <div class="offset-9">


          <button type=" submit" class="btn btn-primary ">
            Unduh data
          </button>
      </form>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#approvalm" data-divisi="<?= $this->session->userdata('divisi'); ?>" data-bagian="<?= $this->session->userdata('bagian'); ?>" data-proyek="<?= $this->session->userdata('proyek'); ?>" data-periode="<?= $this->session->userdata('periode'); ?>" data-tahun="<?= $this->session->userdata('tahun'); ?>" data-id="<?= $this->session->userdata('id_identifikasi'); ?>">
        Approval
      </button>
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
  </div>
</div>








</div>



<!-- Modal -->
<div class="modal fade" id="approvalm" tabindex="-1" role="dialog" aria-labelledby="approvalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="approvalTitle">Tambah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <form action="<?= base_url('Pages/addapproval') ?>" method="post">
          <input type="hidden" id="idm" name="idm">
          <input type="hidden" id="divisim">
          <input type="hidden" id="bagianm" name="bagianm">
          <input type="hidden" id="proyekm">
          <input type="hidden" id="periodem" name="periodem">
          <input type="hidden" id="tahunm">
          <input type="hidden" name="madebym" id="madeBy" value="<?= $user['name']; ?>">





          <div class="row mt-3 mx-auto ">
            <div class="col-md-3">
              <label for="review">Review By</label>
            </div>
            <div class="col-md-5">
              <select required name="review[]" class="form-control-md col-md-12 mt-1" id="review" value="<?= set_value('review'); ?>">
                <option selected="true" disabled="disabled">- Pilih -</option>
                <?php foreach ($pengguna as $p) : ?>
                  <option value="<?= $p['name'] ?>"><?= $p['name'] ?>(<?= $p['jabatan'] ?>) </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3">

              <a type="" style="color:white" id="addR" class="btn btn-primary col-md-12 ml-2">Add Review</a>
            </div>
          </div>

          <div class="row mx-auto mt-2">
            <div class="col-md-8 offset-3" id="addReviewer">
            </div>
          </div>

          <div class="row mt-3 mx-auto ">
            <div class="col-md-3">
              <label for="approval">Approval By</label>
            </div>
            <div class="col-md-5">
              <select required name="approval[]" class="form-control-md col-md-12 mt-1" id="approval" value="<?= set_value('approval'); ?>">
                <option selected="true" disabled="disabled">- Pilih -</option>
                <?php foreach ($pengguna as $p) : ?>
                  <option value="<?= $p['name'] ?>"><?= $p['name'] ?>(<?= $p['jabatan'] ?>) </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3">

              <a type="" style="color:white" id="addP" class="btn btn-primary col-md-12 ml-2">Add Approval</a>
            </div>
          </div>

          <div class="row mx-auto mt-2">
            <div class="col-md-8 offset-3" id="addApproval">
            </div>
          </div>

          <div class="row col-md-7 offset-5 mt-5 float-right">
            <button type="submit" class="btn btn-primary col-md-11 " name="submit">Ok</button>
          </div>
      </div>
    </div>


  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>

    </form>
  </div>


</div>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('#bagian').change(function() {
      var bagian = $(this).val();

      $.ajax({
        url: "<?= base_url('Pages/fetch_proyek') ?>",
        method: "POST",
        data: {
          bagian
        },
        dataType: "text",

        success: function(data)

        {
          $('#proyek').html(data);

        }
      });
    });





    $('#approvalm').on('show.bs.modal', function(event) {

      var button = $(event.relatedTarget)
      var divisi = button.data('divisi')
      var bagian = button.data('bagian')
      var proyek = button.data('proyek')
      var tahun = button.data('tahun')
      var periode = button.data('periode')
      var id = button.data('id')
      var modal = $(this)

      modal.find('#divisim').val(divisi)
      modal.find('#bagianm').val(bagian)
      modal.find('#proyekm').val(proyek)
      modal.find('#tahunm').val(tahun)
      modal.find('#periodem').val(periode)
      modal.find('#idm').val(id)


    });






  });
</script>