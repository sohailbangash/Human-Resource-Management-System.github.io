<?php include('include/admin_header.php');?>
<?php include('include/admin_sidebar.php');?>

<?php
     if(isset($_POST['submit'])){
            $emp_name  = $_POST['name'];
            $emp_fname = $_POST['fname'];
            $emp_dob   = $_POST['dob'];
            $emp_cnic  = $_POST['cnic'];
            $emp_gender= $_POST['gender'];
            $emp_address=$_POST['address'];
         
            $emp_image= $_FILES['image']['name'];
            $temp_image= $_FILES['image']['tmp_name'];
         
             $dep=    $_POST['dep'];
            $desi=     $_POST['desi'];
            $shift=    $_POST['shift'];
            $contact=   $_POST['contact'];
            $email=     $_POST['email'];
            $join_date=   $_POST['date'];
            $salary=     $_POST['salary'];
            $pass=    $_POST['pass'];
         
              $message="";  
//          $emp_image =uniqid() .$emp_image;
         
         
        $password=password_hash($pass,PASSWORD_BCRYPT,array('cost'=>12));
         
          $select_query="select * from employee_info where emp_email='$email' ";
        $query_res=mysqli_query($conn,$select_query);
                       
         
        $count=mysqli_num_rows($query_res);
                                                   
        if($count==1){
        $message .= "<div class='alert alert-danger'>Email is already registered Try another  one!!</div>"; 
               echo '<META http-equiv="refresh" content="2;add_emp.php">';
        

        
        }
         else if(strlen($pass)<4){
               $message .= "<div class='alert alert-danger'><strong>Password should be  minimum 4 characters!!<strong></div>"; 
                 echo '<META http-equiv="refresh" content="2;add_emp.php">';
               
             
          }
        
         else{
             
             $query="INSERT INTO employee_info(dep_id, des_id, shift_id, emp_name, emp_fname, emp_dob, emp_cnic, gender, emp_address, emp_image, emp_contact, emp_email, emp_password, emp_role,emp_salary,join_date)"; 
    
          
    $query.="VALUES ('$dep','$desi','$shift','$emp_name','$emp_fname','$emp_dob','$emp_cnic','$emp_gender','$emp_address','$emp_image','$contact','$email','$password','user','$salary','$join_date')";
         
           move_uploaded_file($temp_image, "emp_images/$emp_image");
         
    $insert_query=mysqli_query($conn,$query);
         
       
         
    if($insert_query){
        
     	$message .="<div style='border-radius: 10px;' class='alert alert-success'> <strong>Thank You  !!</strong> Data Successfully Done !! </div>";
        
            echo '<META http-equiv="refresh" content="2;add_emp.php">';
	}
	else{
	$message .="<div style='border-radius: 10px;' class='alert alert-danger'> <strong>Sorry  !!</strong> Try Again !! </div>";
           echo '<META http-equiv="refresh" content="2;add_emp.php">';
	}
      
             
             
         }

             
        
   
         
         
    
     
     
     }




?> 


    <div id="page-wrapper">
        <div class="container-fluid well bg-gray" style="margin-top:40px;">
