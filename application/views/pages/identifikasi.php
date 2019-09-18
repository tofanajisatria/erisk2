<?php
$div = array_unique(array_column($divisi, 'nama_divisi'));
$bag = array_unique(array_column($divisi, 'bagian'));

?>

<!-- Begin Page Content -->
<div class="container-fluid">





  <!-- Page Heading -->
  <div class="row ">
    <h1 class="h3 col-md-8  text-gray-800">Identifikasi Risiko</h1>
    <a href="<?= base_url('user'); ?>" class="btn btn-info mt-3   ">
      <span class="icon text-white-50">
        <i class="fas fa-info-circle"></i>
      </span>
      <span class="text">Back</span>
    </a>
    <a class="btn btn-success mt-3 ml-1 float-right" href="<?= base_url('pages/riskdetail'); ?>">
      <span class="icon text-white-50">
        <i class="fas fa-arrow-right"></i>
      </span>
      <span class="text">ke halaman selanjutnya</span>
    </a>

  </div>



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
        <form action="<?= base_url('Pages/addidentifikasi') ?>" method="post" class="identification">

          <div class="row  mx-auto">
            <label for="divisi" class="col-md-3 ">Nama Divisi</label>

            <select required name="divisi" class="form-control-md col-md-8  " id="divisi" value="<?= set_value('divisi'); ?>">
              <option selected="true" disabled="disabled" value="-">- Pilih Divisi -</option>
              <?php foreach ($div as $d) : ?>

                <option value="<?= $d ?>"><?= $d ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="row mt-3 mx-auto ">
            <label for="bagian" class="col-md-3 ">Nama Bagian</label>
            <select required name="bagian" class="form-control-md col-md-8" id="bagian" value="<?= set_value('bagian'); ?>">
              <option selected="true" disabled="disabled" value="-">- Pilih bagian -</option>

            </select>
          </div>

          <div class="row mt-3 mx-auto">
            <label for="namaProyek" class="col-md-3 ">Nama Proyek</label>
            <input class="form-control-md col-md-8 " type="text" name="namaProyek" id="namaProyek" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('namaProyek'); ?>">
          </div>

          <div class="row mt-3 mx-auto">
            <label for="namaPelanggan" class="col-md-3 ">Nama Pelanggan</label>
            <input class="form-control-md col-md-8 " type="text" name="namaPelanggan" id="namaPelanggan" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('namaPelanggan'); ?>">
          </div>

          <div class="row mt-3 mx-auto">
            <label for="PICProyek" class="col-md-3 ">PIC Proyek</label>
            <input class="col-md-8 " type="text" name="PICProyek" id="PICProyek" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('PICProyek'); ?>">
          </div>

          <div class="row mt-3 mx-auto">
            <label for="PICAkun" class="col-md-3 ">PIC Akun</label>
            <input class="col-md-8 " type="text" name="PICAkun" id="PICAkun" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('PICAkun'); ?>">
          </div>

          <div class="row mt-3 mx-auto">
            <label for="petugasA" class="col-md-3 ">Petugas Assesment</label>
            <input class="col-md-8 " type="text" name="petugasA" id="petugasA" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('petugasA'); ?>">
          </div>

          <div class="row mt-3 mx-auto">
            <label for="tanggalA" class="col-md-3 ">Tanggal Assesment</label>
            <input required class="col-md-8 " type="date" name="tanggalA" id="tanggalA" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('tanggalA'); ?>">
          </div>

          <div class="row mt-3 mx-auto">
            <label for="tujuan" class="col-md-3 ">Tujuan Assesment</label>
            <input class="col-md-8 " type="text" name="tujuan" id="tujuan" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('tujuan'); ?>">
          </div>
          <input type="hidden" name="pengisi" value="<?= $user['name']; ?>">

          <div class="row col-md-7 offset-5 mt-5 float-right">
            <button type="submit" class="btn btn-primary col-md-11 " name="submit"> Save</button>
          </div>
      </div>
      </form>
    </div>
  </div>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
  <div class="row mt-3">
    <div class="col-md-12 mt-3" >
      <!-- Collapsable Card Example -->
      <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->

        <a href="#assesmentIdentifikasi" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="assesmentIdentifikasi">
          <h6 class="m-0 font-weight-bold text-primary">Data Assesment Identifikasi</h6>
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
                    <th scope="col">Pelanggan</th>
                    <th scope="col">PIC Proyek</th>
                    <th scope="col">PIC Akun</th>
                    <th scope="col">Petugas Assesment</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Tujuan</th>
                  </tr>
                </thead>
                <?php foreach ($identifikasi as $iden) : ?>
                  <tbody>
                    <tr>
                      <td class="">
                        <a class="btn btn-danger tombol-hapus" href="<?= base_url(); ?>/pages/hapus/<?= $iden['id']; ?>">Hapus</a>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#updateIden" style="color:white" data-id="<?= $iden['id'] ?>" data-divisi="<?= $iden['divisi'] ?>" data-bagian="<?= $iden['bagian'] ?>" data-proyek="<?= $iden['nama_proyek'] ?>" data-pelanggan="<?= $iden['nama_pelanggan'] ?>" data-pic="<?= $iden['pic_proyek'] ?>" data-akun="<?= $iden['pic_akun'] ?>" data-petugas="<?= $iden['petugas'] ?>" data-tanggal="<?= $iden['tanggal'] ?>" data-tujuan="<?= $iden['tujuan'] ?>">
                          Edit
                        </a>
                      </td>
                      <td><?= $iden["divisi"]  ?></td>
                      <td><?= $iden["bagian"]  ?></td>
                      <td><?= $iden["nama_proyek"]  ?></td>
                      <td><?= $iden["nama_pelanggan"]  ?></td>
                      <td><?= $iden["pic_proyek"]  ?></td>
                      <td><?= $iden["pic_akun"]  ?></td>
                      <td><?= $iden["petugas"]  ?></td>
                      <td><?= $iden["tanggal"]  ?></td>
                      <td>
                        <?= $iden["tujuan"]  ?>
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

  </div>





