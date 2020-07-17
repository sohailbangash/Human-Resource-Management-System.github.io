<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>

<!-- view all employess show in table form -->

<div class="container-fluid" style="margin-top:70px;">
    <div id="page-wrapper">
        <!--             Page Heading -->
        <div class="row" id="main">
            <div class="col-lg-12 col-md-12  col-xl-12 " style="box-shadow: 5px 5px 18px #888888;height: 80px;border-radius: 45px;background: linear-gradient(45deg, #9f6a6a, #3a363614);" id="content">

                <h2 class="text-center" style="box-shadow: 5px 0px 18px #888888;border-radius: 30px; background: linear-gradient(360deg, #343a40, transparent);color: white;"><strong>Leaves Information</strong></h2>
<!--                   <h1 class="text-center" style="box-shadow: 5px 7px 20px #6b6b6b;width: 600px;margin-left: 275px;background: #e5e5e5;border-radius: 30px;height: 50px;"><strong>All Emloyee's List</strong></h1>-->

            </div>
        </div>


        <!-- view all employess show in table form -->

        <form action="" method="post" enctype="multipart/form-data">
            <div class="panel panel-primary" style="margin-top:25px;">

                <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background:linear-gradient(179deg, #945151, #38383845);">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Employee Name</th>
                            <th>Father Name</th>
                            <th class="text-center">Leaves Summary</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                           
                        $query="select * from employee_info where emp_role='user' ";
                          $select_query=mysqli_query($conn,$query);
                                
                            while($row=mysqli_fetch_array($select_query)){
                            $emp_id     =$row['emp_id'];
                            $emp_image  =$row['emp_image'];
                            $emp_name   =$row['emp_name'];
                            $emp_fname   =$row['emp_fname'];
                           
                                 echo"<tr>";  
                                 echo"<td>$emp_id</td>";
                                 echo"<td><img src='emp_images/$emp_image' width=70px></td>";
                                 echo"<td>$emp_name </td>";
                                 echo"<td>$emp_fname</td>";
                     echo" <td class='text-center'>
                     
                     <a href='leaves_summary.php?details=$emp_id'><span class='btn btn-primary btn-sm glyphicon glyphicon-folder-open'> veiw</span></a>
                    
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