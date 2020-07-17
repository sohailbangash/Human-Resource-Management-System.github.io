
<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>
 
 <!--//     select  all checkboxes function-->
<?php
     
    if(isset($_POST['checkboxArray'])){
       foreach($_POST['checkboxArray'] as $checkbox){
         $block_options=$_POST['block_options'];
          $mess='';
         switch($block_options){
                         
            case 'delete':
            $query="delete from task_info  where task_id={$checkbox} "; 
             $delete_result=mysqli_query($conn,$query);
                 
             if($delete_result == true){
        
          $mess .="<div  class='alert alert-success' style='width: 690px;
    text-align: center;margin-left: 260px;'>Task Successfully Delete <strong> Thank You!!</strong>  </div>";
            echo '<META http-equiv="refresh" content="2;view_task.php">'; 
        
        
	}
	else{
		 $mess .="<div style='width: 690px;
    text-align: center;margin-left: 260px;' class='alert alert-danger'><strong> Sorry!!</strong> Something Wrong !!   </div>";
        echo '<META http-equiv="refresh" content="2;view_task.php">'; 
	}
                 
    

              break;
                 
                 
         }
           
         }
  }


?>
 
 
 

 <!-- view all employess show in table form -->

        <div class="container-fluid" style="margin-top:60px;">
<!--             Page Heading -->
         <div id="page-wrapper">
                 <div class="col-sm-12 col-md-12  col-xl-12">
                <h1 class="text-center" style="color:navy;box-shadow: 5px 0px 18px #888888; background: #739fb1;border-radius: 30px;"><strong>All Task's</strong></h1>
             </div>
            </div>
            
            <h5>
                      <a class="btn btn-warning btn-sm" style="color:black;box-shadow:5px 5px 18px #959e97;margin-top:15px;" href="add_task.php"><strong>Add New Task +</strong> <i class="fa fa-pencil" style="color:black;"></i> </a>
                     
            </h5>
            
   <!-- view all employess show in table form -->      
                  
                  <span ><?php if(isset($mess)){echo $mess;}?></span>
              <form action="" method="Post" enctype="multipart/form-data">
              
            <div id="blockoptions" style='padding:0px;' class="col-xs-3"> 
            <select class="form-control" name="block_options" style='color:red;' id=""> 
               
                 <option value="delete">Click to Checked Delete All Data</option>     
             </select> 
               
                </div>  
                <div class="col-xs-4">
                <input type='submit' class='btn btn-danger' value='Delete All'>        
                </div>  
         
                 
                  <div class="panel">
               <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(179deg, #34c7ff8a, #38383800);">
                    <thead style="background: linear-gradient(45deg, #212020, #1b0f0f3d);
    color: aliceblue;">
                    <tr>
                    <th></th>
                    <th>#Emp Id</th>
                    <th>Employeee Name</th>
                    <th>Date</th>
                    <th>Title</th>
                    <th>Last Date</th>
                    
                    <th style="text-align:center">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    
                        
             $query="select * from task_info left join employee_info on employee_info.emp_id = task_info.emp_id ";
                        
             $select_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($select_query)){
               $task_id    =$row['task_id']; 
               $emp_id     =$row['emp_id'];
               $emp_name   =$row['emp_name'];
               $task_date  =$row['date'];
               $task_title =$row['task_title'];
               $l_date   =$row['last_date'];
               
                
                
                
            echo "<tr>";
            ?>
            <td><input  class='checkbox' type='checkbox' name='checkboxArray[]' value='<?php echo $task_id;?>'></td>
            <?php
            echo "<td>$emp_id</td>";
            echo "<td>$emp_name</td>";
            echo "<td>$task_date</td>";
            echo "<td>$task_title</td>";
            echo "<td>$l_date</td>";
           
                
            echo"<td class='text-center'> 
            
                  <a href='#viewModal$task_id' class='btn btn-outline-primary btn-sm border-right'   data-toggle='modal'><i class='fa fa-folder-open'></i>  View task</a> 
                 
               
                
                
                 
                 <a href='edit_task.php?edit=$emp_id' class='btn btn-outline-warning btn-sm border-right' data-toggle='modal' data-target=''><i class='fa fa-pencil'></i> Edit Task</a>
               
                  <a href='#deleteModal?delete=$task_id' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target='#deleteModal$task_id'><i class='fa fa-trash'></i>  Delete</a>
                          
                  </td>";
            
            echo "</tr>";
            
            }
                        
            
        ?>
            
                    </tbody>
                    </table>
                  
                      </div>
               </form>
   
            
            

            
   
</div>

 <!--   Modal for view task-->


<?php
         $query="select * from task_info left join employee_info on employee_info.emp_id = task_info.emp_id ";

       $query_result=mysqli_query($conn,$query);
    
     
          while($row=mysqli_fetch_array($query_result)){
                        $task_id   =$row['task_id'];
                        $emp_id     =$row['emp_id'];
                        $emp_name   =$row['emp_name'];
                        $task_date  =$row['date'];
                        $task_title =$row['task_title'];
                        $l_date   =$row['last_date']; 
                        $task_details=$row['detail']



?>

<div class="modal fade" id="viewModal<?php echo  $task_id; ?>"  role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#ff2f006b;box-shadow: 0px 6px 5px #191818;">
          <h3 class="modal-title" id="exampleModalLongTitle"><strong>View Task</strong></h3>
        <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background:#f1f4ffb8">
           <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12">
                     
                      <?php echo "<h3><b>Title :</b></h3>" .$task_title."<p class='text-right'><strong>Date</strong> :".$task_date."</p>";?>
                     <hr>
                      <label for="" ><h3><strong>Description:</strong></h3></label>
                      <textarea  class="form-control" cols="30" rows="10" readonly><?php echo $task_details;?></textarea>
					
                </div>

        </div>
      </div>
      <div class="modal-footer"  style="background:#ff2f006b">
        <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>    
              
              
              
              
              
  <?php    }?>
  



<!-- delete Modal -->


<?php
         $query="select * from task_info left join employee_info on employee_info.emp_id = task_info.emp_id ";

       $query_result=mysqli_query($conn,$query);
    
     
          while($row=mysqli_fetch_array($query_result)){
                        $task_id   =$row['task_id'];
                        $emp_id     =$row['emp_id'];
                        $emp_name   =$row['emp_name'];
                        $task_date  =$row['date'];
                        $task_title =$row['task_title'];
                        $l_date   =$row['last_date'];                



?>
<div class="modal fade" id="deleteModal<?php echo $task_id?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#ff4545">
        <h4 class="modal-title" id="exampleModalLongTitle"><strong>Delete Assign Employee</strong></h4>
        <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  style="background-color: #cecece5e;">
          <h3 style="color:#ff4545;" >Are You Sure to Delete?</h3>
      </div>
    
      <div class="modal-footer">
              
          <a href='./include/delete_task.php?delete=<?php echo $task_id; ?>' class="btn btn-danger">Delete</a> 
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">NO</button>
       
      </div>
     
    </div>
  </div>
</div>



<?php } ?>