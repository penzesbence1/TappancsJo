<?php

class Export_Model
{
	public function get_data()
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "select felhasznalo_id, email, vezeteknev, telefonszam, keresztnev, jelszo, jog_id, felhasznalonev from felhasznalok";
			$stmt = $connection->query($sql);
			$felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
						$retData['eredmeny'] = "OK";
						
						$retData['felhasznalok'] = [];
						foreach ($felhasznalo as $felhasznal) {
   						 $retData['felhasznalok'][] = [
        				'userid' => $felhasznal['felhasznalo_id'],
        				'userlastname' => $felhasznal['vezeteknev'],
        				'userfirstname' => $felhasznal['keresztnev'],
        				'userlevel' => $felhasznal['jog_id'],
        				'username' => $felhasznal['felhasznalonev'],
        				'password' => $felhasznal['jelszo'],
        				'email' => $felhasznal['email'],
						'phone' => $felhasznal['telefonszam']
    ];
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