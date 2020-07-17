<?php include('include/admin_header.php');?>
<?php include('include/admin_sidebar.php');?>

<!--select  all checkboxes function-->
<?php


      
    if(isset($_POST['checkboxArray'])){
       foreach($_POST['checkboxArray'] as $checkbox){
         $block_options=$_POST['block_options'];
          $mess='';
         switch($block_options){
                         
            case 'delete':
            $query="delete from  attendance  where attendance_id={$checkbox} "; 
             $delete_result=mysqli_query($conn,$query);
                 
             if($delete_result == true){
        
          $mess .="<div  class='alert alert-success' style='width: 690px;
    text-align: center;margin-left: 260px;'>Attendance's Successfully Delete <strong> Thank You!!</strong>  </div>";
            echo '<META http-equiv="refresh" content="2;view_attendence.php">'; 
        
        
	}
	else{
		 $mess .="<div style='width: 690px;
    text-align: center;margin-left: 260px;' class='alert alert-danger'><strong> Sorry!!</strong> Something Wrong !!   </div>";
        echo '<META http-equiv="refresh" content="2;view_attendence.php">'; 
	}
                 
    

              break;
                 
                 
         }
           
         }
  }

?>


<!-- view all employess show in table form -->
<!--<div id="page-wrapper">-->
<div class="container-fluid" style="margin-top:70px;">
    <nav class="navbar navbar-light" style="background:linear-gradient(#000, transparent);    box-shadow: 5px 5px 11px #afaaaa;">

        <h4 style="color:lime;background:#131111de"><strong>View All Employee's Attandence</strong></h4>
    </nav>

    <!-- Search view all employess attendance show in table form -->

    <div class="col-md-3" style="margin-bottom: 16px;float:right;">

        <h4 style="margin-left: 68px;"><strong>Search Employee </strong><i class='fa fa-user'></i></h4>


        <form action="search_emp.php" method="post">

            <div class="input-group" style="padding-left:70px;">
                <input type="number" name="search" class="form-control" style="box-shadow:5px 5px 18px #c9cac9" placeholder="Enter Employee ID" autofocus required>

                <span class="input-group-btn">
                    <button class="btn btn-warning" type="submit" name="submit" style="color:;box-shadow:5px 5px 18px #c7c7c7">
                        <span class="glyphicon glyphicon-search" style="font-size: 15px"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>





    <!-- view all employess attendance show in table form -->

    <form action="" method="post" enctype="multipart/form-data">


        <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;    background: linear-gradient(45deg, #000000d4, transparent);color: white;">


            <!--   the select delete all mark date-->
            <div class="col-md-8" style="margin-top:45px;">
                <div class="row">

                    <div id="blockoptions" style='padding:0px' ; class="col-xs-4">
                        <select class="form-control" name="block_options" id="" style="color:red">

                            <option value="delete">Click to Checked Delete All Data </option>
                        </select>

                    </div>
                    <div class="col-md-5 col-xs-7">
                        <input type='submit' class='btn btn-danger' value='Delete All'>
                        <a class='btn btn-info' style="color:" href='add_attendence.php'>Take More Attendance</a>
                    </div>
                    <span><?php if(isset($mess)){echo $mess;}?></span>
                </div>

            </div>


            <thead class="thead-dark">

                <tr>
                    <th><input id='selectallboxs' type='checkbox'></th>
                    <th>#Emp Id</th>
                    <th>Empoyee Name</th>
                    <th class="text-lg-center">Status</th>
                    <th class="text-lg-center">Date</th>
                    <th class="text-lg-center">Action</th>
                </tr>
            </thead>

            <tbody>


                <?php
                    

                    
                        
          $query="Select attendance.attendance_id,attendance.emp_id,attendance.date,attendance.status,employee_info.emp_id,employee_info.emp_name from attendance 
          left join employee_info on employee_info.emp_id= attendance.emp_id ";          
                        
             $select_query=mysqli_query($conn,$query);
                          
                        
             
            while($row=mysqli_fetch_array($select_query)){
               $att_id     =$row['attendance_id'];
               $emp_id     =$row['emp_id'];
               $emp_name   =$row['emp_name'];
               $att_status =$row['status'];
               $att_date   =$row['date'];
                
                
             
                
            echo "<tr>"; 
            ?>
                <td><input class='checkbox' type='checkbox' name='checkboxArray[]' value='<?php echo $att_id;?>'></td>
                <?php
            echo "<td>$emp_id</td>";
            echo "<td>$emp_name</td>";
            echo "<td class='text-center' 
                </td>";
                
        
                    switch($att_status) {

                        case 'Present':
                       echo"<span class='label label-success'>
                        present								 
                        </span>";
                               
                        break;  
                        
                        case 'Absent':
                       echo"<span class='label label-danger'>
                        Absent								 
                        </span>";
                               
                        break;   
                               
                           default:
                      
                       echo"<span class='label' style='background:#eaa72c'>
                        leave								 
                        </span>";
                               
                        break;   
                       
                       
                       }  
            
            echo "<td class='text-center'>$att_date</td>";
          
                
            echo"<td class='text-center'> 
                <a class='btn btn-outline-primary btn-sm border-right'   data-toggle='modal' data-target='#personalModal$emp_id' href='#personalModal'><i class='fa fa-folder-open'></i>  personal Info</a>         
            
              <a href='#deleteModal$att_id' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target='#deleteModal$att_id'><i class='fa fa-trash'></i>  Delete</a>
            
            </td>";
                
                
            
            echo "</tr>";
                
                
            
            }
                        
            
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

<?php }?>



<?php
         if(isset($_GET['delete'])){
               $delete=   $_GET['delete'];
             
           $query="delete from attendance where attendance_id ='$delete' ";  
            
             $delete_query=mysqli_query($conn,$query);
 
             
             if($delete_query==true){
                 
                   echo "<script>alert('Date has been Deleted ')</script>";
                  echo "<script> window.location= 'view_attendence.php'; </script>";
		      exit();
             }else{
                  echo "<script>alert('Date has not deleted  ')</script>";
                  echo "<script> window.location= 'view_attendence.php'; </script>";
		      exit();
                 
             }
       
         
         
         
         }



?>


<?php include'include/admin_footer.php'?>