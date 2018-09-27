    
<style>


/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #e2dbf1;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
.tab {
    overflow: hidden;
    border: 1px solid #fff;
    background-color: #ffffff;
}
</style>
<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            

  <!-- endinject -->
     
    
   


<div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary">Customer Profile</h5>
                    <form class="form-inline" method="post" action="<?php echo base_url() ?>Home/report">
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                       <?php     
                      $name="";
                       foreach($fetch_debit_p->result() as $row)  
                {  
                           
                           $name=$row->name;
                           
                } ?>
                    <div class="input-group-text text-primary text-capitalize"> <?php if($name===""){
                              echo  $name= "Sorry No data";
                           }
                           else
                           {
                               echo $name;
                           }
?></div>
                      </div>
                      
                    </div>
                  
                    <label class="sr-only" for="inlineFormInputGroupUsername2">To</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                    
                      </div>
                        
                    </div>
                    
                  
                    
                  </form>
                    
                    
                    <br>
                  <div class="table-responsive">
<div class="tab">
  <button class="tablinkss " onclick="openCityy(event, 'debit')" id="defaultOpen">Food Expense</button>
  <button class="tablinkss " onclick="openCityy(event, 'credit')">Amount Receved</button>
<!--  <button class="tablinkss" onclick="openCityy(event, 'xx')">Tokyo</button>-->
</div>

<div id="debit" class="tabcontentt">
  
  <table id="example" class="table">
                      <thead>
                        <tr>
                            <th>
                            #
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
                            Date/Time
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php              
                  if($fetch_debit_p->num_rows() > 0)  
         {  
              $i=1;
               foreach($fetch_debit_p->result() as $row)  
                {  
           ?> 
                        <tr>
                            <td><?php echo $i++ ?></td>
                          
                          <td> <?php echo $row->category_id ?></td>
                          <td>
                        
                              <label class="badge badge-gradient-danger">Food Expense</label>
                          </td>
                          <td>₹
                             <?php echo $row->amount ?>
                          </td>
                           <td>
                           <?php       $converted = date('d M Y h.i.s A', strtotime($row->date));
                                       echo $reversed = date('d-m-Y', strtotime($converted)); ?>   
                          </td>
                        </tr>
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

<div id="credit" class="tabcontentt">

  <table id="example" class="table">
                      <thead>
                        <tr>
                            <th>
                            #
                          </th>
                          
                          
                          <th>
                            Status
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Date/Time
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                          
                      
                      <?php              
                  if($fetch_credit_p->num_rows() > 0)  
         {  
             $i=1;
               foreach($fetch_credit_p->result() as $row)  
                {  
           ?> 
                        <tr>
                            <td><?php echo $i++ ?></td>
                          
                         
                          <td>
                            <label class="badge badge-gradient-success">Recieved Amount</label>
                          </td>
                          <td>₹
                          <?php echo $row->amount ?>
                          </td>
                          <td>
                               <?php
                                  $converted = date('d M Y h.i.s A', strtotime($row->date));
                                       echo $reversed = date('d-m-Y', strtotime($converted));

                             ?>  
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
<br>
                    <?php              
                  if($fetch_sum_p->num_rows() > 0)  
                {  
              $i=1;
              $sum_texte="(0)";
              $sum_text = "(0)";
               foreach($fetch_sum_p->result() as $row)  
                {  
                   $sum= $row->dtotal- $row->ctotal;
                   $credit=$row->ctotal;
                   $debit= $row->dtotal;
                   if($credit>$debit){
                       $sum_texte = $row->ctotal - $row->dtotal ;
//                       $sum_texte .= " Excess Amount ";
                   }
                       elseif($credit<$debit)
                       {
                        $sum_text = $row->dtotal- $row->ctotal;
                       }
 elseif($sum===0) {
     $sum_text="Hurray!!......No Dues!";
 }
                   
                   
           ?> 
                    <h5 class="text-success">Food Expense:₹ <?php echo $row->dtotal ?></h5>
                    <h5 class="text-success">Amount Recieved:₹ <?php echo $row->ctotal ?></h5>
                    <h5 class="text-danger">Due's Amount: ₹ <?php echo $sum_text?>/-</h5>
                     <h5 class="text-warning">Excess Amount: ₹ <?php echo $sum_texte?>/-</h5>
                    <?php       
             }  
          }  
          else  
           {  
           ?>  
               
                    <h5>No data Found</h5> 
              
           <?php  
          }  
           ?> 
<!--<div id="xx" class="tabcontentt">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>-->

<script>
function openCityy(evt, cityName) {
    var i, tabcontentt, tablinkss;
    tabcontentt = document.getElementsByClassName("tabcontentt");
    for (i = 0; i < tabcontentt.length; i++) {
        tabcontentt[i].style.display = "none";
    }
    tablinkss = document.getElementsByClassName("tablinkss");
    for (i = 0; i < tablinkss.length; i++) {
        tablinkss[i].className = tablinkss[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
                    
                  </div>
                </div>
              </div>
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
        <!-- content-wrapper ends -->
