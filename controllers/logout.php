<?php

class Logout_Controller
{
	public $baseName = 'logout';  //meghat�rozni, hogy melyik oldalon vagyunk
	public function main(array $vars) // a router �ltal tov�bb�tott param�tereket kapja
	{
		include_once(SERVER_ROOT.'models/kilepes_model.php');
		$kilepesModel = new Kilepes_Model;  //az oszt�lyhoz tartoz� modell
		//a modellben bel�pteti a felhaszn�l�t
		$retData = $kilepesModel->get_data(); 
		//bet�ltj�k a n�zetet
		$_SESSION['username'] = '';
		$_SESSION['userlastname'] = '';
		$_SESSION['userfirstname'] = '';
		$view = new View_Loader($this->baseName.'_main');
		//�tadjuk a lek�rdezett adatokat a n�zetnek
		foreach($retData as $name => $value)
			$view->assign($name, $value);
	}
}

?>