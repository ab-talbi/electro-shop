<?php
session_start();
require('../fpdf/fpdf.php');

include('../includes/connect.php');

if(isset($_SESSION['facture'])){
    $refference = $_SESSION['facture'];


    $select_commande = $con->query("SELECT * FROM `commande` WHERE random_cmd = $refference");


        $rows_commande = $select_commande->rowCount();
        if($rows_commande>0){

            while($ligne = $select_commande->fetch(PDO::FETCH_OBJ)){

                $total_avant_remise = $ligne->a_payer;
                $remise = $ligne->remise;
                $total_apres_remise = $ligne->total_a_payer;
                $date_commande = $ligne->date_commande;
                $status_commande = $ligne->status_commande;

                //L'etulisateur qui a effectuer la commande
                $id_utilisateur = $ligne->id_utilisateur;

                $select_utilisateur = $con->query("SELECT * FROM `utilisateurs` WHERE id_utilisateur = $id_utilisateur");

                $rows_utilisateur = $select_utilisateur->rowCount();
                if($rows_utilisateur>0){

                    while($utilisateur = $select_utilisateur->fetch(PDO::FETCH_OBJ)){
                        $nom_utilisateur = $utilisateur->nom_utilisateur; 
                        $prenom_utilisateur = $utilisateur->prenom_utilisateur;
                        $email_utilisateur = $utilisateur->email_utilisateur;
                        $adresse_utilisateur = $utilisateur->adresse_utilisateur;
                        $tel_utilisateur = $utilisateur->tel_utilisateur;  
                    }

                }
                //--- End - L'etulisateur qui a effectuer la commande


                //Les infos sur les produits et quantite

                $select_carte_backup = $con->query("SELECT * FROM `carte_backup` WHERE 	id_carte_commande = $refference");
 
                $carte_backup_details = array();

                $rows_carte_backup = $select_carte_backup->rowCount();
                if($rows_carte_backup>0){
                    $compteur = 1;
                    while($carte_backup = $select_carte_backup->fetch(PDO::FETCH_OBJ)){
                        $produit_details = array();

                        $quantite = $carte_backup->quantite;
                        $id_produit = $carte_backup->id_produit;

                        $select_produit = $con->query("SELECT * FROM `produits` WHERE 	id_produit = $id_produit");
 
                        $rows_produit = $select_produit->rowCount();
                        if($rows_produit>0){
        
                            while($produit = $select_produit->fetch(PDO::FETCH_OBJ)){
                                $designation_produit = $produit->nom_produit;
                                $prix_produit_unitaire = $produit->prix_produit;
                                $montant_produit = $prix_produit_unitaire*$quantite;
                            }

                        }
                        array_push($produit_details, $designation_produit, $prix_produit_unitaire,$quantite,$montant_produit);

                        array_push($carte_backup_details,$produit_details);
                    }
                }
                //--- End - Les infos sur les produits et quantite




            }
        }
}else{
    echo "<script>window.open('/Electro-Shop/index.php','_self')</script>";
}



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
    $this->Cell(30,10,'Facture N :  ','',0,'B');
    // Saut de ligne
    $this->Ln(9);
    // Décalage à droite
    $this->Cell(130);
    // Titre
    $this->Cell(30,10,'Date de facture :   '.date("d.m.Y"),'',0,'B');
    // Saut de ligne
    $this->Ln(9);
    // Décalage à droite
    $this->Cell(130);
    // Titre
    $this->Cell(30,10,'Commande N :      '.$_SESSION['facture'],'',0,'B');
    // Saut de ligne
    $this->Ln(9);
    // Décalage à droite
    $this->Cell(130);
    // Titre
    $this->Cell(30,10,"Date d'echeance :  ".date("d.m.Y",strtotime("+4 Days")),'',0,'B');
    
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 6 cm du bas
    $this->SetY(-60);
    // Police Arial gras 15
    $this->SetFont('Arial','B',12);
    // Décalage à droite
    $this->Cell(130);
    //signature
    $this->Cell(30,10,'Signature:',0,0,'C');
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
$pdf->SetY(40);
// Police Arial gras 15
$pdf->SetFont('Arial','I',15);
$pdf->Cell(30,10,'Facture a:',0,0,'B');
// Saut de ligne
$pdf->Ln(9);
$pdf->SetFont('Times','I',11);
$pdf->Write(7," FSTG RUE ABDELKRIME EL KHATABI,\n MARRAKECH, MAROC ");

// Positionnement à 6 cm du bas
$pdf->SetY(54);
// Police Arial gras 15
$pdf->SetFont('Arial','I',15);
// Décalage à droite
$pdf->cell(110);
$pdf->cell(30,10,'Envoye a:',0,0,'B');
// Saut de ligne
$pdf->Ln(9);
$pdf->SetFont('Times','I',11);
$tab_address = explode(" ", $adresse_utilisateur);
for($i=0;$i<count($tab_address);$i++){
    // Décalage à droite
    $pdf->cell(112);
    $pdf->cell(0,7,$tab_address[$i]." ".$tab_address[$i+1]." ".$tab_address[$i+2]." ".$tab_address[$i+3],0,0,'');
    // Saut de ligne
    $pdf->Ln(6);
    $i=$i+3;
}


//tablaeu

// Positionnement à 9 cm du bas
$pdf->SetY(90);

$pdf->cell(80,10,'DESIGNATION','TBLR',0,'C');

$pdf->cell(40,10,'PRIX UNIT','TBLR',0,'C');

$pdf->cell(20,10,'QTE','TBLR',0,'C');

$pdf->cell(50,10,'MONTANT','TBLR',0,'C');
// Saut de ligne
$pdf->Ln(10);


for($i=0;$i<count($carte_backup_details);$i++){

    $pdf->cell(80,10,$carte_backup_details[$i][0],'LBR',0,'C');

    $pdf->cell(40,10,$carte_backup_details[$i][1],'BR',0,'C');

    $pdf->cell(20,10,$carte_backup_details[$i][2],'BR',0,'C');

    $pdf->cell(50,10,$carte_backup_details[$i][3],'BR',0,'C');
    // Saut de ligne
    $pdf->Ln(10);

}

// Décalage à droite
$pdf->cell(100);
$pdf->cell(40,10,'TOTAL','',0,'C');
$pdf->cell(50,10,$total_avant_remise,'RL',0,'C');
// Saut de ligne
$pdf->Ln(10);

// Décalage à droite
$pdf->cell(100);
$pdf->cell(40,10,'Remise '.$remise.'%','',0,'C');
$pdf->cell(50,10,$total_avant_remise*$remise/100,'BRL',0,'C');
// Saut de ligne
$pdf->Ln(10);

// Décalage à droite
$pdf->cell(100);
$pdf->cell(40,10,'TOTAL A PAYER','',0,'C');
$pdf->cell(50,10,$total_apres_remise,'BRL',0,'C');
// Saut de ligne
$pdf->Ln(10);


// Positionnement à 6 cm du bas
$pdf->SetY(-80);
$pdf->SetFont('Arial','B',12);
//signature
$pdf->Cell(30,10,'Mode Paeiment: ',0,0,'C');
// Saut de ligne
$pdf->Ln(10);
// Police Arial gras 15
$pdf->SetFont('Times','I',12);
$pdf->Cell(30,10,$status_commande,0,0,'C');


// Positionnement à 6 cm du bas
$pdf->SetY(-50);
// Décalage à droite
$pdf->Cell(140);
//signature
$pdf->Cell(30,10,'M/Mme.'.$nom_utilisateur.' '.$prenom_utilisateur,0,0,'C');

$pdf->Output();
?>
