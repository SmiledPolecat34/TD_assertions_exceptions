<?php

require_once ('./src/StringManipulator.php');
use PHPUnit\Framework\TestCase;


class StringManipulatorTest extends TestCase
{
    /**
     * @dataProvider Provider
     */
    public function testConcatenate()
    {
        $manipulator = new StringManipulator();

        $this->assertEquals('foobar', $manipulator->concatenate('foo', 'bar'));
        $this->assertEquals('', $manipulator->concatenate('', ''));
        $this->assertEquals('bar', $manipulator->concatenate('', 'bar'));
    }

    public function testCapitalize()
    {
        $manipulator = new StringManipulator();

        $this->assertEquals('Foo', $manipulator->capitalize('foo'));
        $this->assertEquals('Foo', $manipulator->capitalize('FOO'));
        $this->assertEquals('Foo', $manipulator->capitalize('fOO'));
        $this->assertEquals('', $manipulator->capitalize(''));
        $this->assertEquals('F', $manipulator->capitalize('f'));
    }

    public function testReverse()
    {
        $manipulator = new StringManipulator();

        $this->assertEquals('oof', $manipulator->reverse('foo'));
        $this->assertEquals('', $manipulator->reverse(''));
        $this->assertEquals('f', $manipulator->reverse('f'));
    }

    public function testLength()
    {
        $manipulator = new StringManipulator();

        $this->assertEquals(3, $manipulator->length('foo'));
        $this->assertEquals(0, $manipulator->length(''));
    }

    public function testContains()
    {
        $manipulator = new StringManipulator();

        $this->assertTrue($manipulator->contains('foobar', 'foo'));
        $this->assertFalse($manipulator->contains('foobar', 'baz'));
    }

    public static function Provider()
    {
        return [
            ['foo', 'bar', 'foobar'],
            ['bar', 'foo', 'barfoo'],
            ['', 'foo', 'foo'],
            ['foo', 'baz', 'foobaz'],
            ['', '', ''],
        ];
    }
}
?>