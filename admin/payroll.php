<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>

<!-- view all employess show in table form -->

    <div class="container-fluid" style="margin-top:70px;">
        <!--             Page Heading -->
        
        <div id="page-wrapper">
        <div class="row" id="main">
            <div class="col-sm-12 col-md-12  col-xl-12  bg-dark" style="color:white;box-shadow:5px 5px 18px #888888" id="content">

                <h3 class="text-center" style="color:white;box-shadow:5px 0px 18px #888888">Pay Role Information</h3>
            </div>
        </div>


        <!-- view all employess show in table form -->

        <form action="" method="" enctype="multipart/form-data">
            <div class="panel panel-primary" style="margin-top:30px;">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#Employee Id</th>
                            <th>Empoyee Name</th>
                            <th>Father Name</th>
                            <th>Date</th>
                            <th>Basic Salary</th>
<!--                            <th class='text-center'>Action</th>-->
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                             
                        $query="select * from employee_info where emp_role='user' ";
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
//                     <a href='print_fpdf/payslip.php?details=$emp_id'><span class='btn btn-danger btn-sm glyphicon glyphicon-arrow'>Payslip</span></a>
//                    
//                                  </td>";
                                 echo"</tr>";
                            
                            }
                           
                        
                        
                    ?>




                    </tbody>
                </table>

            </div>
        </form>





    </div>
</div>