<?php

require_once "Connection.php";

class DbHandler
{
    /**
     * Объект PDOStatement.
     * (набор всех полученных из базы данных строк)
     *
     * @var PDOStatement
     */
    private PDOStatement $statement;

    /**
     * Подключение к БД
     *
     * @var \Connection
     */
    private \Connection $connect;

    /**
     * Подключены ли к БД.
     *
     * @var bool
     */
    private bool $isConnected = false;

    private function init(string $query): void
    {
        if (!$this->isConnected) {
            $this->connect = \Connection::getInstance();
            $this->isConnected = true;
        }

        try {
            $this->statement = $this->connect->getPDO()->prepare($query);
            $this->statement->execute();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insertUser($name, $email, $pass): void
    {
        $sql = "INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$name', LOWER('$email'), '$pass')";
        $this->init($sql);
    }

    public function getUserByEmail($email, $mode = PDO::FETCH_ASSOC): array | bool
    {
        $sql = "SELECT * FROM `users` WHERE LOWER(email = '$email')";
        $this->init($sql);

        return $this->statement->fetch($mode);
    }

    public function updateUserPassword($userEmail, $password): void
    {
        $sql = "UPDATE `users` SET `pass`='$password' WHERE email = '$userEmail'";
        $this->init($sql);

    }

    public function query(string $query, $mode = PDO::FETCH_ASSOC)
    {
        $query = trim(str_replace("\r", "", $query));

        $this->init($query);

        $rawStatement = explode(" ", preg_replace("/\s+|\t+|\n+/", " ", $query));

        $statement = strtolower($rawStatement[0]);

        if ($statement === "select" || $statement === "show") {
            return $this->statement->fetchAll($mode);
        } elseif ($statement === "insert" || $statement === "update" || $statement === "delete") {
            return $this->statement->rowCount();
        } else {
            return null;
        }
    }

}