<!--             Page Heading -->
            <span><?php if(isset($message)){echo $message;}?></span>
            <div class="row" id="" >
                 <h5><a class="btn btn-info btn-xs" href="view_emp.php" style="color:white;box-shadow:5px 5px 18px #959e97">View Employee list  <i class=" fa fa-eye" style="color:black;"></i></a> </h5>
                 
                <div class="col-sm-12 col-md-12  col-xl-12" id="content">
                  <div class="row">
                        <div class="col-sm-6 col-md-6  col-xl-6">
                        
                        

         
          <!--   This is employee add form to add employee -->
                      
                      
                       <h3 class="text-center" style="border-radius:20px;background-color:#47c7a4; padding:10px;box-shadow:5px 5px 18px #55b5a8">Employee's Information</h3>
                       
                       

                    <form action="" method="post" enctype="multipart/form-data" style="padding-top:20px">

                    <div class="form-group row">
                    <label for="inputfullname" class="col-sm-2 col-form-label">Full Name:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="" placeholder="Enter you name" required>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="inputfathername" class="col-sm-2 col-form-label">Father Name:</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="fname" id="" placeholder="Your Father name" required>
                    </div>
                    </div>

                     <div class="form-group row">
                    <label for="inputDOB" class="col-sm-2 col-form-label">DOB:</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="dob" id="" placeholder="Your DOB">
                    </div>
                    </div>

                      <div class="form-group row">
                    <label for="inputcnic" class="col-sm-2 col-form-label">CNIC:</label>
                    <div class="col-sm-10" >
                      <input type="text" class="form-control" name="cnic" id="" placeholder="1234-232323-23" required>
                    </div>
                    </div>


                    <fieldset class="form-group">
                    <div class="row">
                      <label class="col-form-label col-sm-2 pt-0">Gender</label>
                      <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required>
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" required>
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                  </div>
                    </div>
                    </fieldset>

                      <div class="form-group row">
                    <label for="inputcnic" class="col-sm-2 col-form-label">Address:</label>
                    <div class="col-sm-10">
                      <textarea name="address" id="" class="form-control"  rows="5"></textarea>
                    </div>
                    </div>

                     <div class="form-group row">
                    <label for="inputDOB" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" name="image" required>
                    </div>
                    </div>

                
                   </div>


                <!--   This is department  form to select department for employee -->

                     <div class="col-sm-6 col-md-6  col-xl-6 border-left">
                      <h3 class="text-center" style="border-radius:20px;background-color:#87b5a8; padding:10px;box-shadow:5px 5px 18px #55b5a8">Department Information</h3>
                     

                 <div class="form-group row">
                 <label class="col-sm-2 col-form-label" for="department">Department</label>
                 <div class="col-sm-10">
                  <select class="form-control" name='dep' id="" required>
                  <option selected>- -select- -</option>
                 <?php
                     $dep_query="SELECT dep_id, dep_name FROM department_info";
                     $dep_query_result=mysqli_query($conn,$dep_query);
                      
                      while($row=mysqli_fetch_assoc($dep_query_result)){
                        $dep_id=     $row['dep_id'];
                        $dep_name=     $row['dep_name'];
                          
                       echo"<option value='$dep_id'>$dep_name</option>";
                      }
                      
                   ?>
                 
                  </select>
                 </div>
                 </div>

                 <div class="form-group row">
                 <label class="col-sm-2 col-form-label" for="designation">Designation</label>
                 <div class="col-sm-10">
                  <select class="form-control" name="desi">
                  <option selected>- -select- -</option>
                   <?php
                     $desi_query="SELECT des_id, des_name FROM designation_info";
                     $desi_query_result=mysqli_query($conn,$desi_query);
                      
                      while($row=mysqli_fetch_assoc($desi_query_result)){
                        $desi_id=     $row['des_id'];
                        $desi_name=     $row['des_name'];
                          
                       echo"<option value='$desi_id'>$desi_name</option>";
                      }
                      
                   ?>
                  </select>
                 </div>
                 </div>


                 <div class="form-group row">
                 <label class="col-sm-2 col-form-label" for="shift">Shift</label>
                 <div class="col-sm-10">
                  <select class="form-control" name="shift">
                  <option selected>- -select- -</option>
                 <?php
                     $shift_query="SELECT shift_id, shift_name FROM shift_info";
                     $shift_query_result=mysqli_query($conn,$shift_query);
                      
                      while($row=mysqli_fetch_assoc($shift_query_result)){
                        $shift_id=     $row['shift_id'];
                        $shift_name=     $row['shift_name'];
                          
                       echo"<option value='$shift_id'>$shift_name</option>";
                      }
                      
                   ?>
                  </select>
                 </div>
                 </div>

                 <div class="form-group row">
                 <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                 <div class="col-sm-10">
                 <input type="number" class="form-control" name="contact" id="contact" placeholder="023243393">
                 </div>
                 </div>

                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                    <input type="email" class="form-control"  name="email" id="inputEmail3" placeholder="example@gmail.com" required>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="date" class="col-sm-2 col-form-label">Join Date</label>
                    <div class="col-sm-10">
                    <input format="d/m/yy" type="date" name="date" class="form-control" required>
                    </div>
                    </div>


                    <div class="form-group row">
                    <label for="salary" class="col-sm-2 col-form-label">Salary</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="salary" placeholder="Entery salary">
                    </div>
                    </div>
                    
                    
                          <div class="panel-footer">
                      <div class="col-md-12">
                         <div class="form-group">
                        <label class="text-info border-bottom ">Account Information</label>
                      </div>

                     <div class="col-md-8">
                       <div class="form-group row">
                           <label class="text-dark">Password:</label>
                           <input type="password" class="form-control" name="pass" id="" placeholder="password" required>
                     </div>
                         <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>

                      </div>

                    </div>

                    </form>



              
               </div>


                    </div>

              
<!--             /.row -->
        </div>

         </div>

<!--         /.container-fluid -->
    </div>
<!--     /#page-wrapper -->

</div>
