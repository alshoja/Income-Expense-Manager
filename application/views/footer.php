<script>
        function logout(){
            swal({
  title: "Are you sure?",
  text: "You will be signed Out!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   
  window.location = "<?php echo base_url()  ?>Users/logout";

  } 
});
            
        }
        </script>

        <script>
    function toast(){
        
    iziToast.success({
    title: 'Info!',
    message: 'New Customer added',
});
    }

</script>
<script>
    function toastitem(){
        
    iziToast.info({
    title: 'Info!',
    message: 'One item added',
});
    }

</script>
<script>
    function deletetoast(){
        
    iziToast.warning({
    title: 'Info!',
    message: 'One Entry Deleted',
});
    }

</script>
<script>
    function toastupdate(){
        
    iziToast.success({
    title: 'Info!',
    message: 'One Entry Updated',
});
    }

</script>
<?php 
 
if($this->session->has_userdata('msg'))
        {?>
                    <script>                     
 <?php echo $this->session->userdata('msg'); ?>
                        </script>
  
 <?php
  
        }
 $this->session->unset_userdata('msg'); ?>

                     
 <script>
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}
</script>
<script>
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
    </script>
<!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="http://www.technalatus.com/" target="_blank">Technalatus</a></span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Pepper Salt<i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?php echo base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo base_url() ?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo base_url() ?>assets/js/off-canvas.js"></script>
  <script src="<?php echo base_url() ?>assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url() ?>assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
 <script src="<?php echo base_url() ?>assets/js/jquery.simplePagination.js"></script>
</body>

</html>
