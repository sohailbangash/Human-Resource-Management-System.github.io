<?php include "include/admin_header.php";?>
    <?php include "include/admin_sidebar.php";?>
    
   <?php
           if(isset($_POST['add'])){
                  $message=''; 
               if(empty($_POST['attendence'])){
                   
                 $message.= "<div class='alert alert-danger offset-3' style='margin-   top:300px;width:500px;'>
                        <strong style='font-size: 21px;'> SORRY !!</strong><b> Empty Attendance Not Allowed ! Please Take Attendence !! Thank You</b>
                       </div>";
                    echo '<META http-equiv="refresh" content="2;add_attendence.php">';
//                   
//                  echo"<script>window.location='add_attendence.php'</script>";
               } else{
                    
               $att=$_POST['attendence'];
//                $date=date('d-m-y');
               
             
          
                   
                 foreach($att as $key =>$value){
                     
                    if($value=="Present"){
                        $p_query="insert into attendance(status,emp_id,date) 
                                Values('Present',$key,now())";
                        $query_result=mysqli_query($conn,$p_query);
                    
                    }
                     elseif($value=="Leave"){
                        $p_query="insert into attendance(status,emp_id,date) 
                                Values('Leave',$key,now())";
                        $query_result=mysqli_query($conn,$p_query);
                             
                    }
                     else{
                         $query="insert into attendance(status,emp_id,date) 
                                Values('Absent',$key,now())";
                        $query_result=mysqli_query($conn,$query);
                    }
                 
                 }
                 if($query_result==true){
                     $message.="<div class='alert alert-success offset-3' style='width:500px';>
                     
                       <b> Attendence Successfully done!!  </b>
                        <strong> <a href='view_attendence.php'>  View Attendance  </a></strong>
                     
                        </div>";
                      echo '<META http-equiv="refresh" content="2;add_attendence.php">';
                
                 }else{
                     $message.="<div class='alert alert-danger'>
                     
                       <b> Some Problem!!</b>
                     
                        </div>";
                 }
             
               }
        }


    ?>           
      
    
      <!--     employee take out from attendance code       -->
        <?php

         if(isset($_GET['out_id'])){
              $emp_id= $_GET['out_id'];
              $message='';
                $in_query="insert into attendance_out(emp_id,date,time_out) Values('$emp_id',now(),NOW() )";
                $out_result=mysqli_query($conn,$in_query);   
             
               if($out_result==true){
            $message .="<div style='border-radius: 10px;width: 360px;
    text-align: center;margin-left:500px;' class='alert alert-success' ><button type='button' class='close' data-dismiss='alert'>×</button> <strong>Employee Time Out</strong> </div>";
                  echo '<META http-equiv="refresh" content="2;add_attendence.php">';
                   
                
               }
  } 
         
         
        ?> 
          
         

     

               
        <div class="container-fluid" style="margin-top:65px;">
               <div id="page-wrapper">            
<!--             Page Heading -->
            <div class="" id="main" >
              <nav class="navbar navbar-light " style="margin-top:25px;box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(497deg, #676767, transparent">
                <h3 style="color:black"><strong>Attendance Information And Mark Attendance</strong></h3>  
             </nav>
            </div>
            </div>  
           
		   <span><?php if(isset($message)){echo $message;}?></span>
        
        
     <!--      Table for show data and also take online attandace            -->   
     
                
         <form action="" method="post" enctype="multipart/form-data">
                 
           <div class="form-group">
           <input type="submit" class="btn btn-success" style="box-shadow: 5px 5px 18px #959e97;" name="add" value="Take Attendence" > 
           
               <a href='view_attendence.php'  class="btn btn-warning" style="box-shadow: 5px 5px 18px #959e97; float:right;color:black" name="" value="" ><i class="fa fa-eye" ></i> View Attendence</a>   
            </div>
                  
                  <div class="">
              <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(497deg, #676767, transparent">
                    <thead class="thead-dark">
                    <tr>
                    <th class='text-center'>#Employee Id</th>
                    <th class='text-center'>Empoyee Name</th>
                     <th class='text-center'>Father Name</th>
                    <th class='text-center'>Action</th>
                    <th class='text-center'>Time out</th>
                    </tr>
                    </thead>
                    
                    <tbody class="text-center" style="color:white;font-weight:bold">
               <?php  
                        
                $query ="select * from employee_info where emp_role = 'user' ";
                 $select_query=mysqli_query($conn,$query);   
                while($row = mysqli_fetch_assoc($select_query)){
                         
                       ?>
								
                 <tr>
                      <td> <?php echo $row['emp_id']; ?></td>
                      
                      <td><?php echo $row['emp_name'];?></td>

                      <td><?php echo $row['emp_fname'];?></td>
                      

                       
                        <td class="text-center"> 
                         <div class="form-check form-check-inline">
                         
                           <input class="form-check-input" type="radio" name="attendence[<?php echo $row['emp_id'];?>]" id="inlineRadio1" value="Present">
                         
                           <label class="form-check-label" for="inlineRadio1" style="color:green">Present</label>
                         </div>
                         
                         
                      
                    <div class="form-check form-check-inline"> 
        
                        <input class="form-check-input" type="radio" name="attendence[<?php echo $row['emp_id'];?>]" id="inlineRadio2" value="Absent"> 
                       
                         <label class="form-check-label" for="inlineRadio2" style="color:red">Absent</label>
                     </div>
                        
                    <div class="form-check form-check-inline"> 
                       
                        <input class="form-check-input" type="radio" name="attendence[<?php echo $row['emp_id'];?>]" id="inlineRadio3" value="Leave"> 
                       
                     <label class="form-check-label" for="inlineRadio2" style="color:black">Leave</label>
                    
                     </div>

                    </td>
         
           <td>											   
          <a href='add_attendence.php?out_id=<?php echo $row['emp_id'];?>'class="btn btn-outline-danger ">out</a> 
           </td>
											  
      </tr>
  
     
     <?php } ?>
            
                    </tbody>
                    
                
                      </table>
                  
                      </div>
               </form>
               
  
      </div>
      
     
      
      
   
<?php include ('include/admin_footer.php');?>
