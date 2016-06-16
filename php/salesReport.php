<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rmsdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
require('../fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B","20");


$processedby = $_POST['processedby'];
$from = $_POST['from'];
$to = $_POST['to'];
$sql = "SELECT * FROM sales WHERE trans_date between '$from' and 
'$to' order by trans_date asc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row_cnt = $result->num_rows;
   		$pdf->Image('../images/wfc logo2.png',80,0,-300);
   		$pdf->MultiCell(205, 40,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","12");
        $pdf->Cell(0,0,"Sales Report",0,1,"C");
        $pdf->SetFont("Arial","B","9");
        $pdf->MultiCell(205, 7,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->Cell(0,0,"3rd Floor, Yo Sing Bldg. F. Ramos St. Cebu City, North",0,1,"C");
        $pdf->MultiCell(205, 6,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","9");
        $pdf->SetX(20);
        $pdf->Cell(0,0,"Date: from - $from to $to",0,1,"");
        $pdf->SetX(20);
        $pdf->Cell(0,6,"Prepared by: $processedby",0,1,"");
        $pdf->SetX(20);
        $pdf->Cell(0,6,"Total Transactions: $row_cnt",0,1,"");
        $pdf->MultiCell(205, 0,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","9");
        $pdf->SetX(20); 
        $pdf->Cell(40, 6,"Payment Type",1,0);
        $pdf->Cell(40, 6,"Processed By",1,0);
        $pdf->Cell(50, 6,"Transaction Date",1,0);
        $pdf->Cell(30, 6,"Total Amount",1,1);
       
        
        $pdf->SetFont("Arial","","9");
    while($row = $result->fetch_assoc()) {
    	
        
        $pdf->SetX(20);
        $pdf->Cell(40, 6,$row['payment_type'],1,0);
        $pdf->Cell(40, 6,$row['verify'],1,0);
        $pdf->Cell(50, 6,$row['trans_date'],1,0);
        $pdf->Cell(30, 6,$row['amount'],1,1);

       
        

        
    }
    //$query = "SELECT SUM(amount) AS value_sum FROM sales WHERE trans_date between '$from' and '$to'"; 
$query = "SELECT SUM(amount) AS value_sum FROM sales WHERE trans_date between '$from' and '$to'";
$result = $conn->query($query);

$row = $result->fetch_assoc();
        $sum = $row['value_sum'];
        $pdf->SetX(20);
        
        $pdf->Cell(40, 6,'',1,0);
        $pdf->Cell(40, 6,'',1,0);
        $pdf->Cell(50, 6,'Total Sales',1,0);
        $pdf->Cell(30, 6,$sum,1,1);
} else {
    $pdf->Cell(30, 6,"0 results",1,1);
    $pdf->Cell(30, 6,$from,1,1);
    $pdf->Cell(30, 6,$to,1,1);
}






ob_end_clean();
$pdf->Output();