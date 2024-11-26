<?php
require_once('tcpdf/tcpdf.php');
include('bdd.php');

// Créer une nouvelle instance de TCPDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Votre Nom');
$pdf->SetTitle('Liste de la Cavalerie');
$pdf->SetSubject('Liste de la Cavalerie');
$pdf->SetKeywords('TCPDF, PDF, exemple, test, guide');

// Ajouter une page
$pdf->AddPage();

// Définir les marges
$pdf->SetMargins(15, 15, 15);

// Définir le titre
$pdf->SetFont('helvetica', 'B', 20);
$pdf->Cell(0, 10, 'Liste de la Cavalerie', 0, 1, 'C');

// Définir les en-têtes du tableau
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Numéro SIRE', 1);
$pdf->Cell(40, 10, 'Nom du Cheval', 1);
$pdf->Cell(30, 10, 'Date de Naissance', 1);
$pdf->Cell(30, 10, 'Photo', 1);
$pdf->Cell(20, 10, 'Garot', 1);
$pdf->Cell(20, 10, 'ID Race', 1);
$pdf->Cell(20, 10, 'ID Robe', 1);
$pdf->Ln();

// Récupérer les données de la cavalerie
$sql = "SELECT * FROM cavalerie";
$result = $con->query($sql);

// Ajouter les données au tableau
$pdf->SetFont('helvetica', '', 10);
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 10, $row['idcavalerie'], 1);
    $pdf->Cell(30, 10, $row['numsire'], 1);
    $pdf->Cell(40, 10, $row['nomcheval'], 1);
    $pdf->Cell(30, 10, $row['datenacheval'], 1);
    $pdf->Cell(30, 10, $row['photo'] ? 'Oui' : 'Non', 1);
    $pdf->Cell(20, 10, $row['garot'], 1);
    $pdf->Cell(20, 10, $row['idrace'], 1);
    $pdf->Cell(20, 10, $row['idrobe'], 1);
    $pdf->Ln();
}

// Sauvegarder le PDF
$pdf->Output('liste_cavalerie.pdf', 'D');
?>
