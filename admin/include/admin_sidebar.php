<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper" style="background: #ffe8c638;">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation clearfix" style="padding:0px;">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


        </div>
        <ul class="nav navbar-left top-nav">
            <li>
                <a class="fa fa-male" style="font-size:30px" href="./index.php">
                    <b>HRM</b>

                </a>
            </li>
        </ul>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <?php
                     
                    $query="select  emp_id from employee_info  where emp_role='user'";
                          $emp_result=mysqli_query($conn,$query);
                            $row=mysqli_fetch_array($emp_result);
                        
                            $emp_id = $row['emp_id'];
                            $emp_count=mysqli_num_rows($emp_result);
                  
                            
                        ?>
            <li><a class="fa fa-user" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="Show All User's You have <?php echo $emp_count?> Total User's" name="veiw" href="#veiw" style="font-size:20px">
                    <span class="label" style="background: red;font-size:15px;"><?php echo $emp_count;?></span>
                </a>
            </li>


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                    <?php if(isset($_SESSION['emp_role'])){
                             echo $_SESSION['emp_name'];
                           }
                    ?>
                    <b class="fa fa-user"></b>
                </a>

                <ul class="dropdown-menu bg-danger">
                    <li><a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="nav navbar-nav side-nav" style="height: 1000px;">

                <li>
                    <a href="./dashboard.php"><i class="fa fa-dashboard" style="font-size:20px"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#Employee"><i class="fa fa-fw fa-user-plus"></i> Employees's <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="Employee" class="collapse">
                        <li><a href="add_emp.php"><i class=""></i>Add Employee</a></li>
                        <li><a href="view_emp.php"><i class=""></i>View Employee</a></li>

                    </ul>
                </li>
                <li>
                    <a href="./department.php"><i class="fa fa-institution"></i> Department</a>
                </li>
                
                <li>
                    <a href="./designation.php"><i class="fa fa-graduation-cap"></i> Designation</a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#Attandance"><i class="fa fa-fw fa-star"></i> Attandance <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="Attandance" class="collapse">
                        <li><a href="add_attendence.php"><i class=""></i>Add Attandance</a></li>
                        <li><a href="view_attendence.php"><i class=""></i>View Attandance</a></li>
                    </ul>
                </li>
                <li>
                    <a href="./leave.php"><i class="fa fa-bed"></i> Leaves's</a>
                </li>
                 <li>
                    <a href="payroll.php"><i class="fa fa-gift "></i> Pay Role</a>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#Notice"><i class="fa fa-arrows-v"></i> Notices <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="Notice" class="collapse">
                        <li><a href="add_notice.php"><i class=""></i>Add Notice</a></li>
                        <li><a href="view_notice.php"><i class=""></i>View Notice</a></li>
                    </ul>
                </li>


                <li>
                    <a href="#" data-toggle="collapse" data-target="#Tasks"><i class="fa fa-pencil-square-o"></i> Tasks <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="Tasks" class="collapse">
                        <li><a href="add_task.php"><i class=""></i>Add Task</a></li>
                        <li><a href="view_task.php"><i class=""></i>View Tasks</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="send_email.php"><i class="fa fa-envelope-o"></i> Send Email</a>
                </li>

                <li>
                    <a href="multi_email.php"><i class="fa fa-envelope-o"></i> Group Email</a>
                </li>
                
               

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>


    <!--------------modal for register employee------>
    <div class="modal fade" id="veiw" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="text-align: center;
            background: linear-gradient(45deg, #0383ce, transparent);">
                    <h3 class="modal-title text-center" id="edit"><strong style="text-align: center; color:white">Last Employee Registration</strong></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: black;
            font-size: 36px;">&times;</span>
                    </button>

                </div>


                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-7 col-lg-7 col-sm-7">
                                <form action="" method="post">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Employee Id</th>
                                                <th>Employee_Image</th>
                                                <th>Emplyee_Name</th>
                                                <th>Emplyee_Email</th>
                                                <th>Registration Date</th>

                                            </tr>
                                        </thead>
                                        <tbody style='background: linear-gradient(2deg, #d6a0a080, transparent);'>
                                            <?php 
                  $query = mysqli_query($conn,"select * from employee_info where emp_role='user'  LIMIT 5");
                             

                  $count = mysqli_num_rows($query);
                  
                  if($count == 0){
                     echo "<div class='alert alert-danger'><strong>SORRY !!</strong> No User Found!!</div>";

                      
                  }
                                        
                    else{ 
                     while($row = mysqli_fetch_array($query)){
                      $emp_id = $row['emp_id'];
                      $emp_image = $row['emp_image'];
                      $emp_name = $row['emp_name'];
                      $emp_email = $row['emp_email'];
                      $emp_joindate = $row['join_date'];
                     }
                              
                     ?>
                                            <tr>
                                                <td><?php echo $emp_id;?></td>
                                                <td><img src="emp_images/<?php echo $emp_image;?>" id="image" width="100px" height="70px" class='img-responsive img-rounded'></td>
                                                <td id="fullname"><?php echo $emp_name;?></td>
                                                <td id="email"><?php echo $emp_email;?></td>
                                                <td id="date"><?php echo $emp_joindate;?></td>

                                            </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-info" style="width:100px" data-dismiss="modal">OK</button>

                </div>
            </div>
        </div>
    </div>
    
   