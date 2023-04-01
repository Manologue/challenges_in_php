<?php

declare(strict_types=1);


class Apple extends Fruit
{
   private bool $isWormy = false;

   protected float $volume = 190; //centimetre(cm³)

   public function __construct($volume)
   {
      $this->volume = $volume;
   }

   public function getIsWormy()
   {
      return $this->isWormy;
   }


   public function setIsWormy($isWormy)
   {
      $this->isWormy = $isWormy;

      return $this;
   }
}