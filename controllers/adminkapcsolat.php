
<?php
class Adminkapcsolat_Controller
{
    public $baseName = 'adminkapcsolat';  // A lap neve

    public function main(array $vars)
    {
        
        // Betöltjük a nézetet, és átadjuk az üzeneteket
        $view = new View_Loader($this->baseName.'_main');
        
    }
}

