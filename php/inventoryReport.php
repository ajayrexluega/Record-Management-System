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

$strText = '';
$processedby = $_POST['processedby'];
$date = $_POST['date'];

$sql = "select * from inventory";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row_cnt = $result->num_rows;
   		$pdf->Image('../images/wfc logo2.png',80,0,-300);
   		$pdf->MultiCell(205, 40,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","12");
        $pdf->Cell(0,0,"Inventory Report",0,1,"C");
        $pdf->SetFont("Arial","B","9");
        $pdf->MultiCell(205, 7,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->Cell(0,0,"3rd Floor, Yo Sing Bldg. F. Ramos St. Cebu City, North",0,1,"C");
        $pdf->MultiCell(205, 7,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","9");
        $pdf->Cell(0,0,"Date: $date",0,1,"");
        $pdf->Cell(0,10,"Prepared by: $processedby",0,1,"");
        //$pdf->Cell(0,10,"Total: $row_cnt",0,1,"");
        $pdf->MultiCell(205, 0,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","9");
        $pdf->Cell(30, 6,"Product ID",1,0);
        $pdf->Cell(70, 6,"Product Name",1,0);
        $pdf->Cell(70, 6,"Description",1,0);
        $pdf->Cell(20, 6,"Stocks",1,1);
        //$pdf->Cell(20, 10,"Price",1,1);
        $pdf->SetFont("Arial","","9");
    while($row = $result->fetch_assoc()) {
    	
        
    
        $pdf->Cell(30, 6,$row["product_id"],1,0);
        $pdf->Cell(70, 6,$row['product_name'],1,0);
        $pdf->Cell(70, 6,$row['description'],1,0);
        $pdf->Cell(20, 6,$row['available_stocks'],1,1);
        //$pdf->Cell(20, 10,$row['price'],1,1);

        
    }
} else {
    echo "0 results";
}


ob_end_clean();
$pdf->Output();
