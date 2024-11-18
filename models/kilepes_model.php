<?php

class Kilepes_Model
{
	public function get_data()
	{
		$retData['eredmény'] = "OK";
		$retData['uzenet'] = "Viszontlátásra ".$_SESSION['userlastname']." ".$_SESSION['userfirstname']."!";
		$_SESSION['userid'] =  0;
		$_SESSION['userlastname'] =  "";
		$_SESSION['userfirstname'] =  "";
		$_SESSION['userlevel'] = "_1_";
		Menu::setMenu();
		return $retData;
	}
}

?>