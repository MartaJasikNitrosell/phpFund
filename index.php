<?php
define('BASE_DIR', __DIR__);
spl_autoload_register(
  function ($class) {
    $fn = str_replace('\\', '/', $class) . '.php';
    require(BASE_DIR . '/' . $fn);
  }
);

use \Lab\Mammal;

$cat = new Mammal("Meowie", 3.6, 4, 4, true, true);
$dog = new Mammal("Barkie", 8.2, 9, 4, true, true);

$cat->callForMeal();
$dog->callForMeal();

$cat->getAnimalData();