<?php
require_once 'db-connect.php';

class GenreDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = connectToDb('project2');
    }


    public function listOfGenresAndId(): array
    {
        $sql = 'SELECT `genres`.`id`, `genre`'
            . 'FROM `genres`;';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}