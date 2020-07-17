<?php include "include/admin_header.php";?>
    <?php include "include/admin_sidebar.php";?>

 <?php
       if(isset($_POST['submit'])){
         $designation=$_POST['designation'];
           
        $message="";
           
           if($designation==''){
                $message .="<div style='border-radius: 10px;' class='alert alert-danger'> <strong>Sorry!!</strong>  Empty Field Should Not Allowed !! </div>";
                 echo '<META http-equiv="refresh" content="2;designation.php">';
                

           
           }else{
    
            $query="insert into designation_info (des_name) Values('$designation')";
            $des_query=mysqli_query($conn,$query);
            
            if($des_query== true){
                 $message .="<div style='border-radius: 10px;' class='alert alert-success'> <strong>Congratulation!!</strong> Data Successfully Done!! </div>";
                  echo '<META http-equiv="refresh" content="2;designation.php">';
            }else{
                  echo "<script>alert('Try Again')</script>";
            }
        }
       }
        

?>
    <!--   delete designation row   -->
    
   <?php
         if(isset($_GET['delete'])){
               $delete=$_GET['delete'];
               $mess='';
           $query="delete from designation_info where des_id ={$delete} ";  
             
             $delete_query=mysqli_query($conn,$query);
             
             
            if($delete_query== true){
                 $mess .="<div  class='alert alert-danger'><strong> Record  successfully deleted !!</strong> </div>";
                  echo '<META http-equiv="refresh" content="1;designation.php">';
								 
							
            } else{
                 echo "<script>alert('Record  not deleted')</script>";
                 echo "<script>window.location = 'designation.php';</script>";
            }
            
    }
         
          
       


?>   
      
 
        <div class="container-fluid" style="margin-top:70px;">
<!--             Page Heading -->
           <nav class="navbar navbar-light bg-dark" style="border-radius:15px;background:linear-gradient(45deg,#908064bd, #ffe3c6fa);box-shadow:5px 5px 20px #adadadf0;">
                <h2 style="color:black;text-align:center"><b>Designation</b></h2>  
             </nav>
               
         
<!--            form to add department -->
               
            
                <div class="container-fluid">
                <div class="col-md-12">
                 <div class='row'  style="margin-top:50px;">
                 
                 <div class='col-md-5 col-xs-6'>
                 
                <div class="">
           
              
            <form action="" method="post">
             
              <nav class="navbar navbar-light " style=" background: linear-gradient(45deg, black, transparent)">
                <h4 style="color:white">Add Designation</h4>  
             </nav>
             <div class="">
            <span><?php if(isset($message)){echo $message;}?></span>
            <div class="form-group">
            <label for="dep">DESIGNATION NAME</label>
            <input type="text" id="" name="designation" class="form-control"   placeholder="Enter department.." autofocus>
            </div> 
            <input type="submit" name="submit"  value="Add Designation" class="btn btn-primary">
              
        </div>
              </form>
              <br><br>
              
<!--        Update_designation code in include-->
         
                 
       <?php
        if(isset($_GET['edit'])){
        $edit_id=$_GET['edit']; 
            
             include 'include/update_des.php';
            
        }
        ?>
          
   
    </div>
    </div>   

         
        
<!--         all department infomation show in this table-->

                   <div class="col-md-7">
                    <span><?php if(isset($mess)){echo $mess;}?></span>
                   <form action="" method="post" enctype="multipart/form-data">

                <div class="navbar navbar-light" style=" background: linear-gradient(45deg, black, transparent);margin-bottom:5px">
                <h4 style="color:white"> View Designation</h4>  
             </div>
                 
                
      
                 <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background: linear-gradient(497deg,#7b3f01b0, transparent">
                   
                    <thead class="thead-dark">
                    <tr>
                    <th>ID</th>
                    <th>DESIGNATION NAME</th>
                    <th style="text-align:center">Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    
                <?php
                             $query="select * from designation_info";
                             $select_result=mysqli_query($conn,$query);
                        
                           while($row=mysqli_fetch_assoc($select_result)){
                               $des_id=$row['des_id'];
                               $des_name=$row['des_name'];
                                  
                           
                        

                            echo"<tr>";  
                            echo"<td>$des_id</td>";
                            echo"<td>$des_name</td>";
   
                    echo"<td style='text-align:center'>
                    <a href='designation.php?edit={$des_id}' class='btn btn-info btn-xs'><i class='fa fa-pencil'></i> Edit </a> 

                   <a href='designation.php?delete={$des_id}' class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i> Delete </a>

                            </td>";
                            echo"</tr>";
                        
                   }     
                        
                        ?>
                   
                    </tbody>
                    </table>
                  
                   
               </form>
                    </div>
               
           
           </div>
                    </div>
                    </div>
            


      
       
      
      
      
      
      
      
    
<?php include "include/admin_footer.php";?>