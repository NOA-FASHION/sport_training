<?php

namespace App\tests\Unit;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    public function getUser(): User
    {
        $user = new User();
        $user
            ->setFullName('tesName')
            ->setEmail('michel.almont@gmailrez.com')
            ->setRoles(['ROLE_USER'])
            ->setPlainPassword('Wipit@2017');

            return $user;
    }


    public function testUserValid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $user = $this->getUser();
          

        $errors = $container->get('validator')->validate($user);
        $this->assertCount(0, $errors);
    }
    public function testUsernameInvalid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $user = $this->getUser();
        $user
            ->setFullName('t');

        $errors = $container->get('validator')->validate($user);
        $this->assertCount(1, $errors);
    }
    public function testMailInvalid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $user =   $user = $this->getUser();
        $user 
            ->setEmail('michel');

        $errors = $container->get('validator')->validate($user);
        $this->assertCount(1, $errors);
    }
    public function testPasswordInvalid(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $user =   $user = $this->getUser();
        $user
            ->setPlainPassword('');

        $errors = $container->get('validator')->validate($user);
        $this->assertCount(1, $errors);
    }
}
