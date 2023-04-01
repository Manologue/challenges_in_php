<?php

declare(strict_types=1);


interface FruitContainer
{
   public function addFruit(Fruit $fruit): void;

   public function getFruitCount(): int;
   public function getRemainingSpace(): float;

}