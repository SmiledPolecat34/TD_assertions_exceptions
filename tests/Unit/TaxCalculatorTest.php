<?php

use PHPUnit\Framework\TestCase;

require_once ('src/TaxCalculator.php');

class TaxCalculatorTest extends TestCase
{
    /**
     * @dataProvider ProviderCalculateTax
     */
    public function testCalculateTax()
    {
        $taxCalculator = new TaxCalculator();
        $price = 100;
        $tax = 0.2;
        $this->assertEquals(20, $taxCalculator->calculateTax($price, $tax));
    }

    public function testGetTaxRate()
    {
        $taxCalculator = new TaxCalculator();
        $this->assertEquals(0.2, $taxCalculator->getTaxRate('FR'));
        $this->assertEquals(0.21, $taxCalculator->getTaxRate('UK'));
        $this->assertEquals(0.19, $taxCalculator->getTaxRate('DE'));
    }

    public static function ProviderCalculateTax()
    {
        return [
            [100, 0.2, 20],
            [100, 0.21, 21],
            [100, 0.19, 19],
        ];
    }
}
?>