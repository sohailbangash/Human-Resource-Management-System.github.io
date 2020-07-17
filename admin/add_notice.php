<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>

<?php
     if(isset($_POST['add'])){
        
        $title   =$_POST['title'];
        $date   =$_POST['date'];
        $description =$_POST['des'];
         $mess='';
       

        
        $query="INSERT INTO notice_info(notice_title,notice_description,date)"; 
        $query.="VALUES('$title','$description','$date')";
         
         
        $notice_res=mysqli_query($conn,$query);
         
    
         
        
        if($notice_res == true){
        
          $mess .="<div style='border-radius: 10px;' class='alert alert-success'> Notice Successfully Done !! <strong> Thank You!!</strong>  </div>";
            echo '<META http-equiv="refresh" content="2;add_notice.php">';
        
        }else{
		 $mess .="<div style='border-radius: 10px;' class='alert alert-danger'><strong> Sorry!!</strong> Something Wrong !!   </div>";
         echo '<META http-equiv="refresh" content="2;add_notice.php">';
	}
            
	
	
     }

?>



        <div class="container-fluid" style="margin-top:70px;">
<!--             Page Heading -->
           <div id="page-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12  col-x-12  bg-dark" style="color:white;box-shadow:5px 5px 18px #888888;height:80px;background: radial-gradient(#0e0e0e, #bbb6b6);border-radius: 30px;"  id="content">
                   
                    <h1 class="text-center" style="color:white;box-shadow:5px 0px 18px #888888">  <strong>Enter New Notice's</strong></h1>
                </div>
            </div>
            
            <h5>       
            <a class="btn btn-info btn-xs" style="color:black;box-shadow:5px 5px 18px #959e97;margin-top:25px" href="view_notice.php"><strong>View Notice's</strong> <i class="glyphicon glyphicon-eye-open"></i></a>
                     
            </h5>
            
            
       
            
              <div class="col-md-10 text-center well offset-1" >
              
               
               <div class="panel panel-default mg-top">
                <div class="panel-body" style="background: linear-gradient(180deg, #696363, transparent);">
                    
                  <span ><?php if(isset($mess)){echo $mess;}?></span>
             <form action="" id="" method="post" enctype="multipart/form-data" style="padding-top:20px">
                  

            
                   <div class="form-group row">
                    <label for="inputfullname" class="col-sm-2 col-form-label" style="text-align: -webkit-right;color:white">Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name='title' id="" placeholder="Enter you name"  autofocus required>
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="inputDOB" class="col-sm-2 col-form-label" style="text-align: -webkit-right;color:white">Last Date</label>
                    <div class="col-sm-8">
                      <input type="date" class="form-control" name="date"  id="" required>
                    </div>
                 </div>
                   
                     <div class="form-group row">
                    <label for="inputdescription :" class="col-sm-2 col-form-label" style="text-align: -webkit-right;color:white">Description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control tinymce" name="des" id="" cols="30" rows="20"  required>
                          
                      </textarea>
                    </div>
                                         

                     </div>
                        
                        <input type="submit" name="add" class="btn btn-success  btn-md" value="Add Notice"> 
                       
                        
              
                    </form>  
                
                </div>
                
                  </div>
            
       </div>
    </div>
</div>

 
       
        