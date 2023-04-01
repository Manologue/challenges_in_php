<?php

declare(strict_types=1);



class FruitContainerImp implements FruitContainer
{
   private float $capacity; // millilites(ml) or centimetre(cm³)
   private array $fruits = [];



   public function getCapacity(): float
   {
      return $this->capacity;
   }

   public function setCapacity(float $capacity): self
   {
      $this->capacity = $capacity;

      return $this;
   }


   public function getFruits(): array
   {
      return $this->fruits;
   }


   public function setFruits(Fruit|array $fruits): self
   {

      $this->fruits = $fruits;
      return $this;
   }


   public function addFruit(Fruit $fruit): void
   {
      $this->fruits[] = $fruit;
   }

   public function getFruitCount(): int
   {
      return count($this->fruits);
   }

   public function getRemainingSpace(): float
   {
      $totalFruitsVolume = 0;

      foreach ($this->fruits as $fruit) {
         $totalFruitsVolume += $fruit->getVolume();
      }

      return ($this->capacity - $totalFruitsVolume);
   }
}