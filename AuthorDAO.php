<?php
require_once 'db-connect.php';

class AuthorDAO
{
    private PDO $db;

    public function __construct()
    {
        $this->db = connectToDb('project2');
    }


    public function listOfAuthorsAndId(): array
    {
        $sql = 'SELECT `authors`.`id`, `name`'
            . 'FROM `authors`;';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}