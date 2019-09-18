<?php
$div = array_unique(array_column($divisi, 'nama_divisi'));


?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row ">
    <h1 class="h3 col-md-8  text-gray-800">Approval</h1>
    <a href="<?= base_url('pages/monitoring'); ?>" class="btn btn-info mt-3   ">
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
      <h6 class="m-0 font-weight-bold text-primary">Approval</h6>
    </div>
    <div class="card-body">
      <div class="container">
        <div class="card-body">

        </div>

        <!-- form menambah identifikasi -->
        <form action="<?= base_url('Pages/addapproval') ?>" method="post" class="identification">

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
            <label for="made" class="col-md-3 ">Made By</label>
            <select required name="made[]" class="form-control-md col-md-8" id="made" value="<?= set_value('made'); ?>">
              <option selected="true" disabled="disabled">- Pilih -</option>
              <?php foreach ($pengguna as $p) : ?>
                <option value="<?= $p['name'] ?>"><?= $p['name'] ?>(<?= $p['jabatan'] ?>) </option>
              <?php endforeach; ?>
            </select>
          </div>



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
      </form>
    </div>
  </div>



</div>
</div>