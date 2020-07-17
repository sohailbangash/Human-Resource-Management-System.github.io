<?php include "include/user_header.php";?>






<div class="row mg-top">
    <div class="container">
        <nav class="navbar navbar-light bg-dark" style="border-radius:15px;background:linear-gradient(210deg,#353535, #e2e2e2fa);box-shadow:5px 5px 20px #adadadf0;">
            <h4 style="color:black;text-align:center"><b>PayRoll</b></h4>
        </nav>


        <div class="row mg-top">


            <table class="table table-hover table-secondary">
                <thead class="table-dark">
                    <tr class="tt">
                        <th scope="col">ID#</th>
                        <th scope="col">Name</th>
                        <th scope="col">FAther name</th>
                        <th scope="col">issue date</th>
                        <th scope="col">Net Salary</th>
                        <!--      <th scope="col"> 	Action</th>-->

                    </tr>
                </thead>
                <tbody>
                <tbody>
                    <?php
                    
                         $emp_id   =$_SESSION['emp_id'];
                         $emp_role= $_SESSION['emp_role'];
                         $emp_email= $_SESSION['emp_email'];
              
                        $query="select * from employee_info where emp_role='$emp_role' AND emp_id='$emp_id' ";
                          $select_query=mysqli_query($conn,$query);
                                
                            while($row=mysqli_fetch_array($select_query)){
                            $emp_id     =$row['emp_id'];
                            $emp_name  =$row['emp_name'];
                            $emp_fname   =$row['emp_fname'];
                            $emp_joindate   =$row['join_date'];
                            $emp_salary   =$row['emp_salary'];
                           
                                 echo"<tr>";  
                                 echo"<td>$emp_id</td>";
                                 echo"<td>$emp_name</td>";
                                 echo"<td>$emp_fname </td>";
                                 echo" <td>$emp_joindate</td>";
                                 echo"<td>$emp_salary</td>";
//                     echo" <td class='text-center'>
//                     <a href='payslip.php?details=$emp_id'><span class='btn btn-danger btn-sm glyphicon glyphicon-arrow'>Payslip</span></a>
//                    
//                                  </td>";
                                 echo"</tr>";
                            
                            }
                           
                        
                        
                    ?>

                </tbody>


                </tbody>
            </table>

        </div>
    </div>
</div>

<?php include "include/user_footer.php";?>