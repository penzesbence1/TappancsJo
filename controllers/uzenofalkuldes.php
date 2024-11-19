<?php

class Uzenofalkuldes_Controller
{

    
    public $baseName = 'uzenofal';  // meghatározni, hogy melyik oldalon vagyunk

    public function main(array $vars) // a router által továbbított paramétereket kapja
    {

        if($_SESSION['userlevel'] == '_1_'){
        $view = new View_Loader('home_main');
        
    }else{
        // Ellenőrizzük, hogy a form elküldésre került-e
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Model betöltése
            include_once(SERVER_ROOT.'models/uzenofal_model.php');
            $uzenofalModel = new Uzenofal_Model();  // az osztályhoz tartozó modell

            // A POST adatokat feldolgozzuk
            $vars = [
                'felhasznalo_id'   => $_SESSION['userid'],
                'uzenet'   => htmlspecialchars($_POST['message']) 
            ];

            // A modellben elvégezzük az adatok mentését
            $retData = $uzenofalModel->sendMessage($vars);

            // Ha hibát kaptunk, akkor a login oldalra irányítunk
           
            $messages = $uzenofalModel->getMessages();
        
        // Initialize the view and assign data
         $view = new View_Loader($this->baseName . '_main');
            $view->assign('messages', $messages);
        }

    }
    }
}
