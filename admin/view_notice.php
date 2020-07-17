<?php include('include/admin_header.php');?>

<?php include('include/admin_sidebar.php');?>

<!--//     select  all checkboxes function-->
<?php
     
    if(isset($_POST['checkboxArray'])){
       foreach($_POST['checkboxArray'] as $checkbox){
         $block_options=$_POST['block_options'];
          $mess='';
         switch($block_options){
                         
            case 'delete':
            $query="delete from  notice_info where  notice_id={$checkbox} "; 
             $delete_result=mysqli_query($conn,$query);
                 
             if($delete_result == true){
        
          $mess .="<div  class='alert alert-success' style='width: 690px;
    text-align: center;margin-left: 260px;'>Notice Successfully Delete <strong> Thank You!!</strong>  </div>";
            echo '<META http-equiv="refresh" content="2;view_notice.php">'; 
        
        
	}
	else{
		 $mess .="<div style='width: 690px;
    text-align: center;margin-left: 260px;' class='alert alert-danger'><strong> Sorry!!</strong> Something Wrong !!   </div>";
        echo '<META http-equiv="refresh" content="2;view_notice.php">'; 
	}
                 
    

              break;
                 
                 
         }
           
         }
  }



     if(isset($_POST['update'])){
          $notice_id =$_POST['notice_id'];
          $notice_title=$_POST['title'];
          $notice_des=$_POST['description'];
          $notice_date=$_POST['date'];
         
          $mess='';
     $query="UPDATE notice_info SET notice_title='$notice_title',notice_description='$notice_des',date='$notice_date' where notice_id='$notice_id' ";
         
    $update_query=mysqli_query($conn,$query);
         
       if($update_query == true){
           $mess.='<div class="alert alert-dismissible alert-success">
                 <strong>Congratulations !</strong><i> Notice Updateded Successfully!!
                 </i> </div>';
          echo '<META http-equiv="refresh" content="2;view_notice.php">';
           
       }else{
             $mess.='<div class="alert alert-dismissible alert-danger">
                   <strong>SORRY !</strong>Notice Not Updateded!!
                    </div>'; 
         echo '<META http-equiv="refresh" content="2;view_notice.php">';
       }
    
     
     }







?>




<div class="container-fluid" style="margin-top:60px;">
    <!--             Page Heading -->

    <div id="page-wrapper">
        <div class="col-sm-12 col-md-12  col-xl-12">
        <h1 class="text-center " style="color: #e41212;box-shadow: 5px 0px 18px #888888;background: lightgray;"><strong>Notice's Board</strong></h1>

    </div>

        <h5>
            <a class="btn btn-warning btn-xs" style="color:black;box-shadow:5px 5px 18px #959e97;margin-top:24px;" href="add_notice.php">Add New Notice + <i class='fa fa-pencil'></i></a>

        </h5>

        <?php if(isset($mess)){echo $mess;}?>

        <!-- view all notice show in table form -->

        <form action="" method="post" enctype="multipart/form-data" style="margin-top:30px;">

            <div id="blockoptions" style='padding:0px;' class="col-xs-3">

                <select class="form-control" name="block_options" id="" style="color:red">

                    <option value="delete">Click to Checked Delete All Data </option>
                </select>

            </div>
            <div class="col-xs-4">
                <input type='submit' class='btn btn-danger' value='Delete All'>
            </div>



            <div class="panel">
                <table class="table table-bordered table-lg table-hover" style="box-shadow: 5px 5px 20px #6d6d6d;background:linear-gradient(360deg, #5c5e5f9e, #38383800);">

                    <thead style="background: linear-gradient(45deg, #212020, #1b0f0f3d);
                 color: aliceblue;">
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Details</th>
                            <th>Publish Date</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                 $query="select  notice_id,notice_title,notice_description,date from notice_info ";
                        
             $view_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($view_query)){
               $notic_id    =$row['notice_id']; 
               $notic_date  =$row['date'];
               $notic_title =$row['notice_title'];
               $des        =substr($row['notice_description'],0,50);

               
                
            
                
            echo "<tr>";
             ?>
                        <td><input class='checkbox' type='checkbox' name='checkboxArray[]' value='<?php echo $notic_id;?>'></td>
                        <?php
            echo "<td>$notic_id</td>";
            echo "<td>$notic_title</td>";
            echo "<td>$des</td>"; 
            echo "<td>$notic_date</td>";
            echo"<td class='text-center'> 
            
                <a href='#viewModal$notic_id' class='btn btn-outline-primary btn-sm border-right'   data-toggle='modal'><i class='fa fa-folder-open'></i>  View Notice</a> 
                
                   <a  href='print_fpdf/notice_slip.php?notice_id=$notic_id' class='btn btn-outline-primary btn-sm border-right'><i style='color: black'class='glyphicon glyphicon-print'></i>  print</a> 
                 
                 <a href='#editModal$notic_id' class='btn btn-outline-success btn-sm border-right' data-toggle='modal' data-target=''><i class='fa fa-pencil'></i>  Edit Notice</a>
               
                  <a href='#deleteModal$notic_id' class='btn btn-outline-danger btn-sm' data-toggle='modal' data-target=''><i class='fa fa-trash'></i>  Delete</a>
                          
                  </td>";
            
            echo "</tr>";
            
            }
                        
            
        ?>




                    </tbody>
                </table>

            </div>
        </form>





   
