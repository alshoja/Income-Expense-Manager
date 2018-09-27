
   
   
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">

            </div>
          </div>
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
              </span>
              Dashboard
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">

              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url() ?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Food Expense
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <?php              
                 
               foreach($expense->result() as $row)  
                {  
           
                 ?>
                  
                 <?php  if($row->E===NULL){ ?>
                     <h2 class="mb-5">No Expense Today!</h2>
                 <?php }    
                  else{ ?>
                  <h2 class="mb-5">₹ <?php echo  $row->E ?></h2>
                  <?php }?>
                        
           <?php  
                 } 
           ?> 
<!--                  <h6 class="card-text">Increased by 60%</h6>-->
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url() ?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3"> Recieved Amount
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                   <?php              
                 
               foreach($income->result() as $row)  
                {  
           
                 ?>
                  
                 <?php  if($row->I===NULL){ ?>
                     <h2 class="mb-5">No Income Today!</h2>
                 <?php }    
                  else{ ?>
                  <h2 class="mb-5">₹ <?php echo  $row->I ?></h2>
                  <?php }?>
                        
           <?php  
                 } 
           ?> 
<!--                  <h6 class="card-text">Decreased by 10%</h6>-->
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="<?php echo base_url() ?>assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Number of Customers
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                           <?php              
                 
               foreach($count->result() as $row)  
                {  
           
                 ?>
                  
                 <?php  if($row->COUNT===NULL){ ?>
                     <h2 class="mb-5">0</h2>
                 <?php }    
                  else{ ?>
                  <h2 class="mb-5"> <?php echo  $row->COUNT ?></h2>
                  <?php }?>
                        
           <?php  
                 } 
           ?> 
<!--                  <h6 class="card-text">Increased by 5%</h6>-->
                </div>
              </div>
            </div>
          </div>
<!--
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="clearfix">
                    <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                    <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                  </div>
                  <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Income Sources</h4>
                  <canvas id="traffic-chart"></canvas>
                  <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                </div>
              </div>
            </div>
          </div>
