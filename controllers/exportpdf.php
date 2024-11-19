<?php

class Exportpdf_Controller
{
	public $baseName = 'home';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		if($_SESSION['userlevel'] != '1__'){
            $view = new View_Loader('home_main');
        }else{
			include_once(SERVER_ROOT.'models/export_model.php');
			$export = new Export_Model();

			$retData = $export->get_data();
			
			

			//var_dump($retData);

			require('./fpdf/fpdf.php');
			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('times', '', 12);
			$pdf->Cell(10, 10, "ID");
			$pdf->Cell(25, 10, utf8_decode("Vezetéknév"));
			$pdf->Cell(25, 10, utf8_decode("Keresztnév"));
			$pdf->Cell(20, 10, utf8_decode("Felh.név"));
			$pdf->Cell(50, 10, utf8_decode("Email"));
			$pdf->Cell(30, 10, utf8_decode("Telefonszám"));
			$pdf->Cell(10, 10, utf8_decode("Jog"));
			$pdf->Ln();
		
			foreach($retData['felhasznalok'] as $row){
				
				$pdf->Cell(10, 10, utf8_decode($row['userid']), 1);
				$pdf->Cell(25, 10, utf8_decode($row['userlastname']), 1);
				$pdf->Cell(25, 10, utf8_decode($row['userfirstname']), 1);
				$pdf->Cell(20, 10, utf8_decode($row['username']), 1);

				$pdf->Cell(50, 10, utf8_decode($row['email']), 1);
				$pdf->Cell(30, 10, utf8_decode($row['phone']), 1);
				$pdf->Cell(10, 10, utf8_decode($row['userlevel']), 1);
				$pdf->Ln();
			}
			// PDF kimenet
			$pdf->Output('D', 'felhasznalok.pdf'); // Letöltés





			
			$view = new View_Loader('adminexport_main');
			
		}

		
	}
}

?>

