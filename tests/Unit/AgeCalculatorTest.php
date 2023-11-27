<?php

use PHPUnit\Framework\TestCase;

require_once ('src/AgeCalculator.php');

class AgeCalculatorTest extends TestCase
{
    public function testCalculateAge()
    {
        $ageCalculator = new AgeCalculator();
        $this->assertEquals(17, $ageCalculator->calculateAge(new DateTime('2003-06-10')));
    }

    public function testDisplayAge()
    {
        $ageCalculator = new AgeCalculator();
        $this->assertEquals("Vous avez 17 ans", $ageCalculator->displayAge(new DateTime('2003-06-10')));
    }
}
?>