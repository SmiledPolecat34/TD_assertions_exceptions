<?php

require_once('./src/EmailValidator.php');
use PHPUnit\Framework\TestCase;

class EmailValidatorTest extends TestCase
{
    private $validator;

    protected function setUp(): void {
        $this->validator = new EmailValidator();
    }

    /**
     * @dataProvider emailProvider
     */
    public function testIsValid($email, $expected)
    {
        $isValid = $this->validator->isValid($email);
        $this->assertEquals($expected, $isValid);
    }
    
    public static function emailProvider()
    {
        return [
            ['versayo03@gmail.com', true],
            ['abc@gmail.com', true],
            ['abcrsd.com', false],
            ['abc@.com', false],
            ['aAjO_-.sjd*k@aAhHzerty.zip', true],
            ['aBc@gmail', false],
            ['abc@com', false],
            ['', false], // Test d'email vide
            ['abc @gmail.com', false], // Test d'email avec espace
            ['abc$#@gmail.com', true], // Test d'email avec caractères spéciaux valide
            ['abc@domain..com', false], // Test d'email avec deux points dans le domaine (invalide)
            
        ];
    }
}
?>
