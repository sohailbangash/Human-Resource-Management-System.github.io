
      
           <form action="" method="post">
           
            <div class="form-group">
            <label for="dep">Update Designation</label>
            
   <?php   
                 if(isset($_GET['edit'])){
                $edit_id=$_GET['edit'];
                 $mess='';
                     
        		$editquery = mysqli_query($conn,"select * from designation_info where des_id=$edit_id");
                while($row = mysqli_fetch_assoc($editquery)){
                    $desi_id = $row['des_id'];
                    $desi_name=$row['des_name'];
                ?>
                 
                <input type="text" id="" name="designation" value="<?php if(isset($desi_name)){echo $desi_name;} ?>" class="form-control" autofocus> 
     <?php }
                 }
  ?>
          
          
            </div> 
            <input type="submit" name="update"  value="Update Designation" class="btn btn-info">
              
              </form>
              
             
              
              
        <!--   Edit designation code   -->
     
    <?php
            if(isset($_POST['update'])){
                 $desi_name=$_POST['designation'];
                
            $query="UPDATE designation_info SET des_name='$desi_name' where des_id='$edit_id'";
            

        $update_run=mysqli_query($conn,$query);
            
         if($update_run == true){
              
                $mess .="<div  class='alert alert-success'><strong>  Record  successfully Updated !!</strong> </div>";
                  echo '<META http-equiv="refresh" content="1;designation.php">';
								 
							
            } else{
                 $mess .="<div  class='alert alert-danger'><strong>  Record Not Updated !!</strong> </div>";
                  echo '<META http-equiv="refresh" content="1;designation.php">';
            }
            }


     ?>   
      
      


