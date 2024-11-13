<?php

class Uzenofal_Controller
{
    public $baseName = 'uzenofal';  // A lap neve

    public function main(array $vars)
    {
        include_once(SERVER_ROOT . 'models/uzenofal_model.php');
        $messageModel = new Uzenofal_Model();

        // Üzenet küldés kezelése
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
            // Ellenőrizzük, hogy van-e bejelentkezett felhasználó
            if (isset($_SESSION['id'])) {
                $vars = [
                    'message' => $_POST['message'],
                    'user_id' => $_SESSION['id'] // Felhasználó ID
                ];

                // Az üzenet elküldése
                $messageModel->sendMessage($vars);
            } else {
                // Ha nincs bejelentkezve a felhasználó, hibaüzenetet jelenítünk meg
                $errorMessage = "Be kell jelentkezned, hogy üzenetet küldj!";
                // A nézetben ez az üzenet később megjelenhet
                $view = new View_Loader($this->baseName.'_main');
                $view->assign('errorMessage', $errorMessage);
                return;
            }
        }

        // Üzenetek lekérdezése
        $messages = $messageModel->getMessages();

        // Betöltjük a nézetet
        $view = new View_Loader($this->baseName.'_main');
        $view->assign('uzenofal', $messages); // Üzenetek átadása a nézetnek
    }
}
