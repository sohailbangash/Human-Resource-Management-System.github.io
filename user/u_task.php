<?php include "include/user_header.php";?>

      <div class="row mg-top">
      <div class="container">
    <nav class="navbar navbar-light bg-dark" style="border-radius:15px;background:linear-gradient(210deg,#353535, #e2e2e2fa);box-shadow:5px 5px 20px #adadadf0;">
                <h4 style="color:black;text-align:center"><b>Task's View</b></h4>  
             </nav>
        
        <div class="mg-top">
              <div class="mg-top">
                  <table class="table   table-bordered table-hover" style="background: linear-gradient(45deg, #fd4e4e, transparent)" >
  <thead class="table-dark">
    <tr class="tt">
      <th scope="col">Emp ID#</th>
      <th scope="col">Name</th>
      <th scope="col">Pulished Date</th>
       <th scope="col">Title</th>
        <th scope="col">Last Date</th>   
      <th scope="col">Action</th>
     
    </tr>
  </thead>
         <tbody>
                   <?php
             
                      $emp_id   =$_SESSION['emp_id'];
                         $emp_role= $_SESSION['emp_role'];
                         $emp_email= $_SESSION['emp_email'];
                
                             
             $query="select * from task_info left join employee_info on employee_info.emp_id = task_info.emp_id where employee_info.emp_id='$emp_id' ";
                        
             $select_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($select_query)){
               $task_id    =$row['task_id']; 
               $emp_id     =$row['emp_id'];
               $emp_name   =$row['emp_name'];
               $task_date  =$row['date'];
               $task_title =$row['task_title'];
               $l_date   =$row['last_date'];
               
                
                
                
            echo "<tr>";
            echo "<td>$emp_id</td>";
            echo "<td>$emp_name</td>";
            echo "<td>$task_date</td>";
            echo "<td><b>$task_title</b></td>";
            echo "<td>$l_date</td>";
           
                
            echo"<td class='text-center'> 
            
                  <a href='#viewModal$task_id' class='btn btn-outline-primary btn-sm'   data-toggle='modal'><i class='fa fa-folder-open'></i>  View task</a> 
                         
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
         $query="select * from task_info left join employee_info on employee_info.emp_id = task_info.emp_id ";

       $query_result=mysqli_query($conn,$query);
    
     
          while($row=mysqli_fetch_array($query_result)){
                        $task_id   =$row['task_id'];
                        $emp_id     =$row['emp_id'];
                        $emp_name   =$row['emp_name'];
                        $task_date  =$row['date'];
                        $task_title =$row['task_title'];
                        $l_date   =$row['last_date']; 
                        $task_details=$row['detail']



?>

<div class="modal fade" id="viewModal<?php echo  $task_id; ?>"  role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#ff2f006b;box-shadow: 0px 6px 5px #191818;">
          <h3 class="modal-title" id="exampleModalLongTitle"><strong>View Task</strong></h3>
        <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#f1f4ffb8">
           <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                     
                      <?php echo "<h3><b>Title :</b></h3>" .$task_title."<p class='text-right'><strong>Date</strong> :".$task_date."</p>";?>
                     <hr>
                     <label for="" ><strong>Description:</strong></label>
					  <textarea  class="form-control" cols="30" rows="10" readonly><?php echo $task_details;?></textarea>
                </div>

        </div>
      </div>
      <div class="modal-footer"  style="background:#ff2f006b">
        <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>    
              
              
              
              
              
  <?php    }?>
  


<?php include "include/user_footer.php";?>