<?php
class Uzenofal_Model
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function sendMessage($vars)
    {
        $sql = "INSERT INTO uzenofal (Felhasznalo_id, Uzenet, Ido) VALUES (:user_id, :message, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $vars['felhasznalo_id'],
            ':message' => $vars['uzenet']
        ]);
    }

    public function getMessages()
    {
        $sql = "SELECT f.Vezeteknev, f.Keresztnev, u.Uzenet, u.Ido 
                FROM uzenofal u
                INNER JOIN felhasznalok f ON u.Felhasznalo_id = f.Felhasznalo_id 
                ORDER BY u.Ido DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
