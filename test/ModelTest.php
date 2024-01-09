<?php

namespace Ikhlashmulya\Phpweb;

use Ikhlashmulya\Phpweb\Model\User;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    private User $userModel;

    public function setUp(): void
    {
        $this->userModel = new User();
        $this->userModel->getConnection()->query('DELETE FROM users');
    }

    public function testInsert()
    {
        $lastId = $this->userModel->insert(['username' => 'rina', 'password' => password_hash('SECRET', PASSWORD_DEFAULT)]);
        $this->assertNotEmpty($lastId);
    }

    public function testFindById()
    {
        $lastId = $this->userModel->insert(['username' => 'rina', 'password' => password_hash('SECRET', PASSWORD_DEFAULT)]);
        $user = $this->userModel->findById($lastId);
        $this->assertNotNull($user);
        var_dump($user->id);
        var_dump($user->username);
        var_dump($user->password);
    }

    public function testUpdate()
    {
        $lastId = $this->userModel->insert(['username' => 'rina', 'password' => password_hash('SECRET', PASSWORD_DEFAULT)]);
        $this->assertTrue($this->userModel->update(['username' => 'john doe'], ['id' => $lastId]));
    }
    
    public function testDelete()
    {
        $lastId = $this->userModel->insert(['username' => 'rina', 'password' => password_hash('SECRET', PASSWORD_DEFAULT)]);
        $this->assertTrue($this->userModel->delete(['id' => $lastId]));
    }
}
