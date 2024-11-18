<?php
class Adminkapcsolat_Model
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }



    public function getMessages()
    {
        $sql = "SELECT *
        FROM kapcsolat
        
        ORDER BY Ido DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);


        return $messages;
    }
}
