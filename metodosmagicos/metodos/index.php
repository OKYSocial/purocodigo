<?php

include_once 'Example.class.php';

$product = new Product ();
echo $product->instance . '<br>' ;

$product->options = 'Arroz';
$product->options ;

?>
