<?php

use PHPUnit\Framework\TestCase;

require_once('./src/StatisticsCalculator.php');

class StatisticsCalculatorTest extends TestCase
{
    private $calculator;

    protected function setUp(): void {
        $this->calculator = new StatisticsCalculator();
    }

    /**
     * @dataProvider meanProvider
     */
    public function testMean($numbers, $expected)
    {
        $mean = $this->calculator->mean($numbers);
        $this->assertEquals($expected, $mean);
    }
    
    public static function meanProvider()
    {
        return [
            [[1, 2, 3, 4, 5], 3],
            [[1, 2, 3, 4], 2.5],
            [[1, 2, 3], 2],
            [[1, 2], 1.5],
            [[1], 1],
            [[2, 2, 2, 2], 2],
            [[], null], // Test de tableau vide
        ];
    }

    /**
     * @dataProvider medianProvider
     */
    public function testMedian($numbers, $expected)
    {
        $median = $this->calculator->median($numbers);
        $this->assertEquals($expected, $median);
    }
    
    public static function medianProvider()
    {
        return [
            [[1, 2, 3, 4, 5], 3],
            [[1, 2, 3, 4], 2.5],
            [[1, 2, 3], 2],
            [[1, 2], 1.5],
            [[1], 1],
            [[], null], // Test de tableau vide
        ];
    }
}
?>