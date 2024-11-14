<?php
class Uzenofal_Model
{
    private $pdo; // PDO kapcsolat

    // Konstruktor, ami inicializálja az adatbázis kapcsolatot
    public function __construct()
    {
        $this->pdo = Database::getConnection(); // Kapcsolódás a database.inc által
    }

    // Üzenet küldése az adatbázisba
    public function sendMessage($vars)
    {
        $sql = "INSERT INTO uzenofal (Felhasznalo_id, Uzenet, Ido) VALUES (:user_id, :message, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $vars['user_id'],
            ':message' => $vars['message']
        ]);
    }

    // Üzenetek lekérdezése az adatbázisból
    public function getMessages()
    {
        $sql = "SELECT f.Vezeteknev, f.Keresztnev, u.Uzenet, u.Ido 
                FROM uzenofal u
                INNER JOIN felhasznalok f ON u.Felhasznalo_id = f.Felhasznalo_id 
                ORDER BY u.Ido DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Az üzenetek visszaadása
    }
}


