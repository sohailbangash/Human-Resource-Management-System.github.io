<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>

<?php
      if(isset($_GET['edit'])){
              $employee_id=$_GET['edit'];
      }
           $query="select employee_info.emp_name,employee_info.emp_id,task_info.date,task_info.task_title,
           task_info.last_date,task_info.detail from task_info 
           left join employee_info on employee_info.emp_id = task_info.emp_id";
                        
             $select_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($select_query)){
               $emp_id     =$row['emp_id'];
               $emp_name   =$row['emp_name'];
               $task_date  =$row['date'];
               $task_title =$row['task_title'];
               $l_date   =$row['last_date'];
               $desc    =$row['detail'];
            }
      

//     update task query 



    if(isset($_POST['update'])){
        
        $name    =$_POST['employee'];
        $title   =$_POST['title'];
        $date1   =date('d-m-Y');
        $date    =date('Y-m-d',strtotime($date1));
        $ldate   =$_POST['ldate'];
        $description =$_POST['des'];	
        
       
        foreach($name as $key=>$v){
            $query="update task_info set ";  
            $query .="emp_id= $v, ";
            $query .="task_title= '{$title}' , ";
            $query .="date= now()  , "; 
            $query .="last_date= '{$ldate}' , ";           
            $query .="detail= '{$description}'  ";               
            $query .="where emp_id={$employee_id} ";  
            
              $update_query=mysqli_query($conn,$query);  
        }
  

    
        if(!$update_query){
            die('error'.mysqli_error($conn));
            
           
          
      
	 }
	if($update_query == true){
		echo "<script>alert('Task successfully Updated')</script>";
      
	}
	else{
		echo "<script>alert('Task not Updated')</script>";
	}
   
    }


?>      
    



        <div class="container-fluid" style="margin-top:50px;">
<!--             Page Heading -->
           <div id="page-wrapper">  
            <h5>
                      
             <a class="btn btn-info btn-sm" style="color:white;box-shadow:5px 5px 18px #959e97;margin-top:25px;" href="view_task.php">  View Tasks <i class="fa fa-eye" style="color:black;"></i></a>
                     
            </h5>
            
            
        
            
              <div class="col-md-10 text-center offset-1">
               <div class="panel panel-primary">
                <div class="panel-body">
                    <nav class="navbar navbar-light" style="background:linear-gradient(45deg, black, #e8c8c8c7);border-radius: 70px;box-shadow: 5px 5px 11px #afaaaa;">
                <h3 style="color:white"><strong>Update Task</strong></h3>  
             </nav>
            
                    
                
             <form action="" id="" method="post" enctype="multipart/form-data" style="padding-top:20px">
                  

             
                   <div class="form-group">

             
                <select id="framework" name="employee[]" multiple class="form-control" >
                
                 <?php
                     $query="SELECT emp_id,emp_name from employee_info where emp_role='user' ";
                     $emp_query_result=mysqli_query($conn,$query);
                      
                      while($row=mysqli_fetch_assoc($emp_query_result)){
                        $emp_id=     $row['emp_id'];
                        $emp_name=     $row['emp_name'];
                          
                        if($emp_id==$employee_id){
                          
                       echo"<option selected value='$emp_id'>$emp_name</option>";
                        }else{
                             echo"<option  value='$emp_id'>$emp_name</option>";
                        }
                        
                        }
                      
                   ?>
                </select>
                </div>
                
               
                    
                   <div class="form-group row">
                    <label for="inputfullname" class="col-sm-2 col-form-label" style="text-align: -webkit-right;">Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name='title' id="" placeholder="Enter you name" value='<?php echo $task_title;?>' autofocus>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="inputDOB" class="col-sm-2 col-form-label" style="text-align: -webkit-right;">Last Date</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" value='<?php echo $l_date;?>' name='ldate' id="">
                    </div>
                 </div>
                   
                     <div class="form-group row">
                    <label for="inputdescription :" class="col-sm-2 col-form-label" style="text-align: -webkit-right;">Description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control tinymce" name="des" id="" cols="30" rows="20"  required >
                          <?php echo $desc;?>
                      </textarea>
                    </div>
                                         

                     </div>
                        
                        <input type="submit" name="update" class="btn btn-info  btn-lg" value="Update Task"> 
                       
                        
              
                    </form>  
                
                </div>
                
                  </div>
            
       </div>
     
 
       
                
                     
                          
                               
                                                                       
     
    <!-- this multi selection script-->


<script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: 'Select Emloyee',
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