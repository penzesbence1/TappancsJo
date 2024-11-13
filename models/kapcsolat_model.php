<?php

class Kapcsolat_Model
{
    public function save_data($vars)
    {
        $retData['eredmeny'] = "";
        try {
            // Adatbázis kapcsolat létrehozása
            $connection = Database::getConnection();

            // Az űrlap adatainak beszúrása a kapcsolat táblába
            $sql = "INSERT INTO kapcsolat (email, telefonszam, uzenet, ido) 
                    VALUES (:email, :telefon, :uzenet, NOW())";
            $stmt = $connection->prepare($sql);

            // Paraméterek kötése
            $stmt->bindParam(':email', $vars['email']);
            $stmt->bindParam(':telefon', $vars['phone']);
            $stmt->bindParam(':uzenet', $vars['message']);

            // Lekérdezés végrehajtása
            if ($stmt->execute()) {
                $retData['eredmeny'] = "OK";
                $retData['uzenet'] = "Köszönjük! Az üzenetét sikeresen elküldtük.";
            } else {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Hiba történt az üzenet küldése közben.";
            }
        } catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
        }
        return $retData;
    }
}
?>
