<?php include "include/admin_header.php";?>
<?php include "include/admin_sidebar.php";?>
  
 
        <div class="container-fluid" style='margin-top:70px;'>
<!--             Page Heading -->
<div id="page-wrapper">
    <div class="row">
      <div class="container">
        <nav class="navbar navbar-light bg-dark" style="border-radius: 30px;background: linear-gradient(45deg,#dcdcdc, #ffffffed);box-shadow: 5px 7px 15px #b9b9b9f0;">
               
                <h4 style="color:black;text-align:center"><strong>Leaves Summary</strong></h4>  
             </nav>
             
             <h5> <a class="btn btn-warning btn-md" style="color:black;box-shadow:5px 5px 18px #959e97;font-size:15px;margin-bottom:15px;background:linear-gradient(45deg,orange, #ffe3c6fa);" href="leave.php"><i class='fa fa-arrow-left'>   Back To Page</i></a></h5>
  <?php
            
          if(isset($_GET['details'])){
				 $detail = $_GET['details'];
				 
				$query ="select employee_info.emp_id,employee_info.emp_name,employee_info.emp_image,
                department_info.dep_name,designation_info.des_name from employee_info 
              left  join department_info on department_info.dep_id = employee_info.dep_id 
               left  join designation_info on designation_info.des_id = employee_info.des_id 
                 where employee_info.emp_id='$detail' ";
                                    
                $query_res=mysqli_query($conn,$query);
              
	                while($row= mysqli_fetch_array($query_res)){
						
						$id = $row['emp_id'];
						$name = $row['emp_name'];
						$image = $row['emp_image'];
						$department = $row['dep_name'];
						$designation = $row['des_name'];
                    }
    ?>           
    
              
   
        <div class="row mg-top">
    <div class="col-md-2 col-sm-2 col-lg-2">
            <img class="img-thumbnail img-responsive " src="emp_images/<?php echo $image;?>"  alt="image" width="200px" height="120px" style="border-radius:25px;">
        </div>
        <div class="col-md-4 col-sm-4 col-lg-4">
          
          <table class="table table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(497deg, #676767, transparent">
  
            <tbody>
            <tr class="active">
            <th scope="row">EMPLOYEE ID :</th>
            <td><?php echo $id ;?></td>

            </tr>
            <tr>
            <th scope="row">EMPLOYEE NAME :</th>
            <td><?php echo $name; ?></td>
            </tr>
            
             <tr>
            <th scope="row">DEPARTMENT :</th>
            <td><?php echo $department ;?></td>
            </tr>
            
             <tr>
            <th scope="row">DESIGNATION :</th>
            <td><?php echo $designation ;?></td>
            </tr>

            </tbody>
</table>
            </div>

  
            
            
        </div>
              
              <?php 
                    }  
      
          ?>
               <br>
               
               
               
              
               
              
              
              <br>
                    <div class="row mg-top">
                    
 
                    <div class="col-md-8">
            <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background:linear-gradient(179deg, #945151, #38383800);">

                    
                    <thead class="thead-dark">
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date</th>
                    <th scope="col" class='text-center'>leaves status</th>

                    </tr>
                    </thead>
                    <tbody>
                    
                <?php
                     $query="select * from attendance where status='Leave' && emp_id='$detail' ";
                     $query_res=mysqli_query($conn,$query);
                      $mess='';
                    $count=mysqli_num_rows($query_res);
                    if($count==0){
                        $mess .="<div class='alert alert-danger'><strong> SORRY !!</strong> No Leave's Found  </div>";
                    }else{
                        
                    while($row=mysqli_fetch_assoc($query_res)){
                       $emp_id=$row['emp_id'];
                       $date  =$row['date'];
                       $status=$row['status'];
                          
                         
                    echo"<tr>"; 
                    echo"<td>$emp_id</td>" ;     
                    echo"<td>$date</td>" ;
                    echo"<td  class='text-center'style='color:red'><strong>$status</strong></td>";


                   echo"</tr>";   
                         
                         
                     }
                    }
                     
                        
            
                        
                        
                ?>
                  
           
               
                    </tbody>
                   
                    
                    </table>
                      <span ><?php if(isset($mess)){echo $mess;}?></span>
                    
              </div>
              
     <div class="col-lg-3 col-md-6">
        <div class="panel"  style="box-shadow:5px 10px 20px #bdbbbbf5;background:linear-gradient(45deg,orange, #ffe3c6fa);border-color: #f7ab39;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bed fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" style="font-size:25px;">
                    <?php
                        
                          $query="select * from attendance where status='Leave' && emp_id='$detail' ";
                          $le_result=mysqli_query($conn,$query);
                          $leave_count=mysqli_num_rows($le_result);
                        
                          echo"<div class='huge'>$leave_count</div>";
                        ?>

                        <div>Leaves</div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
              </div>
              
              
        </div>
      </div>
      
     </div>
</div>
      
<?php include "include/admin_footer.php";?>