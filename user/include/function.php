<?php
     
    function is_user($emp_email=''){
        global $conn;
    $query="select emp_role from employee_info where emp_email='$emp_email' ";
    $query_result=mysqli_query($conn,$query);
        
      $row=mysqli_fetch_assoc($query_result);
        
        if($row['emp_role']=='user'){
            return true;
        }else{
            
            return false;
        }
    }



?>