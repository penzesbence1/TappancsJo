<?php

class Register_Model
{
    public function register_user($vars)
    {
        $retData = [
            'eredmeny' => '',
            'uzenet' => ''
        ];

        try {
            // Adatbázis kapcsolat létrehozása
            $pdo = Database::getConnection();

            // Ellenőrizzük, hogy a felhasználónév vagy email már létezik-e
            $stmt = $pdo->prepare("SELECT * FROM felhasznalok WHERE Felhasznalonev = :username OR Email = :email");
            $stmt->bindParam(':username', $vars['username']);
            $stmt->bindParam(':email', $vars['email']);
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                $retData['eredmeny'] = "ERROR";
                $retData['uzenet'] = "Ez a felhasználónév vagy email már létezik!";
            } else {
                // Jelszó hashelése
                $hashedPassword = password_hash($vars['password'], PASSWORD_DEFAULT);

                // Felhasználó adatainak beszúrása az adatbázisba
                $stmt = $pdo->prepare(
                    "INSERT INTO felhasznalok (Vezeteknev, Keresztnev, Email, Telefonszam, Felhasznalonev, Jelszo, Jog_id) 
                    VALUES (:lastname, :firstname, :email, :phone, :username, :password, '__1')"
                );
                $stmt->bindParam(':lastname', $vars['lastname']);
                $stmt->bindParam(':firstname', $vars['firstname']);
                $stmt->bindParam(':email', $vars['email']);
                $stmt->bindParam(':phone', $vars['phone']);
                $stmt->bindParam(':username', $vars['username']);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();

                // Sikeres regisztráció esetén
                $retData['eredmeny'] = "OK";
                $retData['uzenet'] = "Sikeres regisztráció!";
            }
        } catch (PDOException $e) {
            $retData['eredmeny'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage();
        }

        return $retData;
    }
}
?>
