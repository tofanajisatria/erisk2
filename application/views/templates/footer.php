 <!-- Footer -->
 <footer class="sticky-footer bg-white">
   <div class="container my-auto">
     <div class="copyright text-center my-auto">
       <span>Copyright &copy; E-risk QRM <?= date('Y'); ?></span>
     </div>
   </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
       <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
       </div>
     </div>
   </div>
 </div>






 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
 <script src="<?= base_url('assets/'); ?>js/jquery.dataTables.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/chart.js/highcharts.js"></script>

 <!-- sweetalert2 -->
 <!-- <script src=" <?= base_url(); ?>assets/sweet/dist/sweetalert2.all.min.js"></script> -->
 <script src=" <?= base_url(); ?>assets/js/dist/sweetalert2.all.min.js"></script>
 <script src=" <?= base_url(); ?>assets/js/hello.js"></script>

 <script>
   $(document).ready(function() {
     $('#myTable').DataTable();
   });
 </script>



 <!-- chained dropdown bagian -->
 <script>
   $(document).ready(function() {
     $('#divisi').change(function() {
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
           $('#bagian').html(data);

         }
       });
     });
   });
 </script>
 <!-- chained dropdown profil risiko -->
 <script>
   $(document).ready(function() {
     $('#aspek').change(function() {
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
           $('#profilRisiko').html(data);

         }
       });
     });
   });
 </script>
 <!-- chained dropdown sumber risiko -->
 <script>
   $(document).ready(function() {
     $('#profilRisiko').change(function() {
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
           $('#sumberRisiko').html(data);

         }
       });
     });
   });
 </script>

 <!-- chained dropdown keterangan -->
 <script>
   $(document).ready(function() {
     $('#sumberRisiko').change(function() {
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
           $('#keterangan').html(data);

         }

       });
     });
   });
 </script>





 <script>
   $('.custom-file-input').on('change', function() {
     let fileName = $(this).val().split('\\').pop();
     $(this).next('.custom-file-label').addClass("selected").html(fileName);
   });

   $('.form-check-input').on('click', function() {
     var menuId = $(this).data('menu');
     var roleId = $(this).data('role');

     $.ajax({
       url: "<?= base_url('admin/changeaccess'); ?>",
       type: 'POST',
       data: {
         menuId: menuId,
         roleId: roleId
       },
       success: function() {
         document.location.href = "<?= base_url('admin/roleaccess/');  ?>" + roleId;
       }

     });

   });
 </script>

 <!-- dropdown periode page evaluasi -->
 <script>
   $(document).ready(function() {
     $('#periode').change(function() {
       var periode = $(this).val();
       var tahun = document.getElementById("tahun").value;
       var sumber = document.getElementById("sumber").value;
       var bagian = document.getElementById("bagian").value;


       $.ajax({
         url: "<?= base_url('Pages/fetch_LikelihoodKini') ?>",
         method: "POST",
         data: {
           periode,
           tahun,
           sumber,
           bagian
         },
         dataType: "text",

         success: function(data)

         {
           $('#likelihoodKini').html(data);

         }

       });

       $.ajax({
         url: "<?= base_url('Pages/fetch_ConsequenceKini') ?>",
         method: "POST",
         data: {
           periode,
           tahun,
           sumber,
           bagian
         },
         dataType: "text",

         success: function(data)

         {
           $('#consequenceKini').html(data);

         }

       });

       $.ajax({
         url: "<?= base_url('Pages/fetch_LikelihoodSisa') ?>",
         method: "POST",
         data: {
           periode,
           tahun,
           sumber,
           bagian
         },
         dataType: "text",

         success: function(data)

         {
           $('#likelihoodSisa').html(data);

         }

       });

       $.ajax({
         url: "<?= base_url('Pages/fetch_ConsequenceSisa') ?>",
         method: "POST",
         data: {
           periode,
           tahun,
           sumber,
           bagian
         },
         dataType: "text",

         success: function(data)

         {
           $('#consequenceSisa').html(data);

         }

       });

       $.ajax({
         url: "<?= base_url('Pages/levelKini') ?>",
         method: "POST",
         data: {
           periode,
           tahun,
           sumber,
           bagian
         },
         dataType: "text",

         success: function(data)

         {
           $('#levelKini').html(data);

         }

       });
       $.ajax({
         url: "<?= base_url('Pages/levelSisa') ?>",
         method: "POST",
         data: {
           periode,
           tahun,
           sumber,
           bagian
         },
         dataType: "text",

         success: function(data)

         {
           $('#levelSisa').html(data);

         }

       });

       $.ajax({
         url: "<?= base_url('Pages/tanggapanKini') ?>",
         method: "POST",
         data: {
           periode,
           tahun,
           sumber,
           bagian
         },
         dataType: "text",

         success: function(data)

         {
           $('#tanggapanKini').html(data);

         }

       });
       $.ajax({
         url: "<?= base_url('Pages/tanggapanSisa') ?>",
         method: "POST",
         data: {
           periode,
           tahun,
           sumber,
           bagian
         },
         dataType: "text",

         success: function(data)

         {
           $('#tanggapanSisa').html(data);

         }

       });


     });
   });
 </script>
 <!-- end dropdown periode page evaluasi -->

 <script>
   $(document).ready(function() {
     $('#consequenceKini').change(function() {
       var consequence = $(this).val();
       var likelihood = document.getElementById("likelihoodKini").value;


       $.ajax({
         url: "<?= base_url('Pages/fetch_LevelKini') ?>",
         method: "POST",
         data: {
           likelihood,
           consequence
         },
         dataType: "text",

         success: function(data)

         {

           $('#levelKini').html(data);

         }

       });

       $.ajax({
         url: "<?= base_url('Pages/fetch_tanggapanKini') ?>",
         method: "POST",
         data: {
           likelihood,
           consequence
         },
         dataType: "text",

         success: function(data)

         {

           $('#tanggapanKini').html(data);

         }

       });
     });
   });
 </script>


 <script>
   $(document).ready(function() {
     $('#consequenceSisa').change(function() {
       var consequence = $(this).val();
       var likelihood = document.getElementById("likelihoodSisa").value;


       $.ajax({
         url: "<?= base_url('Pages/fetch_LevelSisa') ?>",
         method: "POST",
         data: {
           likelihood,
           consequence
         },
         dataType: "text",

         success: function(data)

         {

           $('#levelSisa').html(data);

         }

       });

       $.ajax({
         url: "<?= base_url('Pages/fetch_tanggapanSisa') ?>",
         method: "POST",
         data: {
           likelihood,
           consequence
         },
         dataType: "text",

         success: function(data)

         {

           $('#tanggapanSisa').html(data);

         }

       });
     });
   });
 </script>

 <script>
   //  script pada halaman mitigasi bagian disable enable status
   $(document).ready(function() {
     $("#status1").click(function() {
       $("#onprogress").attr('disabled', !$("#onprogress").attr('disabled'));
     });
   });
   $(document).ready(function() {
     $("#status2").click(function() {
       $("#closed").attr('disabled', !$("#closed").attr('disabled'));
     });
   });
   $(document).ready(function() {
     $("#status3").click(function() {
       $("#pending").attr('disabled', !$("#pending").attr('disabled'));
     });
   });
 </script>

 <script>
   $('#action').on('show.bs.modal', function(event) {
     var button = $(event.relatedTarget)
     var idRisk = button.data('isi')
     var modal = $(this)

     modal.find('#idRisk-name').val(idRisk)
   });
 </script>

 <script>
   $('#action').on('show.bs.modal', function(event) {
     var button = $(event.relatedTarget)
     var id = button.data('isi')
     var divisi = button.data('divisi')
     var subdivisi = button.data('subdivisi')
     var modal = $(this)

     modal.find('#idDivisi').val(id)
     modal.find('#divisi1').val(divisi)
     modal.find('#subdivisi1').val(subdivisi)
   });
 </script>

 <script>
   $('#sumberRisk').on('show.bs.modal', function(event) {
     var button = $(event.relatedTarget)
     var id = button.data('isi')
     var aspek = button.data('aspek')
     var profil = button.data('profil')
     var sumber = button.data('sumber')
     var keterangan = button.data('keterangan')
     var modal = $(this)

     modal.find('#idSumber').val(id)
     modal.find('#aspek1').val(aspek)
     modal.find('#profil1').val(profil)
     modal.find('#sumber1').val(sumber)
     modal.find('#keterangan1').val(keterangan)
   });
 </script>
 <script>
   $(document).ready(function() {
     $("#addR").click(function() {
       var review = document.getElementById("review");

       var clone = review.cloneNode(true);
       document.getElementById("addReviewer").appendChild(clone);
     });
   });
   $(document).ready(function() {
     $("#addP").click(function() {
       var approval = document.getElementById("approval");

       var clone = approval.cloneNode(true);
       document.getElementById("addApproval").appendChild(clone);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     $('#consequence').change(function() {
       var consequence = $(this).val();
       var likelihood = document.getElementById("likelihood").value;
       total = likelihood * consequence;

       $.ajax({
         url: "<?= base_url('Pages/fetch_LevelKini') ?>",
         method: "POST",
         data: {
           consequence,
           likelihood
         },
         dataType: "text",

         success: function(data)

         {

           $('#LKaliC').html(total);
           $('#level').html(data);

         }

       });
     });
     $('#likelihood').change(function() {
       var likelihood = $(this).val();
       var consequence = document.getElementById("consequence").value;
       total = likelihood * consequence;

       $.ajax({
         url: "<?= base_url('Pages/fetch_LevelKini') ?>",
         method: "POST",
         data: {
           consequence,
           likelihood
         },
         dataType: "text",

         success: function(data)

         {

           $('#LKaliC').html(total);
           $('#level').html(data);

         }

       });
     });
   });
 </script>

 <!-- <script>
   $(document).ready(function() {
     $("#").click(function() {

       var divisi = document.getElementById("divisi").value;
       var bagian = document.getElementById("bagian").value;
       var proyek = document.getElementById("namaProyek").value;
       var pelanggan = document.getElementById("namaPelanggan").value;
       var pic = document.getElementById("PICProyek").value;
       var akun = document.getElementById("PICAkun").value;
       var petugas = document.getElementById("petugasA").value;
       var tujuan = document.getElementById("tujuan").value;
       var tahun = document.getElementById("tahun").value;
       var triwulan = document.getElementById("triwulan").value;
       var aspek = document.getElementById("aspek").value;
       var profil = document.getElementById("profilRisiko").value;
       var sumber = document.getElementById("sumberRisiko").value;
       var keterangan = document.getElementById("keterangan").value;
       var kontrol = document.getElementById("kontrol").value;
       var uraian = document.getElementById("uraian").value;
       var nilai = document.getElementById("nilai").value;
       var mitigasi = document.getElementById("mitigasi").value;
       var aturan = document.getElementById("aturan").value;
       var likelihood = document.getElementById("likelihood").value;
       var consequence = document.getElementById("consequence").value;
       var LKaliC = document.getElementById("LKaliC").value;
       var level = document.getElementById("level").value;
       var evidence = document.getElementById("evidence").value;
       var hasil = document.getElementById("hasil").value;
       var pengisi = document.getElementById("pengisi").value;

       $.ajax({
         url: "<?= base_url('Pages/saveOnePage'); ?>",
         method: "POST",
         data: {
           divisi,
           bagian,
           proyek,
           pelanggan,
           pic,
           akun,
           petugas,
           tujuan,
           tahun,
           triwulan,
           aspek,
           profil,
           sumber,
           keterangan,
           kontrol,
           uraian,
           nilai,
           mitigasi,
           aturan,
           likelihood,
           consequence,
           level,
           evidence,
           hasil,
           pengisi
         },
         dataType: "text",
         success: function(data) {

           document.location.href = "<?= base_url('pages/onePage');  ?>";
         }

       });


     });
   });
 </script>
 -->







 <!-- < /body> < /html> -->