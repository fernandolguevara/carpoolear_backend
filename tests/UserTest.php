<?php

class UserTest extends TestCase { 

    protected $userManager;
    public function __construct() {

    } 

	public function testCreateUser()
	{
        $userManager = new \STS\Services\Logic\UsersManager();
		$data = [
            "name" => "Mariano", 
            "email" => "mariano@g.com", 
            "password" => "123456", 
            "password_confirmation" => "123456"
        ];

        $u = $userManager->create($data);

        $this->assertTrue($u != null);
	}

    public function testCreateUserFail()
	{
        $userManager = new \STS\Services\Logic\UsersManager();
		$data = [
            "name" => "Mariano", 
            "email" => "mariano@g.com", 
            "password" => "123456"
        ];

        $u = $userManager->create($data);
        $this->assertNull($u);
    
	}

    public function testCreateUserRepited()
	{
        $userManager = new \STS\Services\Logic\UsersManager();
		$data = [
            "name" => "Mariano", 
            "email" => "mariano@g1.com", 
            "password" => "123456",
            "password_confirmation" => "123456"
        ];

        $u1 = $userManager->create($data);

        $u2 = $userManager->create($data);

        $this->assertNull($u2);
    
	}

    public function testUpdateUser()
	{
        $user = \STS\User::find(1);
        $userManager = new \STS\Services\Logic\UsersManager();
		$data = [
            "name" => "Pablo", 
            "password" => "gatogato",
            "password_confirmation" => "gatogato",
            "patente" => "SOF 034"
        ];

        $u1 = $userManager->update($user, $data);  
        $this->assertTrue($u1 != null);
    
	}

}
