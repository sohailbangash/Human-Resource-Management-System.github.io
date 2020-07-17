<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>

<?php
  
         if(isset($_POST['add'])){
        
  
        $name    =$_POST['employee'];
        $title   =$_POST['title'];
        $date1   =date('d-m-Y');
        $date    =date('Y-m-d',strtotime($date1));
        $ldate   =$_POST['ldate'];
        $description =$_POST['des'];
        $mess='';
             
   
          $query="select emp_email from employee_info where emp_role='user' "; 
           $query_result=mysqli_query($conn,$query);
             $row=mysqli_fetch_array($query_result);
             $emp_email=$row['emp_email']; 
           
        
    for($i = 0; $i < count($name) ;$i++){
        
        $query="INSERT INTO task_info(emp_id,task_title,date,last_date,detail)"; 
        $query.="VALUES('$name[$i]','$title','$date','$ldate','$description')";
         
        $task_res=mysqli_query($conn,$query);
  
          
	 }
	if($task_res == true){
        
          $mess .="<div style='border-radius: 10px;' class='alert alert-success'> Task Successfully Done !! <strong>Thank You!!</strong>  </div>";
         echo '<META http-equiv="refresh" content="2;add_task.php">';
        
        
	}
	else{
		 $mess .="<div style='border-radius: 10px;' class='alert alert-danger'><strong>Thank You!!</strong> Something Wrong !!   </div>";
        echo '<META http-equiv="refresh" content="2;add_task.php">';
	}
    

         }

?> 

    
   


        <div class="container-fluid" style="margin-top:70px;">
<!--             Page Heading -->
           <div id="page-wrapper">
            <div class="row" id="main">
               
                <div class="col-sm-12 col-md-12  col-xl-12 bg-dark" style="box-shadow:5px 5px 18px #888888; height:80px;background:linear-gradient(0deg, #f1f1f1, #4e4d4d3b);border-radius:30px"  id="content">
                   
                    <h2 class="text-center" style="color:white;box-shadow:5px 0px 18px #888888">  <strong>Enter New Task's</strong></h2>
                </div>
            </div>
            
            <h5>
                      
            <a class="btn btn-info btn-sm" style="color:white;box-shadow:5px 5px 18px #959e97;margin-top:25px;" href="view_task.php">  View Tasks <i class="fa fa-eye" style="color:black;"></i></a>
                     
            </h5>
            
            
            
            
            
        
            
              <div class="col-md-10 text-center well offset-1">
               <div class="panel">
                <div class="panel-body"style="background:linear-gradient(180deg, #f1f1f1, #4e4d4d3b);">
                    
                
             <form action="" id="" method="post" enctype="multipart/form-data" style="padding-top:20px">
                  
               <span><?php if(isset($mess)){echo $mess;}?></span>
             
                   <div class="form-group">

                <select id="framework" name="employee[]" multiple class="form-control" >
                
                 <?php
                     $query="SELECT * from employee_info where emp_role='user' ";
                     $emp_query_result=mysqli_query($conn,$query);
                      
                      while($row=mysqli_fetch_assoc($emp_query_result)){
                        $emp_id=     $row['emp_id'];
                        $emp_name=     $row['emp_name'];
                         $emp_email=     $row['emp_email'];
                          
                       echo"<option  value='$emp_id'>$emp_name</option>";
                       
                     
                      }
                   ?>
                </select>
                </div>
                
                
            
                
               
                    
                   <div class="form-group row">
                    <label for="inputfullname" class="col-sm-2 col-form-label" style="text-align: -webkit-right;">Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name='title' id="" placeholder="Enter you name" required autofocus>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="inputDOB" class="col-sm-2 col-form-label" style="text-align: -webkit-right;">Last Date</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" required name='ldate' id="">
                    </div>
                 </div>
                   
                     <div class="form-group row">
                    <label for="inputdescription :" class="col-sm-2 col-form-label" style="text-align: -webkit-right;">Description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control tinymce" name="des" id="" cols="30" rows="20"  required>
                         
                      </textarea>
                    </div>
                                         

                     </div>
                        
                        <input type="submit" name="add" class="btn btn-success  btn-md" value="Add Task"> 
                       
                        
              
                    </form>  
                
                </div>
                
                  </div>
            
       </div>
     
 
       
                
                     
                          
                               
                                                                       
     
    <!-- this multi selection script-->


<script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: '--Select Emloyees--',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'300px'
 });
 
 $('#framework_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#framework option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#framework').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>


     
