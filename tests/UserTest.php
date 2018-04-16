<?php
require_once __DIR__ . "/../config/Database.php";
require_once __DIR__ . "/../model/User.php";
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->user = new User();
    }

    protected function tearDown()
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
        $this->article = NULL;
    }
    
    public function testAddUser()
    {
        $user = [
            'login' => 'test',
            'email' => 'test@mail.com',
            'name' => 'test',
            'surname' => 'test',
            'password' => 'test',
            'password2' => 'test'
        ];
        $result = $this->user->addUser($user);
        $this->assertEquals('Вы успешно зарегистрированы!', $result[0]);
    }
}