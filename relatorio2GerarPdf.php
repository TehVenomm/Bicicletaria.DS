<?php
require('fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData()
{
	include "conexao.php";
	$sql = "SELECT u.email AS email, P.nome AS nome, P.telefone AS telefone
			FROM usuario AS U
			LEFT JOIN pessoa AS P ON u.idUsuario = P.idUsuario_Pessoa
			WHERE U.idListaPerfil_Usuario != 4";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute();
	
    // Read file lines

    $data = array();

    foreach($contatos as $line){	
		$email = $line['email'];
		$nome = $line['nome'];								
		$telefone = $line['telefone'];
		
		if (is_null($nome)){
			$nome = " - ";
		}
		
		if (is_null($telefone)){
			$telefone = " - ";
		}
	
		array_push($data, $email);
		array_push($data, $nome);
		array_push($data, $telefone);


		
	}		
    return $data;
}

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
	$contador = 0;
    foreach($data as $row)
    {
		$contador++;
		if ($contador % 4 == 0){
			$this->Ln();
		}
        $this->Cell(40,6,$row,1);

    }
}

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('E-Mail', 'Nome', 'Telefone');
// Data loading
$data = $pdf->LoadData();
$pdf->SetFont('Arial','',10);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
?>



