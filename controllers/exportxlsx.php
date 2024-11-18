<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Exportxlsx_Controller
{
    public $baseName = 'home';  // meghatározni, hogy melyik oldalon vagyunk

    public function main(array $vars) // a router által továbbított paramétereket kapja
    {
        if ($_SESSION['userlevel'] != '1__') {
            $view = new View_Loader('home_main');
        } else {
            include_once(SERVER_ROOT . 'models/export_model.php');
            $export = new Export_Model();

            $retData = $export->get_data();

            require 'vendor/autoload.php';

            

            // Új Excel fájl létrehozása
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            
			$sheet->setCellValue('A1', 'ID');
			$sheet->setCellValue('B1', 'Vezetéknév');
			$sheet->setCellValue('C1', 'Keresztnév');
			$sheet->setCellValue('D1', 'Felhasználónév');
			$sheet->setCellValue('E1', 'Email');
			$sheet->setCellValue('F1', 'Telefonszám');
			$sheet->setCellValue('G1', 'Jog');
			
			// Adatok hozzáadása
			$row = 2; // Az első sor már foglalt, így a második sortól kezdjük
			foreach ($retData['felhasznalok'] as $felhasznal) {
				$sheet->setCellValue('A' . $row, $felhasznal['userid']);
				$sheet->setCellValue('B' . $row, $felhasznal['userlastname']);
				$sheet->setCellValue('C' . $row, $felhasznal['userfirstname']);
				$sheet->setCellValue('D' . $row, $felhasznal['username']);
				$sheet->setCellValue('E' . $row, $felhasznal['email']);
				$sheet->setCellValue('F' . $row, $felhasznal['phone']);
				$sheet->setCellValue('G' . $row, $felhasznal['userlevel']);
				
				$row++; // Következő sor
			}
			
			// Fejlécek beállítása, hogy az Excel megfelelően jelenítse meg
			foreach (range('A', 'F') as $column) {
				$sheet->getColumnDimension($column)->setAutoSize(true); // Automatikus oszlop szélesség
			}

            // Fejlécek beállítása
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="felhasznalok.xlsx"');
            header('Cache-Control: max-age=0');

            // Fájl generálása és elküldése a böngészőnek
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
            exit;
        }
    }
}