-->

          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title text-primary">Recent Food Expense</h4>
                  <div class="table-responsive" >
                   <table id="example" class="table">
                      <thead>
                        <tr>
                            <th>
                            #
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Item
                          </th>
                          
                          <th>
                            Amount
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php              
                  if($fetch_debit->num_rows() > 0)  
         {  
                      $j=1;
              $i=1;
               foreach($fetch_debit->result() as $row)  
                {  
           ?> 
                        <tr>
                            <td><?php echo $i++ ?></td>
                          <td>
                            <img src="<?php echo base_url() ?>assets/images/faces/806962_user_512x512.png" class="mr-2" alt="image">
                           <?php echo $row->name ?>
                          </td>
                          <td> <?php echo $row->category_id ?></td>
                          
                          <td>
                             <?php echo $row->amount ?>
                          </td>
                           <td>
                        
                              <label class="badge badge-gradient-danger">Food Expense</label>
                           </td>
                           <td>
                         
                              <a class="btn btn-primary btn-sm" onclick="document.getElementById('id06<?php echo $j; ?>').style.display='block'"   aria-label="Skip to main navigation">
  <i class="fa fa-pencil" aria-hidden="true"></i>
</a>
<a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>/Home/add_debit?del=<?php echo $row->deb_id ?>"  aria-label="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
  <i class="fa fa-trash-o" aria-hidden="true"></i>
</a>


                          </td>
                        </tr>
                        <div id="id06<?php echo $j; ?>" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-sand"> 
        <span onclick="document.getElementById('id06<?php echo $j; ?>').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
          <br>
        <h4>Edit Expense</h4>
      </header>
      <div class="w3-container">
       <form class="forms-sample" method="post" action="<?php echo base_url() ?>/Home/add_debit?id=<?php echo $row->deb_id ?>&del_id=<?php echo $row->id ?> ">
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Customer Name</label>
                    <input name="" readonly="" type="text" class="form-control form-control-sm" value="<?php echo $row->name  ?>" placeholder="" aria-label="Name">
                    <input type="hidden" name="name" value="<?php echo $row->cus_id ?>">
                  </div>
                    <div class="form-group">
                    <label>Date Of Payment</label>
                    <input name="date" type="date" required="" class="form-control form-control-sm" placeholder="Username" aria-label="Date">
                  </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Discription</label>
                      <input name="discription" value="<?php echo $row->discription ?>" type="text" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Discription">
                    </div>
                    <div class="form-group">
                    <label>Amount Debited</label>
                    <input name="amount" onkeypress="return isNumber(event)" value="<?php echo $row->amount ?>" type="text" class="form-control form-control-sm" placeholder="Debit Amount" aria-label="Debit Amount">
                  </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Item Category</label>
                    <select required="" name="item" class="form-control form-control-sm" id="exampleFormControlSelect3">
                        <option disabled selected value="Nill">Select item</option>
                        <option value="Break Fast">Breakfast</option>
                        <option value="Meals">Meals</option>
                    
                        <option value="Dinner">Night food</option>
                        <option value="others">Others</option>
                    </select>
                  </div>
                      <button type="submit" name="update_debit" class="btn btn-gradient-primary mr-2 btn-sm ">Update</button>
                    <button type="reset" class="btn btn-sm btn-light">Clear</button>
                  </form>
      </div>
      <footer class="w3-container w3-sand">
          <br>
      </footer>
    </div>
  </div>
                        <?php 
                        $j++;
             }  
          }
           
          else  
           {  
           ?>  
                        <tr>
               
                          <td>No Food Expense Found</td>   
                        </tr>
           <?php  
          }  
           ?> 
                      
                     
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>    
            
      <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title text-primary">Recent Amount Received </h4>
                  <div class="table-responsive" >
                   <table id="example" class="table">
                      <thead>
                        <tr>
                            <th>
                            #
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Item
                          </th>
                          
                          <th>
                            Amount
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          
                      
                      <?php    
                      $i=1;
                      $j=1;
                  if($fetch_credit->num_rows() > 0)  
         {  
             
               foreach($fetch_credit->result() as $row)  
                {  
           ?> 
                        <tr>
                            <td><?php echo $i++ ?></td>
                          <td>
                            <img src="<?php echo base_url() ?>assets/images/faces/806962_user_512x512.png" class="mr-2" alt="image">
                            <?php echo $row->name ?>
                          </td>
                          <td>NILL</td>
                          
                          <td>
                          <?php echo $row->amount ?>
                          </td>
                          <td>
                            <label class="badge badge-gradient-success">Amount Recieved</label>
                          </td>
                           <td>
                         
                              <a class="btn btn-primary btn-sm" onclick="document.getElementById('id07<?php echo $j; ?>').style.display='block'"   aria-label="Skip to main navigation">
  <i class="fa fa-pencil" aria-hidden="true"></i>
</a>

<a class="btn btn-danger btn-sm" href="<?php echo base_url() ?>Home/add_credit?del=<?php echo $row->cre_id ?>" onclick="return confirm('Are you sure you want to delete this item?');" aria-label="Delete">
  <i class="fa fa-trash-o" aria-hidden="true"></i>
</a>


                          </td>
                          <div id="id07<?php echo $j; ?>" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-sand"> 
        <span onclick="document.getElementById('id07<?php echo $j; ?>').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
          <br>
        <h4>Edit Income</h4>
      </header>
      <div class="w3-container">
       <form class="forms-sample" method="post" action="<?php echo base_url() ?>/Home/add_credit?id=<?php echo $row->cre_id ?>&del_id=<?php echo $row->id ?> ">
                    <div class="form-group">
                    <label for="exampleFormControlSelect3">Customer Name</label>
                    <input name="" readonly="" type="text" class="form-control form-control-sm" value="<?php echo $row->name  ?>" placeholder="" aria-label="Name">
                    <input type="hidden" name="name" value="<?php echo $row->cus_id ?>">
                  </div>
                    <div class="form-group">
                    <label>Date Of Payment</label>
                    <input name="date" readonly="" type="text" value="<?php echo $row->date ?>" required="" class="form-control form-control-sm" placeholder="Username" aria-label="Date">
                  </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Discription</label>
                      <input name="discription" value="<?php echo $row->discription ?>" type="text" class="form-control form-control-sm" id="exampleInputPassword1" placeholder="Discription">
                    </div>
                    <div class="form-group">
                    <label>Amount Debited</label>
                    <input name="amount" onkeypress="return isNumber(event)" value="<?php echo $row->amount ?>" type="text" class="form-control form-control-sm" placeholder="Debit Amount" aria-label="Debit Amount">
                  </div>
                    
                      <button type="submit" name="update_credit" class="btn btn-gradient-primary mr-2 btn-sm ">Update</button>
                    <button type="reset" class="btn btn-sm btn-light">Clear</button>
                  </form>
      </div>
      <footer class="w3-container w3-sand">
          <br>
      </footer>
    </div>
  </div>
                        </tr>
                         <?php   
                         $j++;
             }  
          }  
          else  
           {  
           ?>  
                        <tr>
               
                      <td>No Amounts Recieved</td> 
                        </tr>
                       
              
           <?php  
          }  
           ?> 
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>       
<!--        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Todays Expense</h4>
                  <div class="table-responsive">
                    <table id="example2" class="table">
                      <thead>
                        <tr>
                          <th>
                            Name
                          </th>
                          <th>
                            Item
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php              
                  if($fetch_credit->num_rows() > 0)  
         {  
              $i=1;
               foreach($fetch_credit->result() as $row)  
                {  
           ?> 
                        <tr>
                          <td>
                            <img src="<?php echo base_url() ?>assets/images/faces/806962_user_512x512.png" class="mr-2" alt="image">
                            <?php echo $row->cus_id ?>
                          </td>
                          <td>
                            <?php echo $row->category_id ?>
                          </td>
                          <td>
                            <label class="badge badge-gradient-success">DONE</label>
                          </td>
                          <td>
                          <?php echo $row->amount ?>
                          </td>
                          <td>
                             
                          </td>
                        </tr
                         <?php       
             }  
          }  
          else  
           {  
           ?>  
               
                      <td>No data Found</td> 
              
           <?php  
          }  
           ?> 
                
                        
                        
                        
                      </tbody>
                    </table>
                     
                  </div>
                </div>
                 <script>
    $(function() {
      $("#example").simplePagination({
        previousButtonClass: "btn btn-gradient-primary btn-sm",
        nextButtonClass: "btn btn-gradient-primary btn-sm"
      });


    });
  </script>
              </div>
            </div>
          </div>-->
          
<style>
    .w3-modal {
    z-index: 1101;
}
    </style>
            
            
           
            
        <!-- content-wrapper ends -->
   

<!--          
          <div id="id07" class="w3-modal">
    <div class="w3-modal-content">
      <header class="w3-container w3-purple"> 
        <span onclick="document.getElementById('id07').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <div class="w3-container">
        <p>Some text..</p>
        <p>Some text..</p>
      </div>
      <footer class="w3-container w3-purple">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>-->
