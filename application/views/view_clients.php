
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            
        <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                           
                    <br>
                  <h2 class="card-title text-primary">Customer Management Portal</h2>
                  <div class="table-responsive">
                    <table id="example"  class="table">
                      <thead>
            <tr>
               <th>#</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Area</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
 
        
 
        <tbody>
               <?php              
                  if($fetch_cus->num_rows() > 0)  
         {  
              $i=1;
               foreach($fetch_cus->result() as $row)  
                {  
           ?> 
            <tr>
                <td><?php echo $i++ ?></td>
                          <td>
                            <img src="<?php echo base_url() ?>assets/images/faces/806962_user_512x512.png" class="mr-2" alt="image">
                            <?php echo $row->name ?>
                          </td>
                          <td>
                         <?php echo $row->mobile ?>
                          </td>
                          <td>
                            <label class="badge badge-gradient-success"> <?php echo $row->gender ?></label>
                          </td>
                          <td>
                         <?php echo $row->area ?>
                          </td>
                          <td>
                         <?php echo $row->address ?>
                          </td>
                          
                          <td>
                         
                              <a class="btn btn-primary btn-sm" href="<?php echo  base_url() ?>Home/debit_credit_p?id=<?php echo $row->id ?>" aria-label="Skip to main navigation">
  <i class="fa fa-bars" aria-hidden="true"></i>
</a>
<a class="btn btn-danger btn-sm" href="<?php echo  base_url() ?>Home/view_clients?del=<?php echo $row->id ?>" onclick="return confirm('Are you sure you want to delete this Customer?');" aria-label="Delete">
  <i class="fa fa-trash-o" aria-hidden="true"></i>
</a>


                          </td>
                          
                        </tr>
                         <?php       
             }  
          }  
          else  
           {  
           ?>  
               
                   <tr><td>No Customers Found</td></tr> 
              
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
            
            
            <script>
		$(function() {
			$("#example").simplePagination({
				previousButtonClass: "btn btn-gradient-primary btn-sm",
				nextButtonClass: "btn btn-gradient-primary btn-sm"
			});


		});
	</script>
	<script>
            $(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
} );
            </script>
            
        </div>
        <!-- content-wrapper ends -->
      