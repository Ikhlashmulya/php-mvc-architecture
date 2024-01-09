<?php

namespace Ikhlashmulya\Phpweb;

use Ikhlashmulya\Phpweb\Config\Database;
use \PDO;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    private PDO $connection;

    public function setUp(): void
    {
        $this->connection = Database::getInstance();
    }

    public function testInstance() 
    {
        $this->assertNotNull($this->connection);
    }
}
