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
        $lastId = $this->userModel->insert(['name' => 'john']);
        $this->assertNotEmpty($lastId);
    }

    public function testFindById()
    {
        $lastId = $this->userModel->insert(['name' => 'rina']);
        $user = $this->userModel->findById($lastId);
        $this->assertNotNull($user);
        var_dump($user->id);
        var_dump($user->name);
    }

    public function testUpdate()
    {
        $lastId = $this->userModel->insert(['name' => 'john']);
        $this->assertTrue($this->userModel->update(['name' => 'john doe'], ['id' => $lastId]));
    }
    
    public function testDelete()
    {
        $lastId = $this->userModel->insert(['name' => 'john']);
        $this->assertTrue($this->userModel->delete(['id' => $lastId]));
    }
}
