<?php

declare(strict_types=1);


class Apple extends Fruit
{
   private bool $isWormy = false;

   protected float $volume; //centimetre(cm³)

   public function __construct($volume)
   {
      $this->volume = $volume;
   }

   public function getIsWormy(): bool
   {
      return $this->isWormy;
   }


   public function setIsWormy(bool $isWormy)
   {
      $this->isWormy = $isWormy;

      return $this;
   }
}