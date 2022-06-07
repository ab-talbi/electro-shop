<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('./client_images/128.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',10);
    // Décalage à droite
    $this->Cell(130);
    // Titre
    $this->Cell(30,10,'Facture n  ','',0,'B');
    // Saut de ligne
    $this->Ln(9);
    // Décalage à droite
    $this->Cell(130);
    // Titre
    $this->Cell(30,10,'Date  ','',0,'B');
    // Saut de ligne
    $this->Ln(9);
    // Décalage à droite
    $this->Cell(130);
    // Titre
    $this->Cell(30,10,'command  ','',0,'B');
    
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 6 cm du bas
    $this->SetY(-50);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(140);
    //signature
    $this->Cell(30,10,'Signature:',0,0,'B');
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    //.'/{nb}' 
}
}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
// Positionnement à 6 cm du bas
$pdf->SetY(60);
// Police Arial gras 15
$pdf->SetFont('Arial','',15);
$pdf->Cell(30,10,'Facture a:',0,0,'B');
// Saut de ligne
$pdf->Ln(9);
$pdf->SetFont('Times','',12);
$pdf->Write(7,"  rue abdelkrime lkhtabi,\n  Marrakech,Maroc");

// Positionnement à 6 cm du bas
$pdf->SetY(60);
// Police Arial gras 15
$pdf->SetFont('Arial','',15);
// Décalage à droite
$pdf->cell(90);
$pdf->cell(30,10,'Envoye a:',0,0,'B');
// Saut de ligne
$pdf->Ln(9);
// Décalage à droite
$pdf->cell(92);
$pdf->SetFont('Times','',12);
$pdf->cell(0,10,'rue abdelkrime lkhtabi, Marrakech,Maroc',0,0,'');


//tablaeu

// Positionnement à 9 cm du bas
$pdf->SetY(90);
$pdf->cell(20,10,'QTE','TBLR',0,'C');

$pdf->cell(80,10,'DESIGNATION','TBLR',0,'C');

$pdf->cell(40,10,'PRIX UNIT HT','TBLR',0,'C');

$pdf->cell(50,10,'MONTANT HT','TBLR',0,'C');
// Saut de ligne
$pdf->Ln(10);


for($i=1;$i<=4;$i++){

    $pdf->cell(20,10,'10','LBR',0,'C');

    $pdf->cell(80,10,'ECRAN','BR',0,'C');

    $pdf->cell(40,10,'999.99','BR',0,'C');

    $pdf->cell(50,10,'9990.99','BR',0,'C');
    // Saut de ligne
    $pdf->Ln(10);

}

// Décalage à droite
$pdf->cell(100);
$pdf->cell(40,10,'TOTAL HT','',0,'C');
$pdf->cell(50,10,'100000.00','RL',0,'C');
// Saut de ligne
$pdf->Ln(10);

// Décalage à droite
$pdf->cell(100);
$pdf->cell(40,10,'TVA 20.0%','',0,'C');
$pdf->cell(50,10,'1000.00','BRL',0,'C');
// Saut de ligne
$pdf->Ln(10);

// Décalage à droite
$pdf->cell(100);
$pdf->cell(40,10,'TOTAL','',0,'C');
$pdf->cell(50,10,'1000000.00','BRL',0,'C');
// Saut de ligne
$pdf->Ln(10);

$pdf->Output();
?>
