<?php

namespace Ikhlashmulya\Phpweb\Model;

use Ikhlashmulya\Phpweb\Model\Model;

class User extends Model
{
    protected string $tableName = 'users';
    protected array $fields = ['id', 'username', 'password'];

    public function findByUsername(string $username): object|false
    {
        $statement = $this->getConnection()->prepare("SELECT * FROM users WHERE username = ?");
        $statement->execute([$username]);
        return $statement->fetchObject();
    }
}
