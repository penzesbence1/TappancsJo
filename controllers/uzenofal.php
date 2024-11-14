<?php
class Uzenofal_Controller
{
    public $baseName = 'uzenofal';
   
    public function main(array $vars)
    {
        include_once(SERVER_ROOT.'models/uzenofal_model.php');
        $uzenofalModel = new Uzenofal_Model;

        // Retrieve messages from the model
        $messages = $uzenofalModel->getMessages();
        
        // Initialize the view and assign data
        $view = new View_Loader($this->baseName . '_main');
        


        $view->assign('messages', $messages);
    }

    public function sendMessage(array $vars)
    {
        $uzenofalModel = new Uzenofal_Model;

        // Check if a message exists in $vars
        if (isset($vars['message'])) {
            $uzenofalModel->sendMessage($vars);
        }
        
        
    }
}
