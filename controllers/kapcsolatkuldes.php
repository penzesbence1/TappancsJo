<?php

class Kapcsolatkuldes_Controller
{
    public $baseName = 'kapcsolat';  // meghatározni, hogy melyik oldalon vagyunk

    public function main(array $vars) // a router által továbbított paramétereket kapja
    {
        // Ellenőrizzük, hogy a form elküldésre került-e
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Model betöltése
            include_once(SERVER_ROOT.'models/kapcsolat_model.php');
            $kapcsolatModel = new Kapcsolat_Model();  // az osztályhoz tartozó modell

            // A POST adatokat feldolgozzuk
            $vars = [
                'email'   => $_POST['email'],
                'phone'   => $_POST['phone'],
                'message' => $_POST['message']
            ];

            // A modellben elvégezzük az adatok mentését
            $retData = $kapcsolatModel->save_data($vars);

            // Ha hibát kaptunk, akkor a login oldalra irányítunk
            if ($retData['eredmeny'] == "ERROR") {
                $this->baseName = "login";
            }

            // Betöltjük a nézetet
            $view = new View_Loader($this->baseName.'_main');
            foreach ($retData as $name => $value) {
                $view->assign($name, $value);
            }
        }
    }
}
