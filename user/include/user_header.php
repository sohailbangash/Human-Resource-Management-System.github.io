<?php include "../include/db.php";?>
<?php include 'function.php';?>
<?php ob_start();?>
<?php session_start();?>
<?php
    
   if(!isset($_SESSION['emp_role']) && !isset($_SESSION['emp_id'])){
       
             header('location:../logout.php'); 
         
   }
      if(!is_user($_SESSION['emp_email'])){
              header('location:../logout.php'); 
      } 

        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
<!--    <meta name="description" content="pseduo Class Selector Css">-->
  
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="../../admin/css/fed_out.css"> 

<link rel="stylesheet" href="../admin/css/users.css">
<link rel="stylesheet" href="../admin/u_attendence.css">
<link rel="stylesheet" href="./css/loader.css"> 

<style type="text/css">
    
   li>a:link{
        color: blue;
    }  
    
     a:hover{
        color: blue;
    }   
</style>


</head>

<body style="box-sizing:border-box;background:seashell">

<!--header navbar of users-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(45deg, black, transparent);box-shadow: 0px 7px 18px #3838388a;">
  <a class="navbar-brand" href="#">
    <img src="images/hrmlogo.png" width="70" height="60" class="d-inline-block align-top" alt="">
   
  </a>
  <a class="navbar-brand" href="./index.php" style="font-size:30px">HRM</a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./profile.php"style="color:white">PROFILE <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ml-4" >
        <a class="nav-link" href="./u_attendence.php" style="color:white">ATTENDANCE</a>
      </li>
      <li class="nav-item ml-4">
        <a class="nav-link " href="./u_payroll.php"style="color:white">PAYROLL</a>
      </li>
      <li class="nav-item ml-4">
        <a class="nav-link " href="./u_task.php"style="color:white">TASK'S</a>
      </li>
      <li class="nav-item ml-4">
        <a class="nav-link " href="./u_notice.php"style="color:white">NOTICE'S</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0">
        <a href="../login.php" class="btn btn-outline-danger btn-sm my-2 my-sm-0" type="submit"><b>Logout</b></a>
    </form>
  </div>
</nav>
<!--header navbar of users-->

 

<!--bootstrap script-->

 
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->

<script type="text/javascript" src="../admin/js/jquery.min.js"></script>

<script type="text/javascript" src="./js/loader.js"></script>

<!--<script type="text/javascript" src="./bootstrap3/js/bootstrap.min.js"></script>-->
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>-->

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->




 


