<?php

namespace App;

use PDO;
use PDOStatement;

class DbHandler
{
    /**
     * PDO объект.
     *
     * @var PDO
     */
    private PDO $pdo;

    /**
     * Подключены ли к БД.
     *
     * @var bool
     */
    private bool $isConnected;

    /**
     * Объект PDOStatement.
     * (набор всех полученных из базы данных строк)
     *
     * @var PDOStatement
     */
    private PDOStatement $statement;

    /**
     * Конфигурационные данные БД.
     *
     * @var array
     */
    protected array $config = [];

    public function __construct()
    {
        $db_conf = require "configDB.php";

        $this->config = $db_conf;
        $this->connect();
    }

    private function connect(): void
    {
        $dsn = "mysql:host={$this->config["host"]};dbname={$this->config['dbname']};charset={$this->config["charset"]}";
        $options = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $this->config["username"], $this->config["password"], $options);
            $this->isConnected = true;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    private function init(string $query): void
    {
        if (!$this->isConnected) {
            $this->connect();
        }

        try {
            $this->statement = $this->pdo->prepare($query);
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

    public function closeConnection(): void
    {
        $this->pdo = null;
        $this->isConnected = false;
    }
}