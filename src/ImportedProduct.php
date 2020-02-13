<?php 

namespace App;

class ImportedProduct extends Product
{
    public function __toString()
    {
        return sprintf('%s imported %s: %s', $this->qty, $this->description, $this->getSalePrice());
    }

    public function getTaxes() : float
    {
        return parent::getTaxes() + 0.05;
    }
}
