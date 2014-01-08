<?php 
App::import('Vendor','xtcpdf');  
$tcpdf = new XTCPDF(); 
$textfont = 'freesans'; 

// add a page (required with recent versions of tcpdf) 
$tcpdf->AddPage(); 

// Now you position and print your page content 
// example: 
$tcpdf->SetTextColor(0, 0, 0); 
$tcpdf->SetFont($textfont,'B',20); 
$tcpdf->Cell(0,14, "Hello World", 0,1,'L'); 
$tcpdf->lastPage();

echo $tcpdf->Output('filename.pdf', 'D'); 

?>