<?php

namespace App;

class Product
{
    private $qty;

    private $price;

    private $description;

    private $salesTaxExemptible;

    public function __construct(int $qty, float $price, string $description, bool $salesTaxExemptible = false)
    {
        $this->qty = $qty;
        $this->price = $price;
        $this->description = $description;
        $this->salesTaxExemptible = $salesTaxExemptible;
    }

    public function __toString()
    {
        return sprintf('%s %s: %s', $this->qty, $this->description, $this->getSalePrice());
    }

    public function qty() : int
    {
        return $this->qty;
    }

    public function price() : float
    {
        return $this->price;
    }

    public function description() : string
    {
        return $this->description;
    }

    public function setTaxExemption(bool $value) : void
    {
        $this->salesTaxExemptible = $value;
    }
    
    public function isSalesTaxExemptible() : bool
    {
        return $this->salesTaxExemptible;
    }

    public function getTaxes() : float
    {
        return $this->isSalesTaxExemptible() ? 0 : 0.1;
    }

    public function getSalePrice() : float
    {
        return $this->price() + $this->getTaxPrice();
    }

    public function getTaxPrice() : float
    {
        return $this->price() * $this->getTaxes();
    }
}
