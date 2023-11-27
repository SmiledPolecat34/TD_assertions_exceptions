<?php

class ShoppingCart
{
    private $items = [];

    public function addItem($product, $quantity)
    {
        // Ajoute un produit au panier avec une quantité donnée
        // Si le produit est déjà dans le panier, la quantité est augmentée
        // Si la quantité est <= 0, lance une InvalidArgumentException

        if ($quantity <= 0) {
            throw new InvalidArgumentException("La quantité doit être supérieure à 0");
        }

        if (isset($this->items[$product])) {
            $this->items[$product] += $quantity;
        } else {
            $this->items[$product] = $quantity;
        }
        
    }

    public function removeItem($product, $quantity)
    {
        // Si le produit n'est pas dans le panier, lance une OutOfRangeException
        if (!isset($this->items[$product])) {
            throw new OutOfRangeException();
        }

        $this->items[$product] -= $quantity;
        
        // Retire une quantité donnée d'un produit du panier
        if ($this->items[$product] == 0) {
            unset($this->items[$product]);
        }

        // Si la quantité à retirer est supérieure à la quantité dans le panier, lance une OutOfRangeException
        if ($quantity < $this->items[$product]) {
            throw new OutOfRangeException("La quantité à retirer est supérieure à la quantité dans le panier");
        }
    }

    public function getQuantity($product)
    {
        // Récupère la quantité d'un produit dans le panier
        // Si le produit n'est pas dans le panier, retourne 0

        if (isset($this->items[$product])) {
            return $this->items[$product];
        } else {
            return 0;
        }
    }
}
