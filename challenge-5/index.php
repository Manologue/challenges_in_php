<?php
spl_autoload_register(function ($class) // Set autoload function
{
   $path = './classes/'; // Path to class definitions
   require $path . $class . '.php'; // Include class definition
});



$fruitContainer = new FruitContainerImp();
$fruitContainer->setCapacity(3000);
$strainer = new StrainerImp();

for ($i = 0; $i < 99; $i++) {


   $fruits = [];

   while ($fruitContainer->getRemainingSpace() > 0) {
      $fruits = $fruitContainer->getFruits();

      if ($fruitContainer->getRemainingSpace() < 0) {
         array_pop($fruits); // remove the last element
      }

      $fruitContainer->addFruit(new Apple(185 + rand(1, 4))); // just for fun i decided to change volume of apple at random


   }


   $quantity = array_map(function ($array) {
      return $array->getVolume();
   }, $fruits);
   $totalQuantity = array_sum($quantity);

   $strainer->strainer((float) $totalQuantity);



   $fruitContainer->setFruits([]); // empty array

}

// echo '<pre>';
// var_dump($strainer->getJuice());
// echo '</pre>';

echo 'all actions completed successfully';