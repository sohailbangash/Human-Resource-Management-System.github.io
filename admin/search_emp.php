<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>


<!-- view all employess show in table form -->

<div class="container-fluid" style="margin-top:70px;">

    <nav class="navbar navbar-light" style="background: radial-gradient(#132d2a, transparent);">
        <h4 style="color:lime"><strong>Search Result</strong></h4>
    </nav>



    <h5> <a class="btn btn-warning btn-md" style="color:black;box-shadow:5px 5px 18px #959e97;font-size:15px;margin-bottom:15px;" href="view_attendence.php"><i class='fa fa-arrow-left'> Back To Page</i></a></h5>



    <?php
                       if(isset($_POST['submit'])){
                            $search= $_POST['search'];
                           
     $query="Select attendance.attendance_id,attendance.emp_id,attendance.date,attendance.status,employee_info.emp_id,employee_info.emp_name from attendance  join employee_info on employee_info.emp_id= attendance.emp_id where attendance.emp_id = '$search' ";  
    
        $select_query=mysqli_query($conn,$query); 
                           
                           
          
            if(!$select_query){
                die('error'.mysqli_error($conn));
            }
               $count=mysqli_num_rows($select_query);
                    
                if($count==0){
                    echo "<div class='alert alert-danger'>
                     
                      <h3><strong>SORRY !!  </strong> <i> No Result Found!!!</i></h3>
                     
                        </div>";
                    
                }else{
                   
       
            ?>
            <div class="row">
    <div class="col-lg-4 col-md-8">
        <div class="panel panel-success" style="box-shadow:5px 10px 20px #bdbbbbf5">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-smile-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" style="font-size:25px;">
                        <?php
                        
                          $query="select status from attendance where status='present' && emp_id='$search' ";
                          $pre_result=mysqli_query($conn,$query);
                          $present_count=mysqli_num_rows($pre_result);
                        
                          echo"<div class='huge'>$present_count</div>";
                      ?>

                        <div>Total Persent's</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-8">
        <div class="panel panel-danger" style="box-shadow:5px 10px 20px #bdbbbbf5">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-frown-o fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" style="font-size:25px;">
                        <?php
                        
                         $query="select status from attendance where status='Absent' && emp_id='$search' ";
                          $ab_result=mysqli_query($conn,$query);
                          $absent_count=mysqli_num_rows($ab_result);
                        
                          echo"<div class='huge'>$absent_count</div>";
                        ?>

                        <div>Total Absent's</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-8">
        <div class="panel" style="box-shadow:5px 10px 20px #bdbbbbf5;background:linear-gradient(45deg,orange, #ffe3c6fa);border-color: #f7ab39;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-wheelchair fa-5x"></i>

                    </div>
                    <div class="col-xs-9 text-right" style="font-size:25px;">
                        <?php
                        
                          $query="select status from attendance where status='Leave' && emp_id='$search' ";
                          $le_result=mysqli_query($conn,$query);
                          $leave_count=mysqli_num_rows($le_result);
                        
                          echo"<div class='huge'>$leave_count</div>";
                        ?>

                        <div>Total Leave's</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- view all employess attendance show in table form -->

    <form action="" method="post" enctype="multipart/form-data">

        <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(45deg,darkgrey, #ffbe4e5c);">
            <thead class="thead-dark">
                <tr>
                    <th>#Employee Id</th>
                    <th>Empoyee Name</th>
                    <th class="text-lg-center">Status</th>
                    <th class="text-lg-center">Date</th>
                    <th class="text-lg-center">Action</th>
                </tr>
            </thead>

            <tbody>




                <?php
                 
            while($row=mysqli_fetch_assoc($select_query)){
               $att_id    =$row['attendance_id'];
               $emp_id     =$row['emp_id'];
               $emp_name   =$row['emp_name'];
               $att_status =$row['status'];
               $att_date   =$row['date']; 
                
                
            
                
            echo "<tr>";
            echo "<td>$emp_id</td>";
            echo "<td>$emp_name</td>";
             echo "<td class='text-center' 
                 </td>";
               
        switch($att_status) {

            case 'Present':
            echo"<span class='label label-success'> present	</span>";
                               
            break;  
                
            case 'Absent':
               echo"<span class='label label-danger'> absent </span>";

            break;   

               default:

           echo"<span class='label' style='background:#eaa72c'>leave </span>";

            break;   


           }  

             
            echo "<td class='text-lg-center'>$att_date</td>";
                
            echo"<td class='text-center'> 
            
                <a class='btn btn-outline-primary btn-sm border-right'  data-toggle='modal' data-target='#personalModal$emp_id' href='#personalModal'><i class='fa fa-folder-open'></i>  personal Info</a>
                
                 <a href='#deleteModal$att_id' class='btn btn-outline-danger btn-sm ' data-toggle='modal' data-target='#deleteModal$att_id'><i class='fa fa-trash'></i>  Delete</a>
                
                          
                  </td>";
            
            echo "</tr>";
            
           
            
            }
                    
           
                  echo "<h1 class='text-center' style='background: linear-gradient(45deg, #3eb5ab, #bcc4c3);border-radius: 30px;'><strong> $emp_name </strong> </h1>";  
              
        ?>
             
            
            </tbody>
                     
                     
        </table>
                   

    </form>






</div>

<!--   Modal for Employee Personal Information-->
<?php
       include'include/personal_emp_info.php';

?>



<!--   Modal to delete employee date-->
<?php
         $query="Select attendance.attendance_id,attendance.emp_id,attendance.date,attendance.status,employee_info.emp_id,employee_info.emp_name from attendance 
      join employee_info on employee_info.emp_id= attendance.emp_id ";          
                        
             $select_query=mysqli_query($conn,$query);
                          
                        
             
            while($row=mysqli_fetch_array($select_query)){
               $att_id     =$row['attendance_id'];
               $emp_id     =$row['emp_id'];
               $emp_name   =$row['emp_name'];
               $att_status =$row['status'];
               $att_date =$row['date']; 


?>

<!-- delete Modal -->
<div class="modal fade" id="deleteModal<?php echo $att_id?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:radial-gradient(#ff3b3b, transparent);">
                <h4 class="modal-title" id="exampleModalLongTitle"><strong>Delete Employee Attendance Information</strong></h4>
                <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #cecece5e;">
                <h3 style="color:black;">Are You Want to Delete?</h3>
            </div>

            <div class="modal-footer" style="background:radial-gradient(#ff3b3b, transparent);">

                <a href='view_attendence.php?delete=<?php echo $att_id; ?>' class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>

            </div>

        </div>
    </div>
</div>

<?php }
      }
          
      }?>



<?php
//         if(isset($_GET['delete'])){
//               $delete=   $_GET['delete'];
//             
//           $query="delete from attendance where attendance_id ='$delete' ";  
//            
//             $delete_query=mysqli_query($conn,$query);
// 
//             
//             if($delete_query==true){
//                 
////                   echo "<script>alert('Date has been Deleted ')</script>";
////                  echo "<script> window.location= 'search_emp.php'; </script>";
//                  header('location:search_emp.php');
//		      exit();
//             }else{
////                  echo "<script>alert('Date has not deleted  ')</script>";
////                  echo "<script> window.location= 'view_attendence.php'; </script>";
//		      exit();
//                 
//             }
//       
         
         
         
//         }



?>




<?php include'include/admin_footer.php'?>