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
$sql = "select id, firstname, lastname, gender, time, time_out, datestamp from walkin_member where datestamp between '$from' and 
'$to' order by datestamp asc";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row_cnt = $result->num_rows;
   		$pdf->Image('../images/wfc logo2.png',80,0,-300);
   		$pdf->MultiCell(205, 40,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","12");
        $pdf->Cell(0,0,"Walkin Log Report",0,1,"C");
        $pdf->SetFont("Arial","B","9");
        $pdf->MultiCell(180, 7,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->Cell(0,0,"3rd Floor, Yo Sing Bldg. F. Ramos St. Cebu City, North",0,1,"C");
        $pdf->MultiCell(180, 6,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","9");
        $pdf->Cell(0,0,"Date: from - $from to $to",0,1,"");
        $pdf->SetLeftMargin(165);
        $pdf->Cell(0,4,"Prepared by: $processedby",0,1,"");
        $pdf->SetLeftMargin(30);
        $pdf->Cell(0,6,"Total Logs: $row_cnt",0,1);
        $pdf->SetLeftMargin(9);
        $pdf->MultiCell(205, 0,$strText, 0, 'J', 0, 1, '', '', true, null, true);
        $pdf->SetFont("Arial","B","9");
        $pdf->Cell(50, 6,"Full Name",1,0);
        $pdf->Cell(30, 6,"Gender",1,0);
        $pdf->Cell(30, 6,"Time-in",1,0);
        $pdf->Cell(30, 6,"Time-out",1,0);
        $pdf->Cell(50, 6,"Date",1,1);
        $pdf->SetFont("Arial","","9");
    while($row = $result->fetch_assoc()) {
    	
        $fullname = $row["firstname"]. " " . $row["lastname"];
    
        $pdf->Cell(50, 6,"$fullname",1,0);
        $pdf->Cell(30, 6,$row['gender'],1,0);
        $pdf->Cell(30, 6,$row['time'],1,0);
        $pdf->Cell(30, 6,$row['time_out'],1,0);
        $pdf->Cell(50, 6,$row['datestamp'],1,1);

        
    }
} else {
    echo "0 results";
}


ob_end_clean();
$pdf->Output();
