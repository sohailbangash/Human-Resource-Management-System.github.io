 <?php include '../include/db.php';?> 
<?php
     
       if(isset($_GET['notice_id'])){
         $print_id= $_GET['notice_id'];
      
   $query="select  notice_id,notice_title,notice_description,date from notice_info where notice_id='$print_id' ";
                        
             $view_query=mysqli_query($conn,$query);
                          
            while($row=mysqli_fetch_array($view_query)){
               $notic_id    =$row['notice_id']; 
               $notic_date  =$row['date'];
               $notic_title =$row['notice_title'];
               $des        =$row['notice_description'];


            }


   require("../fpdf/fpdf.php");
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->setFont("Arial","B",16);
//    $pdf->Image('../../images/hrmlogo.png',5,6,10);
    $pdf->Cell(190,10,"Human Resource Management System",0,1,"C");
	$pdf->setFont("Arial",null,12);

	$pdf->Cell(190,10,"Download Notice",0,1,"C");
 
           
	$pdf->Cell(50,10,"Notice Title:",0,0);
	$pdf->Cell(30,10,"$notic_title",0,1,"L");
	$pdf->Cell(130,-10,"Issue Date:",0,0,"R");
	$pdf->Cell(170,-10,"$notic_date",0,0);
	$pdf->Cell(30,0,"",0,1);

	$pdf->Cell(50,10,"Description",0,0,);
	$pdf->Cell(60,20,"$des",0,1,"L");


	$pdf->Output();	

       }


?>           
            
          
          
          
        
          
         
        
