<?php include 'include/user_header.php';?>

    <div class="container mg-top">
    
     
     <nav class="navbar navbar-light bg-dark" style="border-radius:15px;background:linear-gradient(210deg,#353535, #e2e2e2fa);box-shadow:5px 5px 20px #adadadf0;">
                <h4 style="color:black;text-align:center"><b>Attendance</b></h4>  
             </nav>
           
        
           
           <!--   View attendance an card use for total attandence      -->

<div class="col-md-12 mg-top">
  
  <div class="row">
  
<!--    green card or present card start-->
  
   <div class="col-lg-3 col-md-6">
  <div class="card  mb-3 pl-3" style="max-width: 15rem;font-size: 35px;box-shadow: 5px 10px 20px #bdbbbbf5;background: linear-gradient(540deg,#6c9a7f47,#11bb38);border-color: #e6e4e3;border-radius: 16px;">
     <div class="card-header"><h5>Total Present's</h5></div>
   <?php
            $emp_id   =$_SESSION['emp_id'];
            $emp_role= $_SESSION['emp_role'];
            $emp_email= $_SESSION['emp_email'];
      
       $query="select * from attendance where status='present' && emp_id='$emp_id' ";
         $le_result=mysqli_query($conn,$query);
         $leave_count=mysqli_num_rows($le_result);

         echo"<div class='card-body'>$leave_count</div>";
    ?>

  </div> 
</div>

     
  
    <!--    Red card or Absent car start-->       
      
<div class="col-lg-3 col-md-6">
  
    <div class="card  mb-3 pl-3" style="max-width: 15rem;font-size: 35px;box-shadow: 5px 10px 20px #bdbbbbf5;background: linear-gradient(540deg,#c76b6b47, #ff0404);border-color: #e6e4e3;border-radius: 16px;">
     <div class="card-header"><h5>Total Absent's</h5></div>
   <?php
           $query="select * from attendance where status='absent' && emp_id='$emp_id' ";
             $le_result=mysqli_query($conn,$query);
             $leave_count=mysqli_num_rows($le_result);

             echo"<div class='card-body'>$leave_count</div>";
        ?>
      
  </div> 
</div>
    
     <!--    Yallow card or Leave card start-->
     
      
       <div class="col-lg-3 col-md-6">
  
  <div class="card  mb-3 pl-3" style="max-width: 15rem;font-size:30px;box-shadow:5px 10px 20px #bdbbbbf5;background:linear-gradient(540deg,orange, #ffe3c6fa);border-color: #f7ab39;border-radius:16px;">
     <div class="card-header"><h5>Total Leave's</h5></div>
   <?php
     

            $query="select * from attendance where status='Leave' && emp_id='$emp_id' ";
            $le_result=mysqli_query($conn,$query);
            $leave_count=mysqli_num_rows($le_result);

            echo"<div class='card-body'>$leave_count</div>";
            ?>
      
  </div> 
    </div>
    
    </div>
    
        
</div> <!--   View attendance an card use for total attandence      -->   
      

       
      <!-- view all employess attendance show in table form -->    
       
        <form action="" method="post" enctype="multipart/form-data">
            
                <table class="table table-bordered table-hover mg-top">
                
                    <thead class="thead-dark">
                          
                        <tr>
                          
                            <th>#Your Id</th>
                            <th>Your Name</th>
                            <th class="text-lg-center">Status</th>
                            <th class="text-lg-center">Date</th>
                        </tr>
                    </thead>

                    <tbody class="">


                        <?php
                    

                        
          $query="Select attendance.attendance_id,attendance.emp_id,attendance.date,attendance.status,employee_info.emp_id,employee_info.emp_name from attendance 
          join employee_info on employee_info.emp_id= attendance.emp_id where employee_info.emp_id='$emp_id' ";          
                        
             $select_query=mysqli_query($conn,$query);
                          
                        
             
            while($row=mysqli_fetch_array($select_query)){
               $att_id     =$row['attendance_id'];
               $emp_id     =$row['emp_id'];
               $emp_name   =$row['emp_name'];
               $att_status =$row['status'];
               $att_date =$row['date']; 
                
                
             
                
            echo "<tr>"; 
            echo "<td>$emp_id</td>";
            echo "<td>$emp_name</td>";
            echo "<td class='text-center' 
                </td>";
                
          
                
                switch($att_status) {

                       case 'Present';
                       echo"<span class='badge badge-success'>
                        present								 
                        </span>";
                               
                        break;  
                        
                        case 'Absent';
                       echo"<span class='badge badge-danger'>
                        Absent								 
                        </span>";
                               
                        break;   
                               
                           default:
                      
                       echo"<span class='badge badge-warning'>
                        leave								 
                        </span>";
                               
                        break;   
                       
                       
                       }  
          
                         echo "<td class='text-center'>$att_date</td>";
        
                          echo "</tr>";
                
                
            
            }
                        
            
        ?>

                    </tbody>

                </table>

         
        </form>
 

   </div>      
          
            
                
 
      
      
       
      
<?php include 'include/user_footer.php';?>