<?php

class Registerkuldes_Controller
{
    public $baseName = 'register';  // meghatározzuk, hogy melyik oldalon vagyunk

    public function main(array $vars) // a router által továbbított paramétereket kapja
    {
        include_once(SERVER_ROOT.'models/register_model.php');
        $registerModel = new Register_Model();  // modell betöltése

        // Ha POST kérést kapunk, regisztrálunk
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vars = [
                'lastname' => $_POST['lastname'],
                'firstname' => $_POST['firstname'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ];

            // A modell segítségével elvégezzük a regisztrációs folyamatot
            $retData = $registerModel->register_user($vars);

            // Ha van hibaüzenet, akkor megjelenítjük
            if ($retData['eredmeny'] == "ERROR") {
                $errorMessage = $retData['uzenet'];
            } else {
                // Sikeres regisztráció után a felhasználót a login oldalra irányítjuk
                header('Location: login');
                exit;
            }
        }

        // Betöltjük a nézetet
        $view = new View_Loader($this->baseName.'_main');
      
    }
}
