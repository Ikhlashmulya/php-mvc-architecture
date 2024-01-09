<?php

namespace Ikhlashmulya\Phpweb\Model;

use Ikhlashmulya\Phpweb\Model\Model;

class User extends Model
{
    protected string $tableName = 'users';
    protected array $fields = ['id', 'name'];

}
