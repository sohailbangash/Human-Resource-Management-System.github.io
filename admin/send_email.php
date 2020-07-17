<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>

<?php
  
       if(isset($_POST['submit'])){
          $emp_email=$_POST['email']; 
          $emp_subject=$_POST['subject'];
          $emp_body=$_POST['body'];
          $emp_image=$_FILES['img']['name'];
          $temp_image=$_FILES['img']['tmp_name'];
          $mess='';
       $query="select emp_email from employee_info where emp_role='user' "; 
       $query_result=mysqli_query($conn,$query);
         
         
           
           
        
      //    send email


require 'Mail/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'sohailbangash345@gmail.com';                 // SMTP username
$mail->Password = 'pakistain345';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('sohailbangash345@gmail.com', 'HR Mangement');
$mail->addAddress($emp_email, 'Mr User');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('sohailbangash345.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');  // Add attachments
           
for($i=0; $i< count($temp_image); $i++) {
              
$mail->addAttachment($temp_image[$i], $emp_image[$i]);    // Optional name
 }
           
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $emp_subject;
$mail->Body    = $emp_body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
     $mess.="<div  class='alert alert-danger'>Connection Problem Message could not be sent<strong> Try Again!!</strong>  </div>";
      echo '<META http-equiv="refresh" content="3;send_email.php">';
    
//    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
//    echo 'Message has been sent';
    
    $mess.="<div  class='alert alert-success'>Message has beeen sent <strong> Thank You!!
    </strong>  </div>";
    
      $mess.='<div class="d-flex justify-content-center text-success">
                    <div class="spinner-border" role="status">
                         <span class="sr-only">Loading...</span><br>
                 </div>
          </div>';
    
      echo '<META http-equiv="refresh" content="3;send_email.php">';
}



           
           
       }
 
?>   
    





    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3" style='margin-top:50px'>
                <div class="form-wrap">
            
            
                    <h1 class="text-center" style="text-shadow: 4px 6px 9px #000000;color: #ff6347;letter-spacing: 2px;background: linear-gradient(180deg, #0c0c0c, transparent);border-radius: 12px;">
                    <Strong>Contact with Email</Strong>
                 <i><img src="Mail/image/icon1.png" style="border-radius: 50px;" width="50px" height="50px"id="icon" alt="User Icon" /></i>
                </h1>
               
                   <?php if(isset($mess)){echo $mess;}?>
                   <form role="form" action="" method="post"  enctype="multipart/form-data" autocomplete="off" style="margin-top:30px" >
                       
                       
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="To : example@gmail.com" autofocus required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject :">
                        </div>
                         <div class="form-group">
                          <textarea  class='form-control tinymce' name="body" id="50" cols="30" rows="10" placeholder="Compose Email..."></textarea>
                        </div>
                        
                <div class="form-group">
                <label for="" style="color:white">Image:</label>
                <input type="file" name="img[]" multiple="multiple"  class="form-control">
                </div>
                
                        <button type="submit" name="submit" id="btn-login" class="btn 
                        btn-info btn-lg btn-block " ><strong>Send</strong></button>
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


</div>

<?php include('include/admin_footer.php');?>
