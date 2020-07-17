<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>

<?php
  
       if(isset($_POST['submit'])){
          $emp_email=$_POST['emp_email']; 
          $emp_subject=$_POST['subject'];
          $emp_body=$_POST['body'];
          $image=$_FILES['img']['name'];
          $temp_image=$_FILES['img']['tmp_name'];
         
          $mess='';
           
          if($emp_body==''){
                 $mess.="<div  class='alert alert-danger'>Empty Felid Not Allowed!<strong> Try Again!!</strong>  </div>";
          }else {
        
       $query="select emp_email from employee_info where emp_role='user' "; 
       $query_result=mysqli_query($conn,$query);
          $row=mysqli_fetch_array($query_result);
          $db_email=$row['emp_email'];
         
        

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
for($i = 0; $i < count($emp_email) ;$i++){ 
$mail->addAddress($emp_email[$i], 'Mr User');     // Add a recipient
 }
           
$mail->addReplyTo('sohailbangash345.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
                       
$mail->addAttachment($temp_image, $image);    // Optional name
         
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $emp_subject;
$mail->Body    = $emp_body;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
     $mess.="<div  class='alert alert-danger'>Message could not be sent Connection Problem <strong> Try Again!!</strong>  </div>";
//      echo '<META http-equiv="refresh" content="2;send_email.php">';
    
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
    
      echo '<META http-equiv="refresh" content="3;multi_email.php">';
     
}


       }

           
           
       }
 
?>   
    





    <div class="container">

        <section id="login">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-xs-offset-3" style='margin-top:50px'>
                        <div class="form-wrap">


                            <h1 class="text-center" style="text-shadow: 4px 6px 9px #656161;">

                                <i><img src="Mail/image/icon1.png" style="border-radius: 50px;" width="50px" height="50px" id="icon" alt="User Icon" /></i>

                                <Strong style="font-size:43px">Send Email In Group</Strong>

                                <i><img src="Mail/image/group.jpg" style="border-radius: 50px;" width="50px" height="50px" id="icon" alt="User Icon" /></i>

                            </h1>

                            <?php if(isset($mess)){echo $mess;}?>

                            <form role="form" action="" method="post" enctype="multipart/form-data" autocomplete="off" style="margin-top:30px">

                                <div class="form-group offset-md-2">
                                    <select id="framework" name="emp_email[]" multiple required>

                             <?php
                                     $query="SELECT * from employee_info where emp_role='user' ";
                                     $emp_query_result=mysqli_query($conn,$query);

                                      while($row=mysqli_fetch_assoc($emp_query_result)){
                                        $emp_id=     $row['emp_id'];
                                        $emp_name=     $row['emp_name'];
                                         $emp_email=     $row['emp_email'];

                                       echo"<option  value='$emp_email'>$emp_name</option>";


                                      }
                                   ?>
                                    </select>
                                </div>




                                <div class="form-group">
                                    <label for="subject" class="sr-only">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject :" required autofocus>
                                </div>
                                <div class="form-group">
                                    <textarea class='form-control tinymce' name="body" id="50" cols="30" rows="10" placeholder="Compose Email..."></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="" style="color:white">Image:</label>
                                    <input type="file" name="img">
                                </div>

                                <button type="submit" name="submit" id="btn-login" class="btn 
                        btn-success btn-lg btn-block "><strong>Send</strong></button>
                            </form>

                        </div>
                    </div> <!-- /.col-xs-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </section>


    </div>


    <!-- this multi selection script-->


<script>
$(document).ready(function(){
 $('#framework').multiselect({
  nonSelectedText: "--Select Emloyee's Name--",
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'300px'
 });
 
 $('#framework_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#framework option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#framework').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script>



<?php include('include/admin_footer.php');?>
