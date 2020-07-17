 <?php include "include/user_header.php";?>  
    <?php
     

           $emp_id   =$_SESSION['emp_id'];
           $emp_role= $_SESSION['emp_role'];
           $emp_email= $_SESSION['emp_email'];
        
           
            
        $query="Select * from employee_info where emp_id='$emp_id' && emp_email = '$emp_email' && emp_role='$emp_role' ";
        $query_result=mysqli_query($conn,$query);

          $row=mysqli_fetch_array($query_result);
                $emp_name=$row['emp_name'];
                $emp_image=$row['emp_image'];
                $date=date('d-m-Y');
              
     

?>
     
  
    <div id="page-wrapper">
        <div class="container-fluid">
<!--             Page Heading -->
            <div class="row" style="color:black;background-color:#fff6f6fa;margin-top:10px" id="main" >
               <div class="esea_out">
                <h3 class=" text-center" style="margin-top:65px;color:#595858"><strong>HRM Human Resourse Managment System </strong></h3>
                </div>
                <div class="col-sm-12 col-md-12  col-xl-12 well" style="box-shadow:5px 0px 18px #c1c1c1;background:linear-gradient(180deg,#7f7f7f, #ffead480);" id="content">
                    <h1 class="display-3 text-center"><strong>Hi !!</strong> <br>  <?php echo $_SESSION['emp_name'];?></h1>
            <div class="admin-image text-center">
                        <p class="image">
                       <img src="../admin/emp_images/<?php echo $emp_image?>" class="rounded-circle" style="width:200px;height:200px;">
                       </p>
                       <strong>Date</strong>
                       <h5><?php echo $date;?></h5>
                       </div>



                    </div>
<!--             /.row -->
        </div>
<!--         /.container-fluid -->
    </div>
<!--     /#page-wrapper -->
</div>
