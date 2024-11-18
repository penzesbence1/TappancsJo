<?php

class Home_Controller
{
	public $baseName = 'home';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		if($_SESSION['userlevel'] != '1__'){
            $view = new View_Loader('home_main');
        }else{

			$view = new View_Loader($this->baseName."_main");

		}

		
		
	}
}

?>

