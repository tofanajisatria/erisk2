<!-- Footer -->
<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; E-Risk 1.0 Quality & Risk Manajemen 2019</span>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>


  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>


<!-- chained dropdown bagian -->
  <script>
$(document).ready(function(){
$('#divisi').change(function(){
    var namaDivisi = $(this).val();
    
    $.ajax({
        url:"<?= base_url('Pages/fetch_bagian') ?>",
        method:"POST",
        data : {namaDivisi},
        dataType:"text",
        
        success:function(data)
       
        {
            $('#bagian').html(data);
            
        }
    });
});
});
</script>
<!-- chained dropdown profil risiko -->
<script>
$(document).ready(function(){
$('#aspek').change(function(){
    var aspekRisiko = $(this).val();
    
    $.ajax({
        url:"<?= base_url('Pages/fetch_profil') ?>",
        method:"POST",
        data : {aspekRisiko},
        dataType:"text",
        
        success:function(data)
       
        {
            $('#profilRisiko').html(data);
            
        }
    });
});
});
</script>
<!-- chained dropdown sumber risiko -->
<script>
$(document).ready(function(){
$('#profilRisiko').change(function(){
    var profil = $(this).val();
    
    $.ajax({
        url:"<?= base_url('Pages/fetch_sumber') ?>",
        method:"POST",
        data : {profil},
        dataType:"text",
        
        success:function(data)
       
        {
            $('#sumberRisiko').html(data);
            
        }
    });
});
});
</script>

<!-- chained dropdown keterangan -->
<script>
$(document).ready(function(){
$('#sumberRisiko').change(function(){
    var sumber = $(this).val();
    
    $.ajax({
        url:"<?= base_url('Pages/fetch_keterangan') ?>",
        method:"POST",
        data : {sumber},
        dataType:"text",
        
        success:function(data)
       
        {
            $('#keterangan').html(data);
            
        }
    });
});
});
</script>
</body>

</html>
