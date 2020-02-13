<?php

namespace App;

class ProductBuilder
{
    const INPUT_PATTERN = '/([0-9]+) (imported )?(.+) at ([0-9]+\.[0-9]{0,2})/i';

    public static function createFromInput(string $line)
    {
        try {
            if (preg_match(static::INPUT_PATTERN, $line, $matches)) {
                $qty = (int)$matches[1];
                $description = $matches[3];
                $price = static::parsePrice($matches[4]);

                if (strtolower($matches[2]) === 'imported') {
                    $good = new ImportedProduct($qty, $price, $description);
                } else {
                    $good = new Product($qty, $price, $description);
                }

                // @todo load if the product is tax excempt or not
                // $good->setTaxExemption(true);

                return $good;
            }

            throw new \Exception('Input line does not have the expected format', 1);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    protected static function parsePrice(string $price) : float
    {
        return (float) str_replace(',', '', $price);
    }
}