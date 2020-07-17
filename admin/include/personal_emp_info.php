


<!--   Modal for Employee Personal Information-->

<?php

        $query="select employee_info.emp_id,employee_info.emp_name,employee_info.emp_fname,employee_info.gender,employee_info.emp_dob ,employee_info.emp_cnic,employee_info.emp_image,employee_info.emp_contact,employee_info.emp_address,employee_info.emp_email,department_info.dep_name,employee_info.emp_salary,
        employee_info.emp_salary,
        employee_info.join_date,
         designation_info.des_name,shift_info.shift_name from employee_info
       LEFT  join department_info on department_info.dep_id = employee_info.dep_id
       LEFT  join designation_info on designation_info.des_id = employee_info.des_id
       LEFT  join shift_info on shift_info.shift_id = employee_info.shift_id ";

       $join_query_result=mysqli_query($conn,$query);
    
     
          while($row=mysqli_fetch_array($join_query_result)){
                     $emp_id     =$row['emp_id'];
                     $emp_name   =$row['emp_name'];
                     $emp_fname  =$row['emp_fname'];
                     $emp_dob    =$row['emp_dob'];
                     $emp_cnic   =$row['emp_cnic'];
                     $emp_contact=$row['emp_contact'];
                     $emp_address=$row['emp_address'];
                      $emp_image  =$row['emp_image'];
                     $emp_email  =$row['emp_email'];
                     $emp_salary =$row['emp_salary'];
                     $emp_joindate=$row['join_date'];
                     $dep_name   =$row['dep_name'];
                     $des_name   =$row['des_name'];
                     $shift_name =$row['shift_name'];
                                                             
                    




?>


<!--   Modal for Employee Personal Information-->


<div class="modal fade" id="personalModal<?php echo  $emp_id; ?>" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: #ffe8c638;
    box-shadow: 0px 6px 13px #5f5d5d;">
                <h3 class="modal-title" id="exampleModalLongTitle"><strong style="">Personal Information</strong></h3>
                <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background: linear-gradient(305deg, #f1bc6d, transparent);">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="modal_pic">
                            <img src="emp_images/<?php echo $emp_image; ?>" style="border-radius:16px;" width="150px" height="150px">

                            <h3><?php echo '<span class="label label-info">'.$emp_name.'</span>' ?></h3>
                            <p><?php echo '<span class="label label-warning">'.$des_name.'</span>' ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4" style="margin-left:-11px">
                        <table class="table table-hover">
                            <tr class="active">
                                <th>NAME :</th>
                                <td><?php echo $emp_name;?></td>

                            </tr>
                            <tr>
                                <th>FATHER NAME :</th>
                                <td><?php echo $emp_fname;?></td>

                            </tr>

                            <tr>
                                <th>DATE OF BIRTH :</th>
                                <td><?php echo $emp_dob;?></td>

                            </tr>
                            <tr>
                                <th>CNIC :</th>
                                <td><?php echo $emp_cnic;?></td>

                            </tr>
                            <tr>
                                <th>CONTACT :</th>
                                <td><?php echo $emp_contact;?></td>

                            </tr>
                            <tr>
                                <th>ADDRESS :</th>
                                <td><?php echo $emp_address;?></td>

                            </tr>
                        </table>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <table class="table table-hover">
                            <tr>
                                <th>DEPARTMENT </th>
                                <td><?php echo $dep_name;?></td>

                            </tr>
                            <tr>
                                <th>DESIGNATION </th>
                                <td><?php echo $des_name;?></td>

                            </tr>
                            <tr>
                                <th>JOIN DATE </th>
                                <td><?php echo $emp_joindate;?></td>

                            </tr>
                            <tr>
                                <th>SALARY : </th>
                                <td><?php echo $emp_salary;?></td>

                            </tr>
                            <tr>
                                <th>EMAIL : </th>
                                <td><?php echo $emp_email;?></td>

                            </tr>
                            <tr>
                                <th>SHIFT : </th>
                                <td><?php echo $shift_name;?></td>

                            </tr>

                        </table>

                    </div>

                </div>
            </div>
            <div class="modal-footer" style="background: #ffe8c638; box-shadow: 0px 6px 13px #5f5d5d;">
                <button type="button" class="btn btn-primary " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<?php   }
                       
                       
            ?>