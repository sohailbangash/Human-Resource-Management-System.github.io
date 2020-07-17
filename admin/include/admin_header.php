<?php include '../include/db.php';?>
<?php include 'function.php';?>
<?php ob_start();?>
<?php session_start();?>

<?php    

     if(!isset($_SESSION['emp_role']) && !isset($_SESSION['emp_id'])){
        header('location:../logout.php'); 
   }
     
     if(!is_admin($_SESSION['emp_email'])){
           header('Location:../logout.php');
     }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HRM</title>
     
<!--
       
<link href="./fontawesomecss/fontawesome.css" rel="stylesheet">
     
-->
       
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" id="">

<link href="./bootstrap3/css/bootstrap.min.css" rel="stylesheet" id="">

<link rel="stylesheet" href="./css/fed_out.css"> 
<link rel="stylesheet" href="./css/sidebar.css">
<link rel="stylesheet" href="./css/loader.css"> 
 

 <script src="./js/sidebar.js"></script>

         
 

 <!-- include tinymce css/js -->   
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="./js/init-tinymce.js"></script>
 <!-- include tinymce css/js -->   
   
   
 
 <!--         multi select option links-->   
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->
  <script type="text/javascript" src="./bootstrap3/js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>-->

 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

<!--         multi select option links-->       
  
  
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!--<script type="text/javascript" src="./js/loader.js"></script> -->
 

     
	
        
   

</head>
<body>
    
</body>
</html>