 <?php
//     $query="select * from task_info left join employee_info on employee_info.emp_id = task_info.emp_id ";
//
//       $query_result=mysqli_query($conn,$query);
//    
//     
//          while($row=mysqli_fetch_array($query_result)){
//                       $task_id   =$row['task_id'];
//                        $emp_id     =$row['emp_id'];
//                        $emp_name   =$row['emp_name'];
//                        $task_date  =$row['date'];
//                        $task_title =$row['task_title'];
//                        $l_date   =$row['last_date']; 
//                        $details=$row['detail']   
//
//
//
//          }







   require("../fpdf/fpdf.php");
	$pdf = new FPDF();
    $pdf = new FPDF();
	$pdf->AddPage();
	$pdf->Cell(190,0,"",1,0,"C");
	$pdf->Cell(50,5,"",0,1);

	$pdf->setFont("Arial","B",16);
    $pdf->Image('../../images/hrmlogo.png',10,6,30);
	$pdf->Cell(190,10,"Human Resource Management System",0,1,"C");
	$pdf->setFont("Arial",null,12);
   //lowerline
    $pdf->Cell(50,5,"",0,1);
    $pdf>Cell(80,2,"**************************************************************************************************************",0,1);
	//
	$pdf->Cell(50,5,"",0,1);
    $pdf->setFont("Arial","",13);
	$pdf->Cell(60,10,"Title : $title",0,1,"C");
	$pdf->Cell(50,2,"",0,1);
    $pdf->setFont("Arial","",10);
	$pdf->Cell(80,10,"Last Date Of Submittion : $l_date",0,1,"C");
	$pdf->Cell(50,2,"",0,1);
    $pdf->Cell(80,2,"************************************************************************************************************************************",0,1);
    $pdf->Cell(50,2,"",0,1);
	$pdf->setFont("Arial","B",12);
	$pdf->Cell(10,10,"Description :",0,1);
	$pdf->setFont("Arial","",10);
	$pdf->MultiCell(180, 8, $details,0,1);
	
	
	
	
	
	$pdf->Cell(150,20,"Signature",0,0,"R");
//	$pdf->Output("invoice/PDF_INVOICE.pdf","F");
	$pdf->Output();	





?>           
            
          
          
          
        
          
         
        
