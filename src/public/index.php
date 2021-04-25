<?php
// Servicio para popular base de datos con data falsa
// usando la libreria https://github.com/FakerPHP/Faker
// 
// 

require_once '../vendor/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
// generate data by calling methods
echo "<pre>",print_r(phpversion()),"</pre>";
echo "<pre>",print_r($faker->name()),"</pre>";
echo "<pre>",print_r($faker->email()),"</pre>";
echo "<pre>",print_r($faker->text()),"</pre>";
