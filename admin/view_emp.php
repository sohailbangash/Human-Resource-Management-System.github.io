<?php include('include/admin_header.php');?>
<?php include('include/admin_sidebar.php');?>

<!--    select  all checkboxes function-->
<?php

    if(isset($_POST['checkboxArray'])){
       foreach($_POST['checkboxArray'] as $checkbox){
         $block_options=$_POST['block_options'];
          $mess='';
         switch($block_options){
                         
            case 'delete':
            $query="delete from  employee_info  where emp_id={$checkbox} "; 
             $delete_result=mysqli_query($conn,$query);
                 
             if($delete_result == true){
        
          $mess .="<div  class='alert alert-success' style='width: 690px;
    text-align: center;margin-left: 260px;'>Employee Successfully Delete <strong> Thank You!!</strong>  </div>";
            echo '<META http-equiv="refresh" content="2;view_emp.php">'; 
        
        
	}
	else{
		 $mess .="<div style='width: 690px;
    text-align: center;margin-left: 260px;' class='alert alert-danger'><strong> Sorry!!</strong> Something Wrong !!   </div>";
        echo '<META http-equiv="refresh" content="2;view_emp.php">'; 
	}
                 
    

              break;
                 
                 
         }
           
         }
  }

        
?>


<!-- role change Employee -->

<?php
         if(isset($_GET['change_to_admin'])){
               $admin_change=$_GET['change_to_admin'];
               $mess='';
           $query="Update employee_info set emp_role='admin' where emp_id= $admin_change";  
             
             $update_query=mysqli_query($conn,$query);
 
             
             if($update_query==true){
                 
              $mess .="<div style='border-radius: 10px;width: 360px;
    text-align: center;margin-left: 500px;' class='alert alert-info'> <button type='button' class='close' data-dismiss='alert'>×</button> <strong> Mr Admin</strong> </div>";
                 echo '<META http-equiv="refresh" content="1;view_emp.php">'; 
                 
		     
             }
         
         }

    if(isset($_GET['change_to_user'])){
               $user_change=$_GET['change_to_user'];
            $mess='';
           $query="Update employee_info set emp_role='user' where emp_id= $user_change";  
             
             $update_query=mysqli_query($conn,$query);
 
             
             if($update_query==true){
                 
               $mess .="<div style='border-radius: 10px;width: 360px;
    text-align: center;margin-left:500px;' class='alert alert-success' ><button type='button' class='close' data-dismiss='alert'>×</button> <strong> Mr User</strong> </div>";
                  echo '<META http-equiv="refresh" content="1;view_emp.php">';
              
             }
       
         
         
         
         }



?>

<!--   update employee model code-->


