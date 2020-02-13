<?php 

namespace App;

class Cart
{
    private $products;

    public function __construct(array $products = [])
    {
        $this->products = $products;
    }

    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    public function getProducts() : array
    {
        return $this->products;
    }

    public function getTotal() : float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getSalePrice();
        }

        return $total;
    }

    public function getTotalTaxes()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getTaxPrice();
        }

        return $total;
    }
}