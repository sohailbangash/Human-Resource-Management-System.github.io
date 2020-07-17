<?php include('include/admin_header.php');?>
<?php include('include/admin_sidebar.php');?>


        <div class="container-fluid" style="margin-top:50px;">
        <div id="page-wrapper">
<!--             Page Heading -->
              <div class="col-sm-12 col-md-12  col-xl-12  " style="box-shadow:5px 5px 18px #74899acc;background: linear-gradient(180deg,#6f6f6f, #ffb55761);height: 80px;border-radius: 18px;" id="content">
                    <h1 class="text-center"  style="box-shadow:5px 5px 18px #3e4042cc;border-radius:45px;">
                    Mr <?php echo  $_SESSION['emp_name']; ?></h1>
                </div>
          
         
            </div>




   <div class="row col-md-12" style="box-sizing:border-box;padding:14px;text:center;">

   <div class="col-lg-3 col-md-6">
        <div class="panel panel-info" style="box-shadow:5px 10px 20px #bdbbbbf5">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" style="font-size:20px;">
                     <?php
                          $query="select * from employee_info where emp_role='user' ";
                          $emp_result=mysqli_query($conn,$query);
                          $emp_count=mysqli_num_rows($emp_result);
                        
                          echo"<div class='huge'>$emp_count</div>";
                        ?>
                   
                        <div>Total Empolyee's</div>
                       
                    </div>
                </div>
            </div>
            <a href="view_emp.php">
                <div class="panel panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
   
   
   
   
   
   
   
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success" style="box-shadow:5px 10px 20px #bdbbbbf5">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" style="font-size:20px;">
                     <?php
                        
                          $query="select * from attendance where status='Present' ";
                          $pre_result=mysqli_query($conn,$query);
                          $present_count=mysqli_num_rows($pre_result);
                        
                          echo"<div class='huge'>$present_count</div>";
                        ?>
                     
                      <div>Today Persent's</div>
                    </div>
                </div>
            </div>
            <a href="view_attendence.php">
                <div class="panel panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger" style="box-shadow:5px 10px 20px #bdbbbbf5">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" style="font-size:20px;">
                        <?php
                        
                          $query="select * from attendance where status='Absent' ";
                          $ab_result=mysqli_query($conn,$query);
                          $absent_count=mysqli_num_rows($ab_result);
                        
                          echo"<div class='huge'>$absent_count</div>";
                        ?>

                         <div>Today Absent's</div>
                    </div>
                </div>
            </div>
            <a href="view_attendence.php">
                <div class="panel panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    

    
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning"  style="box-shadow:5px 10px 20px #bdbbbbf5">
            <div class="panel-heading" style="color:;
    background-color: #ffb15094;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-bed fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right" style="font-size:20px;">
                    <?php
                        
                          $query="select * from attendance where status='Leave' ";
                          $le_result=mysqli_query($conn,$query);
                          $leave_count=mysqli_num_rows($le_result);
                        
                          echo"<div class='huge'>$leave_count</div>";
                        ?>

                        <div>Today Leave's</div>
                    </div>
                </div>
            </div>
            <a href="view_attendence.php">
                <div class="panel panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

     
     

</div>

<!--  google chart -->

   
    <div class="col-md-12 col-sm-6">
   <div class="row" style="margin-left:300px">
        <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
         var data = google.visualization.arrayToDataTable([
          ['Date', 'counts',],
        
         
            
            <?php
              $element_text=['Total Employee','Total Present','Total Absent','Total Leave'];
              $element_count=[$emp_count, $present_count, $absent_count, $leave_count];
            
                  
             for($i=0; $i < 4; $i++){
                 
                 echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
             }
                  
            ?>
            

//         ['posts', 1030,]
       
        ]);

        var options = {
          chart: {
            title: 'HRM',
            subtitle: 'HRM ATTENDANCE INFORMATION',
              colors: ['blue', '#e6693e', '#ec8f6e', '#f3b49f'],
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
      
      <div id="columnchart_material" style="width:80%; height: 450px;"></div>
      
       
   </div>
    </div>

</div>

 
    
    
