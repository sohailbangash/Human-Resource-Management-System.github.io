 <?php include '../include/db.php';?>  
<?php

      if(isset($_GET['detail'])){
         $pay_id= $_GET['detail'];
      
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
    $pdf->Cell(190,10,"Human Resource Management System",0,1,"C");
	$pdf->setFont("Arial",null,12);

	$pdf->Cell(190,10,"Payslip  ",0,1,"C");
	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(10,10,"Employee Name",0,0);
	$pdf->Cell(60,10,": ",0,1,"C");
	$pdf->Cell(130,-10,"Department",0,0,"R");
	$pdf->Cell(170,-10,": ",0,0);
	$pdf->Cell(30,0,"",0,1);
	$pdf->Cell(10,10,"Father Name",0,0);
	$pdf->Cell(60,10,": ",0,1,"C");
	$pdf->Cell(130,-10,"Designation",0,0,"R");
	$pdf->Cell(170,-10,": ",0,0);
	$pdf->Cell(30,0,"",0,1);
	$pdf->Cell(10,10,"Gender",0,0);
	$pdf->Cell(60,10,": ",0,1,"C");
	$pdf->Cell(125,-10,"Pay Date",0,0,"R");
	$pdf->Cell(170,-10,": ",0,0);
	
	
	
	$pdf->Cell(50,10,"",0,1);


	$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(45,10,"Total Salary",1,0,"C");
	$pdf->Cell(45,10,"Per day Salary",1,0,"C");
	$pdf->Cell(45,10,"Absent Salary",1,0,"C");
	$pdf->Cell(45,10,"Worked day",1,1,"C");
	
	$pdf->Cell(10,10,"1",1,0,"C");
	$pdf->Cell(45,10,"",1,0,"C");
	$pdf->Cell(45,10,"",1,0,"C");
	$pdf->Cell(45,10,"",1,0,"C");
	$pdf->Cell(45,10,"",1,1,"C");
	
	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(190,10,"Absent day",0,1,"C");
	$pdf->Cell(190,10,"",0,1,"C");
	
	

	

	$pdf->Cell(50,10,"",0,1);

	$pdf->Cell(50,10,"Overtime",1,0,"C");
	$pdf->Cell(50,10,"",1,0,"C");
	$pdf->Cell(50,10,"Other Deduction",1,0,"C");
	$pdf->Cell(40,10,"",1,0,"C");
	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"Net Salary",1,0,"C");
	$pdf->Cell(50,10,"",1,0,"C");
	$pdf->Cell(50,10,"",0,1);
	
	
	

	$pdf->Cell(180,20,"Signature",0,0,"R");

//	$pdf->Output("invoice/PDF_INVOICE.pdf","F");
	$pdf->Output();	





?>           
            
          
          
          
        
          
         
        
