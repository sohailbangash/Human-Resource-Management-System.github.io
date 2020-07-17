<!--      delete employee code-->

<?php include 'db.php';?>

<?php
         if(isset($_GET['delete'])){
               $delete=   $_GET['delete'];
              
           $query="delete from employee_info where emp_id ='$delete' ";  
             
             $delete_query=mysqli_query($conn,$query);
 
             
             if($delete_query==true){
                 
                    
                   echo "<script>alert('Date has been Deleted ')</script>";
                  echo "<script> window.location= '../view_emp.php'; </script>";
		      exit();
             }else{
                  echo "<script>alert('Date has not deleted  ')</script>";
                  echo "<script> window.location= '../view_emp.php'; </script>";
		      exit();
                 
             }
       
         
         
         
         }


?>