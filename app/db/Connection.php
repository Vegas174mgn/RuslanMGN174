<?php

class Connection
{
    /**
     * PDO объект.
     *
     * @var PDO
     */
    private PDO $pdo;

    /**
     * Конфигурационные данные БД.
     *
     * @var array
     */
    protected array $config = [];

    private static ?Connection $instance = null;

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
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    private function __clone() {}

    public static function getInstance(): ?Connection
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }

    public function getPDO (): PDO
    {
        return $this->pdo;
    }
}