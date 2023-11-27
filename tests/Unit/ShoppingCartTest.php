<?php

use PHPUnit\Framework\TestCase;

require_once ('src/ShoppingCart.php');

class ShoppingCartTest extends TestCase
{
    public function testAddItem()
    {
        $cart = new ShoppingCart();
        $cart->addItem('foo', 1);
        $this->assertEquals(1, $cart->getQuantity('foo'));
    }

    public function testAddItemWithExistingProduct()
    {
        $cart = new ShoppingCart();
        $cart->addItem('foo', 1);
        $cart->addItem('foo', 2);
        $this->assertEquals(3, $cart->getQuantity('foo'));
    }

    public function testAddItemWithInvalidQuantity()
    {
        $cart = new ShoppingCart();
        $this->expectException(InvalidArgumentException::class);
        $cart->addItem('foo', 0);
    }

    public function testRemoveItem()
    {
        $cart = new ShoppingCart();
        $cart->addItem('foo', 1);
        $cart->removeItem('foo', 1);
        $this->assertEquals(0, $cart->getQuantity('foo'));
    }

    public function testRemoveItemWithInvalidQuantity()
    {
        $cart = new ShoppingCart();
        $cart->addItem('foo', 1);
        $this->expectException(OutOfRangeException::class);
        $cart->removeItem('foo', 2);
    }

    public function testRemoveItemWithInvalidProduct()
    {
        $cart = new ShoppingCart();
        $this->expectException(OutOfRangeException::class);
        $cart->removeItem('foo', 1);
    }

    public function testGetQuantity()
    {
        $cart = new ShoppingCart();
        $cart->addItem('foo', 1);
        $this->assertEquals(1, $cart->getQuantity('foo'));
    }

    public function testGetQuantityWithInvalidProduct()
    {
        $cart = new ShoppingCart();
        $this->assertEquals(0, $cart->getQuantity('foo'));
    }
}

?>