<?php

namespace Ikhlashmulya\Phpweb\Model;

use PDO;

class Todo extends Model
{
    protected string $tableName = 'todos';
    protected array $fields = ['id', 'todo', 'user_id'];

    public function findByUserId($userId)
    {
        $data = [];
        $statement = $this->getConnection()->prepare("SELECT * FROM todos WHERE user_id = ?");
        $statement->execute([$userId]);
        while ($row = $statement->fetch(PDO::FETCH_OBJ)) {
            $data[] = $row;
        }
        return $data;
    }
}
