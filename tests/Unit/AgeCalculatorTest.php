<?php
// On est le 28/11/2023

use PHPUnit\Framework\TestCase;

require_once ('src/AgeCalculator.php');

class AgeCalculatorTest extends TestCase
{
    private $ageCalculator;

    protected function setUp(): void {
        $this->ageCalculator = new AgeCalculator();
    }

    /**
     * @dataProvider validDateProvider
     */
    public function testValidDateOfBirth($birthday, $expectedAge)
    {
        $calculatedAge = $this->ageCalculator->calculateAge($birthday);
        $this->assertEquals($expectedAge, $calculatedAge);
    }

    /**
     * @dataProvider futureDateProvider
     */
    public function testFutureDateOfBirth($futureBirthday)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("La date de naissance est dans le futur");
        $this->ageCalculator->calculateAge($futureBirthday);
    }

    /**
     * @dataProvider incorrectDateProvider
     */
    public function testIncorrectDateOfBirth($incorrectBirthday)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("La date de naissance est incorrecte");
        $this->ageCalculator->calculateAge($incorrectBirthday);
    }

    public static function validDateProvider()
    {
        return [
            ['1990-05-15', 33], // Modifier en fonction de l'âge actuel
            ['2000-01-01', 23], // Autre exemple valide
        ];
    }

    public static function futureDateProvider()
    {
        return [
            ['2050-10-28'], // Date future
            ['2100-12-31'], // Autre date future
        ];
    }

    public static function incorrectDateProvider()
    {
        return [
            ['invalid_date'], // Date incorrecte
            ['2100-00-00'], // Autre date incorrecte
        ];
    }
}

?>