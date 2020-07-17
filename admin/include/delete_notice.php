<!--      delete employee code-->

<?php include 'db.php';?>

<?php
         if(isset($_GET['delete'])){
               $delete=   $_GET['delete'];
             
           $query="delete from notice_info where notice_id ='$delete' ";  
             
             $delete_query=mysqli_query($conn,$query);
 
             
             if($delete_query==true){
                 
                   echo "<script>alert('Notice Successfully Deleted ')</script>";
                  echo "<script> window.location= '../view_notice.php'; </script>";
		      exit();
             }else{
                  echo "<script>alert('Notice has not deleted  ')</script>";
                  echo "<script> window.location= '../view_notice.php'; </script>";
		      exit();
                 
             }
       
         
         
         
         }


?>