<?php include "include/user_header.php";?>
 
  
<!--   show employee_image and Name-->
  <?php

           $emp_id   =$_SESSION['emp_id'];
           $emp_role= $_SESSION['emp_role'];
           $emp_email= $_SESSION['emp_email'];

     $query="Select * from employee_info where emp_id='$emp_id' && emp_email = '$emp_email' && emp_role='$emp_role' ";
        $query_result=mysqli_query($conn,$query);

          $row=mysqli_fetch_array($query_result);
                $emp_image=$row['emp_image'];
              
?>
   
   <div id="page-wrapper">
        <div class="container-fluid">
<!--             Page Heading -->
            <div class="row mg-top"  id="main"  >
                <div class="col-sm-12 col-md-12  col-xl-12 " style="box-shadow:5px 5px 18px #74899acc" id="content">
                    <h1 class="text-center"  style="box-shadow:5px 5px 18px #3e4042cc;    background: linear-gradient(45deg, #4c4c4cc4, transparent);border-radius:60px;">
                    Welcome  <?php  echo $_SESSION['emp_name'];?> </h1>
                </div>
            </div>
            


      <div class="row mg-top">
        <div class="col-md-2 col-sm-2 col-lg-2" >
            <img src="../admin/emp_images/<?php echo $emp_image ?>" alt="pic" class="img-thumbnail" style="box-shadow: 5px 5px 20px #6d6d6d;">
        </div>
        
            <?php
          $query="select employee_info.emp_id,employee_info.dep_id,employee_info.des_id,employee_info.emp_name,employee_info.emp_fname,employee_info.gender,employee_info.emp_dob ,employee_info.emp_cnic,employee_info.emp_image,employee_info.emp_contact,employee_info.emp_address,employee_info.emp_password ,employee_info.emp_email,department_info.dep_name,employee_info.emp_salary,
        employee_info.emp_salary,
        employee_info.join_date,
         designation_info.des_name,shift_info.shift_name,shift_info.shift_id from employee_info
       LEFT  join department_info on department_info.dep_id = employee_info.dep_id
       LEFT  join designation_info on designation_info.des_id = employee_info.des_id
       LEFT join shift_info on shift_info.shift_id = employee_info.shift_id  where employee_info. emp_id='$emp_id' AND emp_role='$emp_role' ";

       $join_query_result=mysqli_query($conn,$query);
    
     
          while($row=mysqli_fetch_array($join_query_result)){
                     $emp_id     =$row['emp_id'];
                     $emp_name   =$row['emp_name'];
                     $emp_fname  =$row['emp_fname'];
                     $emp_dob    =$row['emp_dob'];
                     $emp_cnic   =$row['emp_cnic'];
                     $emp_contact=$row['emp_contact'];
                     $emp_address=$row['emp_address'];
                     $emp_gender  =$row['gender'];
                     $emp_image  =$row['emp_image'];
                     $emp_email  =$row['emp_email'];
                     $emp_salary =$row['emp_salary'];
                     $emp_joindate=$row['join_date'];
                     $dep_id     =$row['dep_id'];
                     $des_id     =$row['des_id'];
                     $shift_id     =$row['shift_id'];
                     $dep_name   =$row['dep_name'];
                     $des_name   =$row['des_name'];
                     $shift_name =$row['shift_name'];
                     $emp_pass   =$row['emp_password'];                                        
                    
?>
            
        
        <div class="col-md-4 col-sm-4 col-lg-4">
            <table class="table table-striped table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(497deg, #676767, transparent">
            
           
               
  <thead >
    <tr style="color:mediumblue" >
      <th scope="col-span='2'">PERSONAL INFORMATION</th>
     
    </tr>
  </thead>
  <tbody>
  
                
    <tr>
      <th scope="row"> YOUR ID</th>
      <td><b><?php echo $emp_id;?></b></td>
    </tr>
    <tr>
      <th scope="row">YOUR NAME:</th>
      <td><b><?php echo $emp_name;?></b></td>
    </tr>
    <tr>
      <th scope="row">YOUR FATHER NAME:</th>
      <td><b><?php echo $emp_fname;?></b></td>
    </tr> <tr>
      <th scope="row">GENDER:</th>
      <td><b><?php echo $emp_gender;?></b></td>
    </tr>
     <tr>
      <th scope="row">DATE OF BIRTH:</th>
      <td><b><?php echo $emp_dob;?></b></td>
    </tr>
     <tr>
      <th scope="row">ADDRESS:</th>
      <td><b><?php echo $emp_address;?></b></td>
    </tr>
  </tbody>
</table>
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
              <table class="table table-striped  table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(497deg, #676767, transparent">
  <thead>
    <tr style="color:mediumblue">
      <th scope="col-span='2'">DEPARTMENT INFORMATION</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Department Name :</th>
      <td><b><?php echo $dep_name;?></b></td>
       </tr>
    <tr>
      <th scope="row">Desination Name :</th>
      <td><b><?php echo $des_name;?></b></td>
    </tr>
    <tr>
      <th scope="row">Join Date :</th>
      <td><b><?php echo $emp_joindate;?></b></td>
    </tr> 
     <tr>
      <th scope="row">Email :</th>
      <td><b><?php echo $emp_email;?></b></td>
    </tr>
     <tr>
      <th scope="row">SHIFT :</th>
      <td><b><?php echo $shift_name;?></b></td>
    </tr>
     <tr>
      <th scope="row">Contact ::</th>
      <td><b><?php echo $emp_contact;?></b></td>
    </tr>
  </tbody>
</table>
  <?php }?>      
        </div>
        </div>
        
 </div>
</div>
     
<?php include "include/user_footer.php";?>