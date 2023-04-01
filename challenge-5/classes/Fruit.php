<?php

declare(strict_types=1);
abstract class Fruit
{
   protected string $color;
   protected float $volume; //centimetre(cm³)


   public function getColor(): string
   {
      return $this->color;
   }

   public function setColor(string $color): self
   {
      $this->color = $color;

      return $this;
   }

   public function getVolume(): float
   {
      return $this->volume;
   }


   public function setVolume(float $volume): self
   {
      $this->volume = $volume;

      return $this;
   }
}