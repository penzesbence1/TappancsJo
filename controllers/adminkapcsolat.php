
<?php
class Adminkapcsolat_Controller
{
    public $baseName = 'adminkapcsolat';  // A lap neve

    public function main(array $vars)
    {

        if($_SESSION['userlevel'] != '1__'){
            $view = new View_Loader('home_main');
            
        }else{
            include_once(SERVER_ROOT.'models/adminkapcsolat_model.php');
            $adminkapcsolatModel = new Adminkapcsolat_Model;
    
            $messages = $adminkapcsolatModel->getMessages();
            // Betöltjük a nézetet, és átadjuk az üzeneteket
            $view = new View_Loader($this->baseName.'_main');
    
            $view->assign('messages', $messages);
        }

        
        
    }
}

