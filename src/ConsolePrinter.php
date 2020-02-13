<?php 

namespace App;

class ConsolePrinter
{
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function printReceipt()
    {
        foreach ($this->cart->getProducts() as $product) {
            printf("%s \n", $product->__toString());
        }
        printf("Sales Taxes: %s\n", $this->cart->getTotalTaxes());
        printf("Total: %s\n", $this->cart->getTotal());
        printf("\n");
    }
}