<?php


    
         if(isset($_POST['update'])){
                 $emp_id     =$_POST['emp_id'];
                 $emp_name   =$_POST['name'];
                 $emp_fname  =$_POST['fname'];
                 $emp_dob    =$_POST['dob'];
                 $emp_cnic   =$_POST['cnic'];
                 $emp_gender =$_POST['gender'];
                 $emp_contact=$_POST['contact'];
                 $emp_address=$_POST['address'];
                
                 $emp_img    =$_FILES['image']['name'];
                 $temp_img   =$_FILES['image']['tmp_name'];
             
                 $emp_email  =$_POST['email'];
                 $emp_salary =$_POST['salary'];
                 $emp_joindate=$_POST['date'];
                 $dep_name   =$_POST['dep'];
                 $des_name   =$_POST['desi'];
                 $shift_name =$_POST['shift'];
                 $emp_pass   =$_POST['pass'];     
                
                 $mess='';
                
             
             if(empty($emp_img)){
                  
                $query="select * from employee_info where emp_id= $emp_id ";
                $img_query=mysqli_query($conn,$query);
                
                while($img=mysqli_fetch_assoc($img_query)){
                    $emp_img=$img['emp_image'];
                }
            }
               
              if(!empty($emp_pass)){
                  
                $query="select emp_password from employee_info where emp_id= $emp_id ";
                $pass_query=mysqli_query($conn,$query);
                
                $row=mysqli_fetch_array($pass_query);
                    $db_emp_pass=$row['emp_password'];
                      
                  
                 if($db_emp_pass!= $emp_pass){
                   $hash_pass=password_hash($emp_pass,PASSWORD_BCRYPT,array('cost'=>12));
                 }
             
                if(strlen($emp_pass)<4){
               
                  echo "<div class='alert alert-danger'><strong>Password should be  minimum 4 characters!!<strong></div>"; 
               
                  }else{
       
             $query="update employee_info SET ";
             $query.="emp_name= '{$emp_name}' , ";
             $query.="emp_fname= '{$emp_fname}' ,";
             $query.="emp_dob= '{$emp_dob}' , ";
             $query.="emp_cnic= '{$emp_cnic}' , ";
             $query.="emp_contact= '{$emp_contact}' , ";
             $query.="emp_address= '{$emp_address}' , ";
             $query.="emp_image= '{$emp_img}' , ";
             $query.="emp_email= '{$emp_email}' , ";
             $query.="emp_salary= '{$emp_salary}' , ";
             $query.="join_date= '{$emp_joindate}' , ";
             $query.="gender= '{$emp_gender}' , ";
             $query.="dep_id= '{$dep_name}' , ";
             $query.="des_id= '{$des_name}' , ";
             $query.="shift_id= '{$shift_name}' , ";
             $query.="emp_password= '{$hash_pass}' ";
             $query.="where emp_id='$emp_id' ";
             
           
                move_uploaded_file($temp_img ,"emp_images/$emp_img");     
                  
              $update_query=mysqli_query($conn,$query);
            
                if($update_query==true){
                  
                   $mess.= "<div  class='alert alert-success' style='width: 700px;
                    text-align: center;margin-left: 260px;'> <button type='button' class='close' data-dismiss='alert'>×</button> Employee Successfully Updated !<strong>   Sir Send New password to this User in Email !!
                    <a href='send_email.php'><i>Send Email</i></a><br>!! Thank You !! </strong>  </div>";
//                      header('location:view_emp.php');
                     
//                     echo "<script>alert('Employee has Successfully Updated'<strong>Sir Send New password to this User in Email !! Thank you</strong>)</script>";
//                       "<script>window.location='view_emp.php'</script>";
//                              header('location:view_emp.php');
            } 
                }
              }
        else{
               $mess.= "<div  class='alert alert-danger' style='width: 690px;
                    text-align: center;margin-left: 260px;'>Employee has not Updated!!<strong> Try Again!!</strong>  </div>";
            
//                echo "<script>alert('Employee has not Updated')</script>";
//                       "<script>window.location='view_emp.php'</script>";
            }
                 
     
         }


   ?>









<!-- view all employess show in table form -->

