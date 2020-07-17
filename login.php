<?php include 'include/db.php';?>

<?php  session_start();?>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="">
        
<!--<link href="admin/bootstrap3/css/bootstrap.min.css" rel="stylesheet" id="">-->
<?php

      if(isset($_POST['login'])){
      $emp_email=$_POST['email'];
      $emp_pass=$_POST['password'];
  
      $emp_email=mysqli_real_escape_string($conn, $emp_email);
      $emp_pass=mysqli_real_escape_string($conn, $emp_pass);
      $msg='';
          
        
        $query="select * from employee_info where emp_email = '$emp_email' ";
          $query_result=mysqli_query($conn,$query);
          
            $check=mysqli_num_rows($query_result);
          
              if($check==0){
                        
              $msg .="<div style='border-radius: 10px;' class='alert alert-danger'><strong>Employee is not register  !! <a href='Register.php' class='text-primary' ><i>Register Now</i></a></strong></div>";
//                echo '<META http-equiv="refresh" content="4;login.php">';
              
              }else{
                  
              
                  
             $query="select * from employee_info where emp_email = '$emp_email' ";
          $query_result=mysqli_query($conn,$query);
          
          while($row=mysqli_fetch_assoc($query_result)){
               $db_emp_id  =$row['emp_id'];
               $db_emp_name=$row['emp_name'];
               $db_emp_pass=$row['emp_password'];
               $db_emp_email=$row['emp_email'];
               $db_emp_role=$row['emp_role'];
              
             
          }
             
          
         if(password_verify($emp_pass,$db_emp_pass)){
       
                  $_SESSION['emp_id']   =$db_emp_id;
                  $_SESSION['emp_email']=$db_emp_email;
                  $_SESSION['emp_role'] =$db_emp_role;
                  $_SESSION['emp_name'] =$db_emp_name;
              
                 if($db_emp_role=='admin'){
                      $msg .= "<div class='alert alert-success'>Mr Admin  Successfully  Login!! <strong>  Thank  you!!<strong></div>";
                      $msg.=" <div class='spinner-border text-success offset-5' role='status'>
                           <span class='sr-only'>Loading...</span>
                              </div>";
                     
                      echo '<META http-equiv="refresh" content="3;admin/index.php">';
                     
//                       header('location:admin/index.php');
                     
                 }else{
                     
                      $msg .= "<div class='alert alert-success'>Mr User  Successfully  Login !! <strong>  Thank  you!!<strong></div>";
                       $msg.=" <div class='spinner-border text-success offset-5' role='status'>
                           <span class='sr-only'>Loading...</span>
                              </div>";
                      echo '<META http-equiv="refresh" content="2;user/index.php">';
//                       header('location:user/index.php');
                 } 
          
         }else{
                              
              $msg .="<div style='border-radius: 10px;' class='alert alert-danger'><strong>Incorrect Email and Password Try Again!!</strong></div>";
//              echo '<META http-equiv="refresh" content="3;login.php">';

       }
                 
              }
      }
          
          
?>



<link href="css/form.css" rel="stylesheet" id="">
 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">


<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
       
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
               
                <div id="login-column" class="col-md-6">
                     
                    <div id="login-box" class="col-md-12" style="background: linear-gradient(180deg, #fff3cf, #777054);">
                    <span ><?php if(isset($msg)){echo $msg;}?></span>
                      
            <form id="login-form" class="form" action="" method="post" onsubmit='return myfun()'>

                <h2 class="text-center text-info"  style="text-shadow: 4px 6px 9px #06131f40;color: #ff6347;letter-spacing: 3px;"><b><i>Login</i></b>
                             
                            
                  <i><img src="images/1.jpg"  width="40px" height="40px"id="icon" style="border-radius: 50px;" alt="User Icon" /></i>
                </h2>
               

               
                <div class="form-group">
                    <label for="username" class="text-dark">Email:</label><br>
                  
                    <input type="email" name="email" id="email" autofocus class="form-control"  placeholder="example@gmail.com" ><span class= id='u_email'></span>
                 
                </div>
                <div class="form-group">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" autofocus id="password" class="form-control"  placeholder=""  ><br><span id='u_pass'></span>
                </div>
                <div class="form-group">
                    <input type="submit" name="login"  class="btn btn-info btn-md form-control" value="Login">
                </div>
                 
                <div id="" class="text-right">
                 <span style="">Haven't Registered? </span><strong ><a style="color:darkblue" href="Register.php" >Register Now</a></strong>
                     
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

        function myfun(){
            
         var email=document.getElementById('email').value;
         var pass=document.getElementById('password').value;
            
           if(email == ''){
               
               document.getElementById('u_email').innerHTML="** Please fill the Email";
               return false;
           }
            
             if(pass == ''){
               
               document.getElementById('u_pass').innerHTML="** Please fill the password";
               return false;
           }else{
               return true;
           }
            
            
        }

</script>


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
