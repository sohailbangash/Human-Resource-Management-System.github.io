<!--      delete task code-->

<?php include 'db.php';?>
        <?php
         if(isset($_GET['delete'])){
               $delete=$_GET['delete'];
             
           $query="delete from task_info where task_id ='$delete' ";  
             
             $delete_query=mysqli_query($conn,$query);
 
             
             if($delete_query==true){
                 
                   echo "<script>alert('Date has been Deleted ')</script>";
                  echo "<script> window.location= '../view_task.php'; </script>";
		      exit();
             }else{
                  echo "<script>alert('Date has not deleted  ')</script>";
                  echo "<script> window.location= '../view_task.php'; </script>";
		      exit();
                 
             }
       
         
         
         
         }


?>