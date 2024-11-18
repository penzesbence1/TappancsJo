<?php

class Beleptet_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "select felhasznalo_id, vezeteknev, keresztnev, jelszo, jog_id, felhasznalonev from felhasznalok where felhasznalonev='".$vars['login']."'";
			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
			switch(count($felhasznalo)) {
				case 0:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Helytelen felhasználói név-jelszó pár!";
					break;
				case 1:
					if(password_verify($vars['password'], $felhasznalo[0]['jelszo']))
					{
						$retData['eredmeny'] = "OK";
						$retData['uzenet'] = "Kedves ".$felhasznalo[0]['vezeteknev']." ".$felhasznalo[0]['keresztnev']."!<br><br>
											  Üdvözöljük oldalunkon!";
						$_SESSION['userid'] =  $felhasznalo[0]['felhasznalo_id'];
						$_SESSION['userlastname'] =  $felhasznalo[0]['vezeteknev'];
						$_SESSION['userfirstname'] =  $felhasznalo[0]['keresztnev'];
						$_SESSION['userlevel'] = $felhasznalo[0]['jog_id'];
						$_SESSION['username'] = $felhasznalo[0]['felhasznalonev'];

						Menu::setMenu();
					}
					else
					{
						$retData['eredmeny'] = "ERROR";
						$retData['uzenet'] = "Helytelen felhasználói név-jelszó pár!";
					}
					break;
				default:
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Több felhasználót találtunk a megadott felhasználói név -jelszó párral!";
			}
		}
		catch (PDOException $e) {
					$retData['eredmeny'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>