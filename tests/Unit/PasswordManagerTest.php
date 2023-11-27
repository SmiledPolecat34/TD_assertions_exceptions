<?php

require_once ('src/PasswordManager.php');

use PHPUnit\Framework\TestCase;

class PasswordManagerTest extends TestCase
{
    public function testValidatePassword()
    {
        $passwordManager = new PasswordManager();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Mot de passe trop court');
        $passwordManager->validatePassword('1234567');
    }

    public function testValidatePassword2()
    {
        $passwordManager = new PasswordManager();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Absence de lettre majuscule');
        $passwordManager->validatePassword('12345678');
    }

    public function testValidatePassword3()
    {
        $passwordManager = new PasswordManager();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Absence de lettre minuscule');
        $passwordManager->validatePassword('12345678A');
    }

    public function testValidatePassword4()
    {
        $passwordManager = new PasswordManager();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Absence de chiffre');
        $passwordManager->validatePassword('abcdefghA');
    }

    public function testValidatePassword5()
    {
        $passwordManager = new PasswordManager();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Présence d\'un espace');
        $passwordManager->validatePassword('123456 78Aa');
    }

    public function testValidatePassword6()
    {
        $passwordManager = new PasswordManager();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Absence de caractère spécial');
        $passwordManager->validatePassword('12345678Aa');
    }

}

?>