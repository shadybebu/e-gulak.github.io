<?php
require_once 'fpdf/fpdf.php';
require_once 'expensesdb.php';

$sql = "SELECT * FROM expenses";
$result = mysqli_query($con, $sql);

if(isset($_POST['btn_pdf'])) {
    $pdf = new FPDF( 'P', 'mm', 'A4' );
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Expense Report', 0, 1, 'C', 0);
    $pdf->Ln(10); 
    $pdf->Cell(25, 10, 'Amount', 1, 0, 'C', 0);
    $pdf->Cell(40, 10, 'Date', 1, 0, 'C', 0);
    $pdf->Cell(35, 10, 'Category', 1, 1, 'C', 0);

    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(25, 10,  $row['amount'], 1, 0, 'C', 0);
        $pdf->Cell(40, 10, $row['date'], 1, 0, 'C', 0);
        $pdf->Cell(35, 10, $row['category'], 1, 1, 'C', 0);
    }

    // Output the PDF
    $pdf->Output(); 
}
?>
