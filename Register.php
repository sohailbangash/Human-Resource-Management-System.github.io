<?php include 'include/db.php';?>

<?php
       if(isset($_POST['register'])){
             $emp_name  =mysqli_real_escape_string($conn,$_POST['username']);
             $emp_email=mysqli_real_escape_string($conn,$_POST['email']);
             $emp_pass =mysqli_real_escape_string($conn,$_POST['password']);
              
             $user_image=$_FILES['img']['name'];
             $temp_image=$_FILES['img']['tmp_name'];
              $msg='';
//              $user_image =uniqid() .$user_image;
            
       $password=password_hash($emp_pass,PASSWORD_BCRYPT,array('cost'=>12));
          
     
        $select_query="select * from employee_info where emp_email='$emp_email' ";
        $query_res=mysqli_query($conn,$select_query);
                                                   
        $count=mysqli_num_rows($query_res);
                                                   
        if($count==1){
        $msg .= "<div class='alert alert-danger'><stong>Email is already registered Try another  one!!</strong></div>";
//           echo '<META http-equiv="refresh" content="3;Register.php">';
        
        
        }
         elseif(strlen($emp_pass)<4){
               $msg .= "<div class='alert alert-danger'><strong>Password should be  minimum 4 characters!!<strong></div>"; 
//               echo '<META http-equiv="refresh" content="3;Register.php">';
               
             
          }
                                                   
           else{
        $query="insert into employee_info (emp_name,emp_email,emp_password,emp_image,emp_role,join_date)";
        $query.="values('$emp_name','$emp_email','$password','$user_image','user',now())";
            
             move_uploaded_file($temp_image, "admin/emp_images/$user_image");
           
           $query_result=mysqli_query($conn,$query);
          
          if(!$query_result){
                  
                 $msg .= "<div class='alert alert-danger'><strong>'Try Again worng information!!'<strong></div>";
//                   echo '<META http-equiv="refresh" content="2;Register.php">';
                  
                 
          }else{
                
                $msg .= "<div class='alert alert-info'><strong>Register is successfully Thank you!!<strong></div>"; 
                 $msg.=" <div class='spinner-border text-success offset-5' role='status'>
                           <span class='sr-only'>Loading...</span>
                              </div>";
                 
                    echo '<META http-equiv="refresh" content="2;Register.php">';

              
          }
          
      }
            
                                    
           
       }
        

?>



 <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<link href="css/reg_from.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
      
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
               
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                    <span><?php if(isset($msg)){echo $msg;}?></span>
                    
            <form id="login-form" class="form" action="" method="post" enctype="multipart/form-data">
               
                <h2 class="text-center" style="text-shadow: 4px 6px 9px #52130885;color: #ff6347;
                            letter-spacing: 3px;"><b>Register Now</b>
                 <i><img src="images/icon.png" style="border-radius: 50px;" width="50px" height="50px"id="icon" alt="User Icon" /></i>
                </h2>
                <div class="form-group">
                    <label for="username" style="color:white">Full Name:</label><br>
                    <input type="text" name="username" id="" autofocus class="form-control" placeholder="Enter your Name" required>
                </div>
                
                 <div class="form-group">
                    <label for="username" style="color:white">Email:</label><br>
                    <input type="email" name="email" id="" class="form-control"  placeholder="example@gmail.com" required>
                </div>
                
                <div class="form-group">
                    <label for="password" style="color:white">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control" placeholder="" required>
                </div>
                 <div class="form-group">
                <label for="exampleFormControlFile1" style="color:white">Image:</label>
                <input type="file" name="img" class="form-control-file" id=""  required>
                </div>
                <div class="form-group">
                    <input type="submit" name="register"  class="btn btn-primary btn-md form-control" value="Register">
                </div>
                <div id="" class="text-right">
                <span class="text-danger">Already Registered? </span><a href="login.php" class="" style="color:#bcc1ff"><strong>Login Now</strong></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