<div class="container-fluid" style="margin-top:70px;">
    <!--             Page Heading -->


    <h1 class="text-center offset-3" style="box-shadow: 5px 7px 20px #6b6b6b;width: 600px;background: #e5e5e5;border-radius: 30px;height: 50px;"><strong>All Emloyee's List</strong></h1>



    <h5> <a class="btn btn-warning btn-xs" style="color:white;box-shadow:5px 5px 18px #959e97;margin-top:25px;" href="add_emp.php">Add More Employee + <i class='fa fa-user' style="color:black"></i></a></h5>





    <!-- view all employess show in table form -->

    <form action="" method="post" enctype="multipart/form-data">



        <!--              select option delete all employee -->
        <div class="col-md-10" style="margin-top:10px;">
            <span><?php if(isset($mess)){echo $mess;}?></span>
            <div class="row">

                <div id="blockoptions" style='padding:0px' ; class="col-xs-3">
                    <select class="form-control" name="block_options" id="" style="color:red">

                        <option value="delete">Click to Checked Delete All Data</option>
                    </select>

                </div>
                <div class="col-xs-4">
                    <input type='submit' class='btn btn-danger' value='Delete All'>

                </div>

            </div>

        </div>






        <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(45deg, #b9b9b9, transparent);">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>#Employee Id</th>
                    <th>Empoyee Name</th>
                    <th>Employee Image</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th colspan="2" class='text-center'>Change Role</th>
                    <th class="text-lg-center">Action</th>
                </tr>
            </thead>

            <tbody>


                <?php
                         
             $query="select employee_info.emp_id,employee_info.emp_name,employee_info.emp_image,employee_info.emp_contact,employee_info.emp_role,department_info.dep_name,designation_info.des_name from employee_info 
           LEFT join department_info on department_info.dep_id = employee_info.dep_id 
           LEFT join  designation_info on designation_info.des_id = employee_info.des_id  ";
                        
             $select_query=mysqli_query($conn,$query);
                          
                        
             
            while($row=mysqli_fetch_array($select_query)){
               $emp_id     =$row['emp_id'];
               $emp_name   =$row['emp_name'];
               $emp_image  =$row['emp_image'];
               $emp_contact=$row['emp_contact'];
               $emp_role   =$row['emp_role'];
               $dep_name   =$row['dep_name'];
               $des_name   =$row['des_name'];
                
                
                
                
            echo "<tr>";
            ?>
                <th><input class='checkbox' type='checkbox' name='checkboxArray[]' value='<?php echo $emp_id;?>'></th>
                <?php
           
            echo "<td>$emp_id</td>";
            echo "<td>$emp_name</td>";
            echo "<td><img class='img-responsive' width='70px'  src='emp_images/$emp_image' alt='image'> </td>";
            echo "<td>$dep_name</td>";
            echo "<td>$des_name</td>";
            echo "<td>$emp_contact</td>";
                
             echo"<td><b>$emp_role</b></td>";
                
             echo"<td class='text-center'> 
                 <a class='btn btn-info btn-xs'
                  href='view_emp.php?change_to_admin={$emp_id}'>Admin</a> 
                 </td>";   
            
                echo"<td class='text-center'>  
                   <a class='btn btn-success btn-xs'
                  href='view_emp.php?change_to_user={$emp_id}'>User</a>
                  </td>";
                
            echo"<td> 
               
                <a class='btn btn-outline-primary btn-xs border-right'  data-toggle='modal' data-target='#personalModal$emp_id' href='#personalModal$emp_id'><i class='fa fa-folder'></i> Personal Info</a>  
                
            
                 
                 <a href='#' class='btn btn-warning btn-xs border-right' data-toggle='modal' data-target='#editModal$emp_id' style='color:black'><i  class='fa fa-pencil'></i>    Edit</a>
               
                  <a href='#deleteModal$emp_id' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target='#deleteModal$emp_id'><i class='fa fa-trash'></i>   Delete</a>
                          
                  </td>";
            
            echo "</tr>";
            
            }
                        
            
        ?>

            </tbody>

        </table>
    </form>
</div>
</div>






</div>




<!--   Modal for Employee Personal Information-->
<?php
       include'include/personal_emp_info.php';

?>



<!--  Modal edit employee information   -->

<?php

        $query="select employee_info.emp_id,employee_info.dep_id,employee_info.des_id,employee_info.emp_name,employee_info.emp_fname,employee_info.gender,employee_info.emp_dob ,employee_info.emp_cnic,employee_info.emp_image,employee_info.emp_contact,employee_info.emp_address,employee_info.emp_password ,employee_info.emp_email,department_info.dep_name,employee_info.emp_salary,
        employee_info.emp_salary,
        employee_info.join_date,
         designation_info.des_name,shift_info.shift_name,shift_info.shift_id from employee_info
       LEFT  join department_info on department_info.dep_id = employee_info.dep_id
       LEFT  join designation_info on designation_info.des_id = employee_info.des_id
       LEFT join shift_info on shift_info.shift_id = employee_info.shift_id ";

       $join_query_result=mysqli_query($conn,$query);
    
     
          while($row=mysqli_fetch_array($join_query_result)){
                     $emp_id     =$row['emp_id'];
                     $emp_name   =$row['emp_name'];
                     $emp_fname  =$row['emp_fname'];
                     $emp_dob    =$row['emp_dob'];
                     $emp_cnic   =$row['emp_cnic'];
                     $emp_contact=$row['emp_contact'];
                     $emp_address=$row['emp_address'];
                     $emp_image  =$row['emp_image'];
                     $emp_email  =$row['emp_email'];
                     $emp_salary =$row['emp_salary'];
                     $emp_joindate=$row['join_date'];
                     $dep_id     =$row['dep_id'];
                     $des_id     =$row['des_id'];
                     $shift_id    =$row['shift_id'];
                     $dep_name   =$row['dep_name'];
                     $des_name   =$row['des_name'];
                     $shift_name =$row['shift_name'];
                     $emp_pass   =$row['emp_password'];                                        
                    

 


?>


<!--  Modal edit employee information   -->


<div class="modal fade" id="editModal<?php echo $emp_id;?>" role="dialog">
    <div class="modal-dialog modal-lg" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-content">

            <div class="modal-header" style="text-align: center;
    background: #ff4e0cc7;">
                <h3 class="modal-title" id="edit"><strong style="text-align: center;">Update Employee Information</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: black;
            font-size: 36px;">&times;</span>
                </button>

            </div>
            <div class="modal-body" style="background-color: #cecece5e;">

                <form action="" method="post" enctype="multipart/form-data" style="padding-top:20px">

                    <input type="hidden" name="emp_id" value="<?php echo $emp_id; ?>">

                    <div class="form-group row">
                        <label for="inputfullname" class="col-sm-2 col-form-label">Full Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" autofocus name="name" value="<?php  echo $emp_name;?>" id="" placeholder="Enter you name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputfathername" class="col-sm-2 col-form-label">Father Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fname" value="<?php  echo $emp_fname;?>" id="" placeholder="Your Father name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputDOB" class="col-sm-2 col-form-label">DOB:</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="dob" id="" value="<?php  echo $emp_dob;?>" placeholder="Your DOB">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputcnic" class="col-sm-2 col-form-label">CNIC:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php  echo $emp_cnic;?>" name="cnic" id="" placeholder="1234-232323-23" required>
                        </div>
                    </div>


                    <fieldset class="form-group">
                        <div class="row">
                            <label class="col-form-label col-sm-2 pt-0">Gender</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required <?php if($row['gender']=='male'){echo 'checked'; }?>>

                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">

                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" required <?php if($row['gender']=='female'){echo 'checked'; }?>>

                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="form-group row">
                        <label for="inputcnic" class="col-sm-2 col-form-label">Address:</label>
                        <div class="col-sm-10">
                            <textarea name="address" class="form-control" rows="5" required><?php  echo $emp_address; ?>
                      </textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputDOB" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <img width="100px" class='img-responsive' src="emp_images/<?php echo $emp_image;?>" alt="image">
                            <input type="file" name="image">
                        </div>
                    </div>





                    <!--   This is department  form to select department for employee -->


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="department">Department</label>
                        <div class="col-sm-10">
                            <select class="form-control" name='dep' value="" id="" required>
                                <option>--select--</option>
                                <?php 
                      $query="select * from department_info";
                    $dep_result=mysqli_query($conn,$query);

                    while($row=mysqli_fetch_assoc($dep_result)){
                    $dept_id=$row['dep_id'];
                    $dept_name=$row['dep_name'];  
                        
                        
                    if($dept_id == $dep_id){
                         echo "<option selected value='$dept_id'>{$dept_name}</option>";
                    }else{
                        
                       echo "<option value='$dept_id'>{$dept_name}</option>"; 
                    }
                        
                    }
              
         ?>



                            </select>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="designation">Designation</label>
                        <div class="col-sm-10">
                            <select class="form-control" value="" name="desi">
                                <option>--select--</option>
                                <?php 
                     $query="select * from designation_info";
                    $des_result=mysqli_query($conn,$query);

                    while($row=mysqli_fetch_array($des_result)){
                    $desi_id=$row['des_id'];
                    $desi_name=$row['des_name'];  
                        
                        
                    if($desi_id == $des_id){
                         echo "<option selected value='$desi_id'>{$desi_name}</option>";
                    }else{
                        
                       echo "<option value='$desi_id'>{$desi_name}</option>"; 
                    }
                        
                    }
                     
                   ?>



                            </select>
                        </div>
                    </div>





                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="shift">Shift</label>
                        <div class="col-sm-10">
                            <select class="form-control" value="" name="shift">
                                <option>--select--</option>
                                <?php 
                     $query="select * from shift_info ";
                    $shift_result=mysqli_query($conn,$query);

                    while($row=mysqli_fetch_assoc($shift_result)){
                    $s_id=$row['shift_id'];
                    $s_name=$row['shift_name'];  
                        
                        
                    if($s_id == $shift_id){
                         echo "<option selected value='$s_id'>$s_name</option>";
                    }else{
                        
                       echo "<option  value='$s_id'>$s_name</option>"; 
                    }
                        
                    }
                      
                   ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" value="<?php  echo $emp_contact;?>" name="contact" id="contact" placeholder="023243393" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" value="<?php  echo $emp_email;?>" name="email" id="inputEmail3" placeholder="example@gmail.com" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label">Join Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" value="<?php  echo $emp_joindate;?>" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="" value="<?php  echo $emp_salary;?>" name="salary" placeholder="Entery salary">
                        </div>
                    </div>


                    <div class="panel-footer" style='background-color:#ededed'>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-info border-bottom ">Account Information</label>
                            </div>

                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="text-dark">Password:</label>
                                    <input type="text" class="form-control" value="" name="pass" id="" placeholder="password" required >
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <input type="submit" name="update" value="update" class="btn btn-primary">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>




                </form>
            </div>
        </div>
    </div>
</div>



<?php } ?>



<!--   Modal to delete employee date-->
<?php
        $query="select employee_info.emp_id,employee_info.emp_name,employee_info.emp_fname,employee_info.gender,employee_info.emp_dob ,employee_info.emp_cnic,employee_info.emp_image,employee_info.emp_contact,employee_info.emp_address,employee_info.emp_email,department_info.dep_name,employee_info.emp_salary,
        employee_info.emp_salary,
        employee_info.join_date,
         designation_info.des_name,shift_info.shift_name from employee_info
         left join department_info on department_info.dep_id = employee_info.dep_id
         left join designation_info on designation_info.des_id = employee_info.des_id
         left join shift_info on shift_info.shift_id = employee_info.shift_id ";

       $query_result=mysqli_query($conn,$query);
    
     
          while($row=mysqli_fetch_array($query_result)){
                     $emp_id     =$row['emp_id'];
                     $emp_name   =$row['emp_name'];
                     $emp_fname  =$row['emp_fname'];
                     $emp_dob    =$row['emp_dob'];
                     $emp_cnic   =$row['emp_cnic'];
                     $emp_contact=$row['emp_contact'];
                     $emp_address=$row['emp_address'];
                      $emp_image  =$row['emp_image'];
                     $emp_email  =$row['emp_email'];
                     $emp_salary =$row['emp_salary'];
                     $emp_joindate=$row['join_date'];
                     $dep_name   =$row['dep_name'];
                     $des_name   =$row['des_name'];
                     $shift_name =$row['shift_name'];
                                                                



?>

<!-- delete Modal -->
<div class="modal fade" id="deleteModal<?php echo $emp_id?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#ff4545">
                <h4 class="modal-title" id="exampleModalLongTitle"><strong>Delete Employee Information</strong></h4>
                <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #cecece5e;">
                <h3 style="color:#ff4545;">Are You Sure to Delete?</h3>
            </div>

            <div class="modal-footer">

                <a href='include/delete_emp.php?delete=<?php echo $emp_id; ?>' class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>

            </div>

        </div>
    </div>
</div>

<?php }?>