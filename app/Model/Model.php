<?php

namespace Ikhlashmulya\Phpweb\Model;

use Ikhlashmulya\Phpweb\Config\Database;
use PDO;

abstract class Model
{
    private PDO $connection;
    protected string $tableName = '';
    protected array $fields = [];

    public function __construct()
    {
        $this->connection = Database::getInstance();
    }

    public function findById(int|string $id): object|false
    {
        $sql = "SELECT ";
        foreach($this->fields as $field) {
            $sql .= $field . ", ";
        }
        $sql = rtrim($sql, ", ") . " FROM " . $this->tableName . " WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->fetchObject();
    }

    public function insert(array $data): string|false
    {
        $sql = "INSERT INTO " . $this->tableName . " (";
        foreach(array_keys($data) as $key) {
            $sql .= $key . ", ";
        }
        $sql = rtrim($sql, ", ") . ") VALUES (";
        foreach(array_keys($data) as $key) {
            $sql .= ":" . $key . ", ";
        }
        $sql = rtrim($sql, ", ") . ")";
        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        return $this->connection->lastInsertId();
    }

    public function update(array $data, array $whereClause): bool
    {
        $sql = "UPDATE " . $this->tableName . " SET ";
        foreach(array_keys($data) as $key) {
            $sql .= $key . " = :$key" . ", ";
        }
        $sql = rtrim($sql, ", ");
        $sql .= " WHERE ";
        foreach(array_keys($whereClause) as $key) {
            $sql .= $key . " = :$key" . ", ";
        }
        $sql = rtrim($sql, ", ");
        $statement = $this->connection->prepare($sql);
        return $statement->execute(array_merge($data, $whereClause));
    }

    public function delete(array $whereClause): bool
    {
        $sql = "DELETE FROM " . $this->tableName;
        $sql .= " WHERE ";
        foreach(array_keys($whereClause) as $key) {
            $sql .= $key . " = :$key" . ", ";
        }
        $sql = rtrim($sql, ", ");
        $statement = $this->connection->prepare($sql);
        return $statement->execute($whereClause);
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
