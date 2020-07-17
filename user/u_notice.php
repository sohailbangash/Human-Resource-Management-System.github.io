<?php include "include/user_header.php";?>

        
        
        
         <div class="row mg-top">
      <div class="container">
     <nav class="navbar navbar-light bg-dark" style="border-radius:15px;background:linear-gradient(210deg,#353535, #e2e2e2fa);box-shadow:5px 5px 20px #adadadf0;">
                <h4 style="color:black;text-align:center"><b>Notice's View</b></h4>  
             </nav>
        
        <div class="mg-top">
              <div class="mg-top">
                  <table class="table table-hover" style="background:linear-gradient(45deg, #d27617d6, transparent)">
  <thead class="table-dark">
    <tr class="tt">
      <th scope="col">Notice ID#</th>
      <th scope="col">Title</th>
      <th scope="col">Detail</th>
      <th scope="col">Pulished Date </th>
      <th scope="col" class="text-center">Action</th>
     
    </tr>
  </thead>
         <tbody>
                  <?php
                         $emp_id   =$_SESSION['emp_id'];
                         $emp_role= $_SESSION['emp_role'];
                         $emp_email= $_SESSION['emp_email'];
             
                $query="select  notice_id,notice_title,notice_description,date from notice_info ";
                        
             $view_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($view_query)){
               $notic_id    =$row['notice_id']; 
               $notic_date  =$row['date'];
               $notic_title =$row['notice_title'];
               $des        =substr($row['notice_description'],0,50);
                
            echo "<tr>";
            echo "<td>$notic_id</td>";
            echo "<td><b>$notic_title</b></td>";
            echo "<td>$des...</td>"; 
            echo "<td>$notic_date</td>";
            echo"<td class='text-center'> 
            
                <a href='#viewModal$notic_id' class='btn btn-outline-primary btn-sm'   data-toggle='modal'><i class='fa fa-folder-open'></i>  View Notice</a> 
                      
               </td>";
            
            echo "</tr>";
            
            }
             
             
             
             ?>
                  
                  
        </tbody>
                 
                 
                  </table>
              </div>
        </div>
        </div>
       
          </div>
          
 <!--   Modal for view Notice-->
      
      <?php
                     
            $query="select  notice_id,notice_title,notice_description,date from notice_info ";
                        
             $view_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($view_query)){
               $notic_id    =$row['notice_id']; 
               $notic_date  =$row['date'];
               $notic_title =$row['notice_title'];
               $des        =$row['notice_description'];

        ?>
    
     
  <!--   Modal for view Notice-->


<div class="modal fade" id="viewModal<?php echo  $notic_id; ?>"  role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#a2ddff2e;box-shadow: 0px 6px 5px #191818;">
          <h3 class="modal-title" id="exampleModalLongTitle"><strong>View Notice</strong></h3>
        <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: linear-gradient(45deg, #ce8c48, transparent);">
           <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                     
                      <?php echo "<h3><b>Title :</b></h3>" .$notic_title."<p class='text-right'><strong>Date</strong> :".$notic_date."</p>";?>
                     <hr>
					
                <label for="" ><strong>Description:</strong></label>
                <textarea  class="form-control" cols="30" rows="10" readonly><?php echo $des;?> </textarea>
                </div>
         
        </div>
      </div>
      <div class="modal-footer"  style="background:#a2ddff2e">
        <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>    
              
              
              
              
              
  <?php    }?>
  
          
      
<?php include "include/user_footer.php";?>