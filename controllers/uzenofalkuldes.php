<?php

class Uzenofalkuldes_Controller
{
    public $baseName = 'uzenofal';  // meghatározni, hogy melyik oldalon vagyunk

    public function main(array $vars) // a router által továbbított paramétereket kapja
    {
        // Ellenőrizzük, hogy a form elküldésre került-e
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Model betöltése
            include_once(SERVER_ROOT.'models/uzenofal_model.php');
            $uzenofalModel = new Uzenofal_Model();  // az osztályhoz tartozó modell

            // A POST adatokat feldolgozzuk
            $vars = [
                'felhasznalo_id'   => $_SESSION['id'],
                'uzenet'   => htmlspecialchars($_POST['message'])
                
            ];

            // A modellben elvégezzük az adatok mentését
            $retData = $uzenofalModel->sendMessage($vars);

            // Ha hibát kaptunk, akkor a login oldalra irányítunk
           

            // Betöltjük a nézetet
            $view = new View_Loader($this->baseName.'_main');
            
        }
    }
}
