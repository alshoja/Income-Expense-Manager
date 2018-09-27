
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            
            
           <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <?php if($this->session->has_userdata('msg'))
        {?>
                    <script>
                        toast();
                        </script>
    <?php //echo $this->session->userdata('msg'); ?>
 <?php
  
        }
 $this->session->unset_userdata('msg');
?>   
                  <h4 class="card-title text-primary">Customer Area</h4>
                  <p class="card-description text-secondary">
                    Add Customer
                  </p>
                  <form class="forms-sample" method="post" action="<?php echo base_url() ?>/Home/add_client">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" required="" class="form-control" name="name" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Mobile</label>
                      <input type="text" required="" maxlength="10"  onkeypress="return isNumber(event)" onchange="check_mobnumber()" name="mobile" class="form-control" id="exampleInputEmail3" placeholder="Mobile">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Area</label>
                      <input type="text" name="area" class="form-control" id="exampleInputPassword4" placeholder="area">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                      <select class="form-control" name="gender" id="exampleSelectGender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    
                    <div class="form-group">
                      <label for="exampleInputCity1">City</label>
                      <input type="text" name="city" class="form-control" id="exampleInputCity1" placeholder="Location">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Address</label>
                      <textarea name="address" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                      <button type="submit" name="add" class="btn btn-gradient-primary mr-2">Add Customer</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div> 
            
            
            
        </div>
        <!-- content-wrapper ends -->
        <script>
       function check_mobnumber()
{
    a=document.getElementById("mobile").value;
    if(a.length<10)
    {
       document.getElementById("mobile").style.borderColor="red"; 
       number.focus();
       alert("must Have 10 numbers");
    }
    else
    {
        document.getElementById("mobile").style.borderColor="";
    }
    
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