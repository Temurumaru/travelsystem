<?php

require('fpdf/fpdf.php');

class PDF extends FPDF {

	// Get data from the text
	function getDataFrmText($text) {

		// Read text lines
		$lines = explode("\n", $text);

		// var_dump($lines);
	
		// Get a array for returning output data
		$data = array();
	
		// Read each line and separate the semicolons
		foreach($lines as $line)
			$data[] = explode(';', chop($line));
		return $data;
	}

	// Simple table
	function getSimpleTable($header, $data) {
	
		// Header
		foreach($header as $column)
			$this->Cell(40, 7, $column, 1);
		$this->Ln(); // Set current position
	
		// Data
		foreach($data as $row) {
			foreach($row as $col)
				$this->Cell(40, 6, $col, 1);
			$this->Ln(); // Set current position
		}
	}

	// Get styled table
	function getStyledTable($header, $data) {
	
		// Colors, line width and bold font
		$this->SetFillColor(80, 175, 67);
		$this->SetTextColor(255);
		$this->SetDrawColor(128, 0, 0);
		$this->SetLineWidth(.3);
		$this->SetFont('', 'B');
		
		// Header
		$colWidth = array(15, 70, 45, 60);
		for($i = 0; $i < count($header); $i++)
			$this->Cell($colWidth[$i], 10,
						$header[$i], 1, 0, 'C', 1);	
		$this->Ln();
	
		// Setting text color and color fill
		// for the background
		$this->SetFillColor(224, 235, 255);
		$this->SetTextColor(0);
		$this->SetFont('');
	
		// Data
		$fill = 0;
		foreach($data as $row) {
		
			// Prints a cell, first 2 columns are left aligned
			$this->Cell($colWidth[0], 8, $row[0], 'LR', 0, 'L', $fill);
			$this->Cell($colWidth[1], 8, $row[1], 'LR', 0, 'L', $fill);
		
			// Prints a cell,last 2 columns are right aligned
			$this->Cell($colWidth[2], 8, ($row[2]),
						'LR', 0, 'R', $fill);
			$this->Cell($colWidth[3], 8, ($row[3]),
						'LR', 0, 'R', $fill);
			$this->Ln();
			$fill=!$fill;
		}
		$this->Cell(array_sum($colWidth), 0, '', 'T');
	}
}
	// Instantiate a PDF object
	$pdf = new PDF();

	// Column titles given by the programmer
	$header = array('Oy',"ASOSIY QARZNI TO'LASH","TO'LOV %"	,'JAMI');

	// Get data from the texts
	$data = $pdf->getDataFrmText(@$_POST['table']);


	// Set the font as required
	$pdf->SetFont('Arial', '', 34);

	// Add a new page
	$pdf->AddPage();
	$logoFile = "logo_pdf.png";
	$logoXPos = 85;
	$logoWidth = 35;
	$pdf->Image( $logoFile, $logoXPos, null, $logoWidth );

	$pdf-> Ln();
	$pdf->Cell( 0, 20, "Differencial", 0, 0, 'C' );
	$pdf->SetFont('Arial', '', 14);
	$pdf-> Ln();
	$pdf->Cell( 0, 20, @$_POST['car'], 0, 0, 'L' );
	$pdf-> Ln();
	$pdf->Cell( 0, 20, @$_POST['data'], 0, 0, 'L' );
	$pdf-> Ln();
	
	$pdf->getStyledTable($header,$data);
	$pdf->Output();
?>
