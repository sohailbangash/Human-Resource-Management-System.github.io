<?php include "include/admin_header.php";?>
    <?php include "include/admin_sidebar.php";?>
    
    
<?php
        if(isset($_POST['submit'])){
          $dep=  $_POST['department'];
          $mess=""; 
        $query=mysqli_query($conn,"select * from department_info where dep_name='$dep' ");
            
            if(mysqli_num_rows($query)==1){
                
                 $mess .="<div  class='alert alert-danger'> This  Department Name is Already Register!! <strong>Try Anthor One!!</strong> </div>";
                   echo '<META http-equiv="refresh" content="2;department.php">';
                
                
            }
            else{
              $query="insert into department_info (dep_name) Values('$dep') ";
              $dep_query=mysqli_query($conn,$query);
            
            if($dep_query== true){
                
                 $mess .="<div  class='alert alert-info'><strong>  Department is Sucessfully Register !!</strong> </div>";
                  echo '<META http-equiv="refresh" content="2;department.php">';
                
            }else{
                  echo "<script>alert('Try Again')</script>";
            }
        }
        
       
        
        
        }             


?>

  
        <div class="container-fluid" style="margin-top:70px;">
        <div id="page-wrapper">
<!--             Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12  col-xl-12 bg-dark" style="color:white;box-shadow:5px 5px 18px #888888;height:80px;border-radius: 50px;
    background: linear-gradient(180deg, #c1c1c1, #191919ad);"  id="content">
                   
                    <h2 class="text-center" style="color:white;box-shadow:5px 0px 18px #888888">Department Information</h2>
                </div>
          
               
<!--            form to add department -->
               
              
                <div class="container">
                <div class="panel panel-primary" style="margin-top:25px;">
            
               
            <form action="" method="post">
             
              <nav class="navbar navbar-light" style="background: linear-gradient(45deg, black, transparent);">
                <h4 style="color:white">Add department</h4>  
             </nav>
             <div class="panel-body">
            <span><?php if(isset($mess)){echo $mess;}?></span>
            <div class="form-group">
            <label for="dep">DEPARTMENT NAME</label>
            <input type="text" id="" name="department" class="form-control"   placeholder="Enter department.." required autofocus>
            </div>
            <input type="submit" name="submit"  value="Add Department" class="btn btn-info">
              
        </div>
              </form>
        </div>
       
       
        
        
<!--         all department infomation show in this table-->

                    <form action="" method="" enctype="multipart/form-data">
                  <div class="panel panel-primary">
                 <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                    <tr>
                    <th>DEPARTMENT ID</th>
                    <th>DEPARTMENT NAME</th>
                    <th style="text-align:center">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                             $query="select * from department_info";
                             $select_result=mysqli_query($conn,$query);
                        
                           while($row=mysqli_fetch_assoc($select_result)){
                               $dep_id=$row['dep_id'];
                               $dep_name=$row['dep_name'];
                                  
                           
                        

                            echo"<tr>";  
                            echo"<td>$dep_id</td>";
                            echo"<td>$dep_name</td>";

                    echo"<td style='text-align:center'>
                            <a href='#edit' data-toggle='modal' data-target='#editModal$dep_id' class='btn btn-primary btn-xs'><i class='fa fa-pencil'></i> Edit </a> 

                            <a href='#delete$dep_id' data-toggle='modal' data-target='#deleteModal$dep_id' class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete </a>

                            </td>";
                            echo"</tr>";
                        
                   }     
                        
                        ?>
               
                   
                
                    </tbody>
                    </table>
                  
                      </div>
               </form>
   
               
           
           
                    </div>
                    
              </div>
            </div>
      </div>  
 
      
<!-- Edit Department  Modal -->
   <?php
        		$editquery = mysqli_query($conn,"select * from department_info");
                while($row = mysqli_fetch_array($editquery)){
                    $dept_id = $row['dep_id'];
                    $dept_name=$row['dep_name'];

  ?>
 
 <!-- Edit Department  Modal -->
  
<div class="modal fade" id="editModal<?php echo $dept_id;?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#dff3fb8f">
        <h4 class="modal-title" id="exampleModalLongTitle"><strong>Update Department</strong></h4>
        <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="" method="post">
      <div class="modal-body"  style="background-color:;">
         
          
            <div class="form-group row">
            <label for="inputfullname" class="col-sm-2 col-form-label">Department Name:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="dep" value="<?php echo $dept_name?>" required>
            </div>
            </div>
              
         
      </div>
    
      <div class="modal-footer" style="background:#dff3fb8f">
              
<!--          <a herf='' class="btn btn-info" style="color:white">Update</a> -->
          
     <input type="hidden" name="edit_id" value="<?php echo $dept_id?>">
	 <input type="submit" name="edit" value="Update" style="color:white" class="btn btn-info">
       
        <button type="button" class="btn btn-danger"  data-dismiss="modal">NO</button>
       
      </div>
       </form>
    </div>
  </div>
</div>    
           
<?php } ?>     
      

            
<!--  Delete  Depatment Modal -->
 <?php
        		$deletequery = mysqli_query($conn,"select * from department_info");
                while($row = mysqli_fetch_array($deletequery)){
                    $dept_id = $row['dep_id'];
                    $dept_name=$row['dep_name'];
                
  ?>

<!--  Delete  Depatment Modal -->

<div class="modal fade" id="deleteModal<?php echo $dept_id;?>" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#ff4545bd;">
        <h3 class="modal-title" id="exampleModalLongTitle"><strong>Delete Depatment</strong></h3>
        <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"  style="background-color:#fff1f159;">
          <h3 style="color:#ff4545;" >Are You Sure to Delete?</h3>
      </div>
    
      <div class="modal-footer"  style="background:#ff4545bd;">
              
          <a href='department.php?delete=<?php echo $dept_id;?>' class="btn btn-danger" style="color:white">Delete</a> 
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">NO</button>
       
      </div>
     
    </div>
  </div>
</div>  
 
   <?php  }?>   
<!--delete department code-->
  
    <?php

   
         if(isset($_GET['delete'])){
             $dep_id=$_GET['delete'];
             
        $query="delete from department_info where dep_id='$dep_id' ";
            

        $delete_run=mysqli_query($conn,$query);
            
         if($delete_run == true){
                 echo "<script>alert('Record  successfully Delete')</script>";
		         echo "<script>window.location = 'department.php';</script>";
								 
							
            } else{
                 echo "<script>alert('Record  Not Delete')</script>";
                 echo "<script>window.location = 'department.php';</script>";
            }

         }

?>  
 
 
 
 <!--edit department code-->
  
    <?php
         if(isset($_POST['edit'])){
             $dep_id=$_POST['edit_id'];
             $dep_name=$_POST['dep'];
             
        $query=" UPDATE department_info SET dep_name='$dep_name' WHERE  dep_id='$dep_id' ";
            

        $update_run=mysqli_query($conn,$query);
            
         if($update_run == true){
                 echo "<script>alert('Record  successfully Updated')</script>";
		         echo "<script>window.location = 'department.php';</script>";
								 
							
            } else{
                 echo "<script>alert('Record  Not Update')</script>";
                 echo "<script>window.location = 'department.php';</script>";
            }

         }

?>  
  
   
   
    
<?php include "include/admin_footer.php";?>