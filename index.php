<?php 

require_once 'vendor/autoload.php';

$cart = new \App\Cart();

$fh = fopen('input/shopping-bag-01.txt', 'r');
while (($buffer = fgets($fh, 4096)) !== false) {
    echo $buffer;
    $product = \App\ProductBuilder::createFromInput($buffer);
    $cart->addProduct($product);
}
fclose($fh);

echo "\n\n";
$consolePrinter = new \App\ConsolePrinter($cart);
$consolePrinter->printReceipt();