</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Modal -->
<div class="modal fade" id="updateIden" tabindex="-1" role="dialog" aria-labelledby="updateLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateLabel">Identifikasi </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= form_open_multipart('Pages/addidentifikasi'); ?>

        <div class="row  mx-auto">
          <input type="hidden" id="idIdentifikasi" name="idIdentifikasi">
          <label for="divisim" class="col-md-3 ">Nama Divisi</label>
          <input type="text" name="divisi" required class="form-control-md col-md-7" id="divisim" value="<?= set_value('divisi'); ?>">
          <select required class="form-control-md col-md-1" id="divisio" value="<?= set_value('divisi'); ?>">
            <option selected="true" disabled="disabled" value="-">- Pilih Divisi -</option>
            <?php foreach ($div as $d) : ?>

              <option value="<?= $d ?>"><?= $d ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="row mt-3 mx-auto ">
          <label for="bagianm" class="col-md-3 ">Nama Bagian</label>
          <input type="text" name="bagian" required class="form-control-md col-md-7" id="bagianm">
          <select required class="form-control-md col-md-1" id="bagiano" value="<?= set_value('bagian'); ?>">
            <option selected="true" disabled="disabled" value="-">- Pilih bagian -</option>

          </select>
        </div>

        <div class="row mt-3 mx-auto">
          <label for="namaProyekm" class="col-md-3 ">Nama Proyek</label>
          <input class="form-control-md col-md-8 " type="text" name="namaProyek" id="namaProyekm" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('namaProyek'); ?>">
        </div>

        <div class="row mt-3 mx-auto">
          <label for="namaPelangganm" class="col-md-3 ">Nama Pelanggan</label>
          <input class="form-control-md col-md-8 " type="text" name="namaPelanggan" id="namaPelangganm" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('namaPelanggan'); ?>">
        </div>

        <div class="row mt-3 mx-auto">
          <label for="PICProyekm" class="col-md-3 ">PIC Proyek</label>
          <input class="col-md-8 " type="text" name="PICProyek" id="PICProyekm" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('PICProyek'); ?>">
        </div>

        <div class="row mt-3 mx-auto">
          <label for="PICAkunm" class="col-md-3 ">PIC Akun</label>
          <input class="col-md-8 " type="text" name="PICAkun" id="PICAkunm" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('PICAkun'); ?>">
        </div>

        <div class="row mt-3 mx-auto">
          <label for="petugasAm" class="col-md-3 ">Petugas Assesment</label>
          <input class="col-md-8 " type="text" name="petugasA" id="petugasAm" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('petugasA'); ?>">
        </div>

        <div class="row mt-3 mx-auto">
          <label for="tanggalAm" class="col-md-3 ">Tanggal Assesment</label>
          <input required class="col-md-8 " type="date" name="tanggalA" id="tanggalAm" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('tanggalA'); ?>">
        </div>

        <div class="row mt-3 mx-auto">
          <label for="tujuanm" class="col-md-3 ">Tujuan Assesment</label>
          <input class="col-md-8 " type="text" name="tujuan" id="tujuanm" placeholder="(kosongkan bila tidak ada)" value="<?= set_value('tujuan'); ?>">
        </div>
        <input type="hidden" name="pengisi" value="<?= $user['name']; ?>">

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?= form_close(); ?>
      </div>
    </div>
  </div>


</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    $('#updateIden').on('show.bs.modal', function(event) {

      var button = $(event.relatedTarget)
      var id = button.data('id')
      var divisi = button.data('divisi')
      var bagian = button.data('bagian')
      var proyek = button.data('proyek')
      var pelanggan = button.data('pelanggan')
      var pic = button.data('pic')
      var akun = button.data('akun')
      var petugas = button.data('petugas')
      var tanggal = button.data('tanggal')
      var tujuan = button.data('tujuan')
      var modal = $(this)

      modal.find('#idIdentifikasi').val(id)
      modal.find('#divisim').val(divisi)
      modal.find('#bagianm').val(bagian)
      modal.find('#namaProyekm').val(proyek)
      modal.find('#namaPelangganm').val(pelanggan)
      modal.find('#PICProyekm').val(pic)
      modal.find('#PICAkunm').val(akun)
      modal.find('#petugasAm').val(petugas)
      modal.find('#tanggalAm').val(tanggal)
      modal.find('#tujuanm').val(tujuan)
    });
    $('#divisio').change(function() {
      var namaDivisi = $(this).val();

      $.ajax({
        url: "<?= base_url('Pages/fetch_bagian') ?>",
        method: "POST",
        data: {
          namaDivisi
        },
        dataType: "text",

        success: function(data)

        {
          $('#bagiano').html(data);

          $('#divisim').val(namaDivisi);
          $('#bagianm').val("");
        }
      });
    });

    $('#bagiano').change(function() {
      var bag = $(this).val();
      $('#bagianm').val(bag);
    });

  });
</script>