</div>

<!--   Modal for view Notice-->

<?php
                     
            $query="select  notice_id,notice_title,notice_description,date from notice_info ";
                        
             $view_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($view_query)){
               $notic_id    =$row['notice_id']; 
               $notic_date  =$row['date'];
               $notic_title =$row['notice_title'];
               $des        =$row['notice_description'];

        ?>


<!--   Modal for view Notice-->


<div class="modal fade" id="viewModal<?php echo  $notic_id; ?>" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#a2ddff2e;box-shadow: 0px 6px 5px #191818;">
                <h3 class="modal-title" id="exampleModalLongTitle"><strong>View Notice</strong></h3>
                <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background:#86c9f1ba">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <?php echo "<h3><b>Title :</b></h3>" .$notic_title."<p class='text-right'><strong>Date</strong> :".$notic_date."</p>";?>
                        <hr>

                          <label for="" ><h3><strong>Description:</strong></h3></label>
                        <textarea class="form-control" cols="30" rows="10" readonly><?php echo $des?></textarea>
                    </div>

                </div>
            </div>
            <div class="modal-footer" style="background:#a2ddff2e">
                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<?php    }?>





<!--   Modal for Edit Notice-->

<?php
                     
            $query="select  notice_id,notice_title,notice_description,date from notice_info ";
                        
             $view_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($view_query)){
               $notic_id    =$row['notice_id']; 
               $notic_date  =$row['date'];
               $notic_title =$row['notice_title'];
               $des        =$row['notice_description'];

        ?>


<!--   Modal for Edit Notice-->


<div class="modal fade" id="editModal<?php echo  $notic_id; ?>" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#8bcca8b5;box-shadow: 0px 6px 5px #191818;">
                <h3 class="modal-title" id="exampleModalLongTitle"><strong>Update Notice</strong></h3>
                <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background:#f1f1f1">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <form action="" method="post">
                            <input type="hidden" value="<?php  echo $notic_id; ?>" name="notice_id">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" value="<?php echo $notic_title ?>" name="title" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="title">Details:</label>

                                <textarea class="form-control tinymce" name="description"><?php echo $des;  ?>
                    </textarea>
                            </div>

                            <div class="form-group">
                                <label for="title"><b>Date:</b></label>
                                <input type="date" class="form-control" value="<?php echo $notic_date ?>" name="date">
                            </div>



                    </div>

                </div>
            </div>
            <div class="modal-footer" style="background:#8bcca8b5">
                <input type="submit" class="btn btn-primary btn-md" name="update" value='Update Notice'>
                <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
            </div>
            </form>

        </div>
    </div>
</div>



<?php    }?>




<!-- delete Modal -->


<?php
                     
            $query="select  notice_id,notice_title,notice_description,date from notice_info ";
                        
             $view_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($view_query)){
               $notic_id    =$row['notice_id']; 
               $notic_date  =$row['date'];
               $notic_title =$row['notice_title'];
               $des        =$row['notice_description'];

        ?>
<!-- delete Modal -->

<div class="modal fade" id="deleteModal<?php echo $notic_id; ?>" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#ff6262a6">
                <h4 class="modal-title" id="exampleModalLongTitle"><strong>Delete Notice</strong></h4>
                <button type="button" class="close" style="color: black;
            font-size: 36px;" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #fffbfbd9; ">
                <h3 style="color:#ff4545;">
                    <stronge>Are You Sure to Delete?</stronge>
                </h3>
            </div>

            <div class="modal-footer" style="background-color: #ff6262a6;">

                <a href='include/delete_notice.php?delete=<?php echo $notic_id; ?>' class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">NO</button>

            </div>

        </div>
    </div>
</div>

<?php } ?>